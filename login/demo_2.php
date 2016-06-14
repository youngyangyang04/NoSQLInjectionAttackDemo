<?php
$m = new MongoClient();
$db = $m->test;
$collection = $db->user;
$tem = $_REQUEST["password"];
$query = "function q(){";
$query.= "var secret_number = 111;";
$query.= "var user_try = $tem;";
$query.="if (secret_number!=user_try) return false;";
$query.="return true;";
$query.= "}";
$result = $collection->find(array('$where'=>$query));
$count = $result->count();
$doc_failed = new DOMDocument();
$doc_failed->loadHTMLFile("failed.html");
$doc_succeed = new DOMDocument();
$doc_succeed->loadHTMLFile("succeed.html");
if($count>0){
	echo $doc_succeed->saveHTML();
}
else{
	//	echo "<h1>username or password is wrong!</h1>";
	echo $doc_failed->saveHTML();
}