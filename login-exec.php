<?php
	//Start session
	session_start();
	include('db.php');

	 $uname = $_POST['login'];
	 $pass= $_POST['pass'];
	 $logintype= $_POST['logintype'];
	 $year= '2018';
	 $_SESSION['SESS_YEAR_ID'] = $year;
	 $com="Commissioner";
	 $jchq="JCHQ";
	 $jc="JC";
	 $do="DO";
	 $ao="AO";
	 $fso="FSO";
	 $code="code";
	 $admin="ADMIN";
	


	
if($logintype==$jchq){

    $_SESSION['SESS_USER']="JC HQ";
	$qry="SELECT * FROM jcdetails WHERE username='$uname' AND password='".md5($_POST['pass'])."'";
	$result=mysql_query($qry);	
}

else if($logintype==$com){
	
    $_SESSION['SESS_USER']="Commissioner";
	$qry="SELECT * FROM commissioner WHERE username='$uname' AND password='".md5($_POST['pass'])."'";
	$result=mysql_query($qry);	
}



else if($logintype==$jc){
    $_SESSION['SESS_USER']="JC";
	$qry="SELECT * FROM jcdetails WHERE username='$uname' AND password='".md5($_POST['pass'])."'";
	$result=mysql_query($qry);	
}
else if($logintype==$do){
     $_SESSION['SESS_USER']="DO";
	$qry="SELECT * FROM dodetails WHERE username='$uname' AND password='".md5($_POST['pass'])."'";
	$result=mysql_query($qry);	
}
else if($logintype==$ao){
     $_SESSION['SESS_USER']="AO";
	$qry="SELECT * FROM aodetails WHERE username='$uname' AND password='".md5($_POST['pass'])."'";
	$result=mysql_query($qry);	
}
else if($logintype==$fso){	
    $_SESSION['SESS_USER']="FSO";
	//echo "FSO";
	$qry="SELECT * FROM fsodetails WHERE username='$uname' AND password='".md5($_POST['pass'])."'";
	$result=mysql_query($qry);	
}

else if($logintype==$admin){	
    $_SESSION['SESS_USER']="ADMIN";
	$qry="SELECT * FROM admindetail WHERE username='$uname' AND password='$pass' ";
	$result=mysql_query($qry);	
		
}


else {	
	
	
	 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">'; 
}


//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) 
		{
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$fsohq = $member['hq'];
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['name'];
			$_SESSION['SESS_INITIAL_NAME'] = $member['initialname'];
			//$_SESSION['SESS_LAST_NAME'] = $member['lastname'];
			 
			
	
   			if($logintype==$admin)
			{
				$_SESSION['SESS_UID']='9';
			}
			else if($logintype==$fso)
			{
				 if($fsohq=='1')
				 {
					$_SESSION['SESS_UID']='2';
				 }
				 else
				 {	
					$_SESSION['SESS_UID']='1';
				 }	
			}
			else if($logintype==$do)
			{
				 if($fsohq=='1')
				 {
					 $_SESSION['SESS_UID']='4';
				 }
				else
				{	
					 $_SESSION['SESS_UID']='3';
				}	
			}
			else if($logintype==$jc)
			{
				$_SESSION['SESS_UID']='5';
			}
			else if($logintype==$jchq)
			{
				$_SESSION['SESS_UID']='6';
			}
			else if($logintype==$com)
			{
				$_SESSION['SESS_UID']='7';
			}
			else if($logintype==$ao)
			{
				$_SESSION['SESS_UID']='8';
			}
			  else
			  {
			 $_SESSION['SESS_UID']='9';
			 }
			 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Home.php">';
		}
		else {
			//Login failed
			echo "<script>alert('Please Check Login Details');</script>";
	 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';   
   exit; 
		}
	}else {
		//die("Query failed");
		echo "<script>alert('Please Check Login Details');</script>";
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';    
   exit; 
	}
?>