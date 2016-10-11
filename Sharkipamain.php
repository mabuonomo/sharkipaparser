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

    function load_ipa($path) {
        $this->path_ipa = $path;
//        echo $this->path_ipa;

        $zip = new ZipArchive;

//        session_start();
//        $a = session_id();
//        echo $a;
        $this->path_tmp .= session_id() . "/";

        echo $this->path_tmp;
//        echo session_id();

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
        echo json_encode($contents);
        
        
    }

}

?>