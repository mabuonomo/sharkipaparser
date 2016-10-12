<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once 'class/SharkIpaParser.php';

$shark = new SharkIpaParser\SharkIpaParserHelper();

$shark->load_ipa('C:\Users\mario\Desktop\test.ipa');
echo $shark->read_plist()['CFBundleName'];