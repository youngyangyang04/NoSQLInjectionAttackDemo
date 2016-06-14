<?php
$m = new MongoClient();
//   echo "Connection to database successfully";
$postedusername = $_REQUEST['news'];

// select a database
$db = $m->test;
//   echo "Database mydb selected";
$collection = $db->user;
$function = "function() {if(this.news == '$news') return true}";
echo $function;
$result = $coll->find(array('$where'=>$function));
if ($result->count()>0) {
	echo '该新闻存在';
}else{
	echo '该新闻不存在';
}
?>