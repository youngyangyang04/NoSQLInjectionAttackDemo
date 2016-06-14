<?php
$m = new MongoClient();
$postedusername = $_REQUEST['username'];
$postedpassword = $_REQUEST['password'];
echo "Connection to database successfully";
$db = $m->test;
echo "Database test selected";
$collection = $db->user;
$document = array(
	"username"=>$postedusername,
	"password"=>$postedpassword	
);
$collection->insert($document);
echo "Document inserted successfully";

$person = array(
		"name" => "Cesar Rodas",
		"country" => "Paraguay",
		"languages" => array("Spanish", "English", "Guarani"),
);