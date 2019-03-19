<?php
	header("Content-type:text/html;charset=utf-8");

	//一、获取用户的输入
	if($_POST['email_num']==null){
		$tel=$_POST['tel'];
		$email_pass=$_POST['email_pass'];
	}else{
		$email_num=$_POST['email_num'];
		$email_pass=$_POST['email_pass'];
	}	
	// echo $_POST['email_num'];
	// echo $_POST['email_pass'];
	//二、处理
	//1.建立联系
	$conn=mysql_connect("localhost","root","root");
	if(!$conn){
		die("连接失败");
	}

	//2.选择数据库
	mysql_select_db("cy1218",$conn);
	//3.执行SQL语句（传输数据）
	if($email_num==""){
		$sqlstr="select * from email where tel='$tel' and email_pass='$email_pass'";
	}else{
		$sqlstr="select * from email where email_num='$email_num' and email_pass='$email_pass'";
	}
	
	$result=mysql_query($sqlstr,$conn);

	//4.关闭数据库
	mysql_close($conn);

	//三、响应
	if(mysql_num_rows($result)>0){
		echo "1";
	}else{
		echo "0";
	}


?>