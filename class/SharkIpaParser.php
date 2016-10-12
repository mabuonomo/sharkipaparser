<?php

namespace SharkIpaParser;

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
class SharkIpaParserHelper {

    protected $path_ipa; // = '';
    protected $path_tmp = 'unzip/ipa/';
    protected $path_plist; // = '';

    function load_ipa($path) {
        try {
            $this->path_ipa = $path;

            $zip = new \ZipArchive();

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

            $this->path_plist = $this->path_tmp . $folder_payload . "/" . $folder_app . "/Info.plist";

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function read_plist() {

        try {
            require_once(__DIR__ . '/../vendor/rodneyrehm/plist/classes/CFPropertyList/CFPropertyList.php');
            $plist = new \CFPropertyList\CFPropertyList($this->path_plist);

//            echo '<pre>';
//            var_dump($plist->toArray());
//            echo '</pre>';

            $plist = $plist->toArray();

            return $plist;
        } catch (Exception $ex) {
            return array();
        }
    }

}

?>