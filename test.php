<?php

session_start();

require_once 'class/SharkIpaParser.php';

$shark = new SharkIpaParser\SharkIpaParserHelper();

$shark->load_ipa('C:\Users\mario\Desktop\test.ipa');
echo $shark->read_plist()['CFBundleName'];