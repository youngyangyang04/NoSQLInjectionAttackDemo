<?php
	$stime=microtime(true);
   // connect to mongodb
   $m = new MongoClient();
//   echo "Connection to database successfully";
//	$postedusername = $_REQUEST['username'];
//	$postedpassword = $_REQUEST['password'];
	
   // select a database
   $db = $m->test;
//   echo "Database mydb selected";
   $collection = $db->user;
//   echo "Collection selected succsessfully";
   $dbUsername = null;
   $dbPassword = null;
   
 //   echo $postedusername;
 //  echo $postedpassword; 
   $data = array(
   		'username' =>  $_REQUEST['username'],
   		'password' =>  $_REQUEST['password']
   		
   ); 
   $cursor = $collection->find($data);
/*    $data = array(
   		'username' => array('$ne' => 1),
   		'password' => array('$ne' => 1)
   		 
   ); */
   $string = json_encode($data);
   echo $string;
   
//   print_r($data);
   $scope = array("user" => "Carl");
   $response = $db->execute("function(greeting, name) { return greeting+', '+name+'!'; }", array("Good bye", "Joe"));
   echo $response['retval'];
//   $db->execute("db.user.insert({'assdfdf':'dsaf'})");
 //  $response = $db->execute("db.user.find({'username':'sunuyang'})");
 //  print_r($response);
//   echo $response['retval'];
//    foreach ($data as $temp){
//    	echo $temp;
//    }
 //  $cursor = $collection->find($data);
   
   
   $count = $cursor->count();
   $doc_failed = new DOMDocument();
   $doc_failed->loadHTMLFile("failed.html");
   $doc_succeed = new DOMDocument();
   $doc_succeed->loadHTMLFile("succeed.html");
//   echo $count;
   if($count >0 ){
//   	echo "<h1>login successed</h1>"."</br>";
   	echo $doc_succeed->saveHTML();
   	foreach ($cursor as $user){
   			echo 'username:'.$user['username']."</br>";
   			echo 'password:'.$user['password']."</br>";
   		}
   }
   else{
//   	echo "<h1>not find</h1>";
   	echo $doc_failed->saveHTML();
   }
   $etime=microtime(true);//获取程序执行结束的时间
   $total=$etime-$stime;
   $str_total = var_export($total, TRUE);
   if(substr_count($str_total,"E")){
   	$float_total = floatval(substr($str_total,5));
   	$total = $float_total/100000;
   	echo $total.'seconds';
   } else echo $total.'seconds';
