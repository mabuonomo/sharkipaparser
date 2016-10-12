<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once 'sharkipamain.php';

$shark = new Sharkipamain();

$shark->load_ipa('C:\Users\mario\Desktop\test.ipa');
$shark->read_plist();