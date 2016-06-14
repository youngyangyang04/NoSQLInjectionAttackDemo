<?php
$m = new MongoClient();
$db = $m->test;
$collection = $db->user;
  $query_body ="
		function q() {
			var username = ".$_REQUEST["username"].";
			var password = ".$_REQUEST["password"].";if(username == '1'&&password == '1') return true; else{ return false;}}
";  
$result = $collection->find(array('$where'=>$query_body));
$count = $result->count();
$doc_failed = new DOMDocument();
$doc_failed->loadHTMLFile("failed.html");
$doc_succeed = new DOMDocument();
$doc_succeed->loadHTMLFile("succeed.html");
if($count>0){
	echo $doc_succeed->saveHTML();
}
else{
	echo $doc_failed->saveHTML();
}