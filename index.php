<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$base_files = array('Bootstrap', 'Controller', 'Model', 'View', 'Database', 'Session');

foreach($base_files as $base_file){
    require 'base/'.$base_file.'.php';
}

require 'config.php';
$app = new Bootstrap();
