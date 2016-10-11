<?php

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
        $path_ipa = $path;

        $zip = new ZipArchive;

        //$path_tmp .= $path_ipa;

        if (!file_exists($this->path_tmp))
            mkdir($this->path_tmp, 0777, true);

        if ($zip->open($this->path_ipa) === TRUE) {
            $zip->extractTo($this->path_tmp);
            $zip->close();
        }
    }

}

?>