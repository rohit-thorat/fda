<?php
session_start();
 // $opid = $_SESSION['SESS_MEMBER_ID']; 
 // $fname = $_SESSION['SESS_FIRST_NAME'];
 // $bid = $_SESSION['SESS_BRANCH_NAME'];


include("db.php"); 
ob_start();
	
	
	
//function table display
function display()
{
	$result = mysql_query("SELECT * FROM `main`") ;
	$rows = array();
    while($r = mysql_fetch_assoc($result))
		{   
     		$rows[] = $r;
		}
    	 echo json_encode($rows);
}

//function select record
function select($id)
{
	
	$result = mysql_query("SELECT * FROM `main` where id='$id'") ;
	
	while($r = mysql_fetch_assoc($result))
	{   
		$rows = $r;
    }
	echo json_encode($rows);
}


//insert
if (isset($_POST['insert'])) 
{
	
	$name=$_POST['name'];
    $link=$_POST['link'];
	$tooltip=$_POST['tooltip'];
	$priority=$_POST['priority'];
	$marathiName=$_POST['marathiName'];
	$update=mysql_query("INSERT INTO  `main` (`name`,`path`,`toolteep`,`marathiname`,`priority`,`flag`,`modifieddate`) VALUES ( '$name','$link','$tooltip','$marathiName','$priority','',now());") or die ("Problem");
	display();
		
		
}
//update
 if (isset($_POST['update'])) 
 {
	
	
	$id=$_POST['id'];
    $name=$_POST['name'];
    $link=$_POST['link'];
	$tooltip=$_POST['tooltip'];
	$priority=$_POST['priority'];
	$marathiName=$_POST['marathiName'];
	$update=mysql_query("UPDATE `main` SET `name` = '$name',`path` = '$link',`toolteep` = '$tooltip',`marathiname` = '$marathiName',`priority` = '$priority',`flag`='',`modifieddate`=now() WHERE `main`.`id` ='$id' ") or die ("Problem");
	//$update=mysql_query("UPDATE `main` SET `name` = '$GLOBALS['name']',`path` = '$GLOBALS['link']',`toolteep` = 'GLOBALS['$tooltip']',`marathiname` = '$GLOBALS['marathiName']',`priority` = '$GLOBALS['priority']',`flag`='',`modifieddate`=now() WHERE `main`.`id` ='$id' ") or die ("Problem");
	display();

}
//select
if (isset($_POST['select'])) 
{
	
	$id=$_POST['id'];
	select($id);
	
				

}

//delete
if (isset($_POST['deletes'])) 
{
	$id=$_POST['id'];
	$result=mysql_query("UPDATE `main` SET `flag`='Y',`modifieddate`=now() WHERE `main`.`id` ='$id' ") or die ("Problem");
	display();
				
}


ob_end_flush();




?>