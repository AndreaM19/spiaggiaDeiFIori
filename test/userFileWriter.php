<?php
require_once '../include/Auth/User.php';
require_once '../include/File_management/FileManager.php';

$fileName="../resources/log.txt";
$fm=new fileManager();

$user=new User(md5("19andrea.m@gmail.com"), md5("andrea"));
	
$fm->writeFile($fileName, $user);
