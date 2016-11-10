<?php

$stime=microtime(true);
$m = new MongoClient();
$db = $m->test;
$collection = $db->users;
$query_body ="
		function q() {
			var username = ".$_REQUEST["username"].";
			var password = ".$_REQUEST["password"].";if(username == '1'&&password == '1') return true; else{ return false;}}
";
echo $query_body;


//username=1&password=1;return true;}//


//$query_body = "function q() { var username = 1; var password = 1;return true;}//if(username == '1')
	//		return true;else{return false;}";
	//echo $query_body;
$result = $collection->find(array('$where'=>$query_body));
$count = $result->count();
$doc_failed = new DOMDocument();
$doc_failed->loadHTMLFile("failed.html");
$doc_succeed = new DOMDocument();
$doc_succeed->loadHTMLFile("succeed.html");
$doc_attacked = new DOMDocument();
$doc_attacked->loadHTMLFile("attacked.html");
if((strpos($query_body,'//'))){
	
	echo $doc_attacked->saveHTML();
}
else if($count>0){
	echo $doc_succeed->saveHTML();
}
else{
	//	echo "<h1>username or password is wrong!</h1>";
	echo $doc_failed->saveHTML();
}


$etime=microtime(true);//èŽ·å�–ç¨‹åº�æ‰§è¡Œç»“æ�Ÿçš„æ—¶é—´
$total=$etime-$stime;
$str_total = var_export($total, TRUE);
if(substr_count($str_total,"E")){
	$float_total = floatval(substr($str_total,5));
	$total = $float_total/100000;
	echo $total.'seconds';
} else echo $total.'seconds';