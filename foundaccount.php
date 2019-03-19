<?php
	header("Content-type:text/html;charset=utf-8");

	//一、获取用户的输入
	$email_num= $_POST['email'];
	$email_tel = $_POST['tel'];
	$email_pass = $_POST['pass'];
	//二、处理

	//1、建立连接（搭桥）
	$conn = mysql_connect('localhost','root','root');
	if(!$conn){
		die("连接失败");
	}
	//2、选择数据库（选择目的地）
	mysql_select_db("cy1218",$conn);

	//3、执行SQL语句（传输数据）
	//3.1 查询
	if($email_num=="" && $email_pass==""){
		$sqlstr="select * from email where tel='$email_tel'";
	}else if($email_tel=="" && $email_pass==""){
		$sqlstr="select * from email where email_num='$email_num'";
	}else{
		if($email_tel==""){
			$sqlstr="select * from email where email_num='".$email_num."' and email_pass='".$email_pass."' ";
		}else{
			$sqlstr="select * from email where tel='".$email_tel."' and email_pass='".$email_pass."' ";
		}
	}
	
	$result = mysql_query($sqlstr,$conn);

	if(mysql_num_rows($result)>0){
		//4、关闭数据库（过河拆桥）
		mysql_close($conn);
		echo 3;
	}else{
		if($email_num==""){
			$sqlstr="insert into email values('','$email_tel','$email_pass')";
		}
		else{
			$sqlstr="insert into email values('$email_num','', '$email_pass')";
		}

		$result = mysql_query($sqlstr,$conn);

		//4、关闭数据库（过河拆桥）
		mysql_close($conn);

		//三、响应
		if($result==1){
			echo 1;	
		}else{
			echo 2;	
		}
	}			
?>