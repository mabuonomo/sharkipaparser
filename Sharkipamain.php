<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sharkipamain
 *
 * @author mario
 */
class Sharkipamain {

    protected $path_ipa; // = '';
    protected $path_tmp = 'unzip/ipa/';
    protected $path_plist; // = '';

    function load_ipa($path) {
        $this->path_ipa = $path;

        $zip = new ZipArchive;

        $time = str_replace(".", "", microtime());
        $time = str_replace(" ", "", $time);
        $this->path_tmp .= session_id() . "/" . $time . "/";

//        echo $this->path_tmp;

        if (!file_exists($this->path_tmp))
            mkdir($this->path_tmp, 0777, true);

        if ($zip->open($this->path_ipa) === TRUE) {
//            echo 'sssa';
            $zip->extractTo($this->path_tmp);
            $zip->close();
        } else {
            echo 'Error: ' . $zip->open($this->path_ipa);
        }

        $folder_payload = scandir($this->path_tmp, 1)[0];
        $folder_app = scandir($this->path_tmp . $folder_payload, 1)[0];
        $contents = scandir($this->path_tmp . $folder_payload . "/" . $folder_app, 1);
//        echo json_encode($contents);

        $this->path_plist = $this->path_tmp . $folder_payload . "/" . $folder_app . "/Info.plist";

        echo 'Plist: ' . $this->path_plist;

        return $contents; // lista di file contenuti nel pacchetto
    }

    function read_plist() {
        if (file_exists($this->path_plist)) {
            $xml = simplexml_load_file($this->path_plist);

            echo '<br><br>' . json_encode($xml); //Simple Calculator
        } else {
            exit('Failed to open test.xml.');
        }
    }

}

?>