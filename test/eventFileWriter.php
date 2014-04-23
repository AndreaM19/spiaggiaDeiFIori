<?php
require_once '../include/Events/Event.php';
require_once '../include/File_management/FileManager.php';


$fileName="../resources/events.txt";
$fm=new fileManager();

$eventsList=array();
$evento=new Event("Evento di prova","01-05-2014","http://www.miosito.it");
$evento2=new Event("Evento di prova2","01-05-2014","http://www.miosito.it");
$evento3=new Event("Evento di prova3","01-05-2014","http://www.miosito.it");
array_push($eventsList, $evento);
array_push($eventsList, $evento2);
array_push($eventsList, $evento3);

$fm->writeFile($fileName, $eventsList);
