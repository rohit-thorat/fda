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
	$result = mysql_query("SELECT * FROM `smain`") ;
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
	
	$result = mysql_query("SELECT * FROM `smain` where sid='$id'") ;
	
	while($r = mysql_fetch_assoc($result))
	{   
		$rows = $r;
    }
	echo json_encode($rows);
}

//insert
if (isset($_POST['insert'])) 
{
	$MainMenuId=$_POST['MainMenuId'];
	$name=$_POST['name'];
    $link=$_POST['link'];
	$marathiName=$_POST['marathiName'];
	$tooltip=$_POST['tooltip'];
	$priority=$_POST['priority'];
	$update=mysql_query("INSERT INTO  `smain` (`mid`,`name`,`path`,`marathiname`,`priority`,`tooltip`,`flag`,`modifieddate`) VALUES ('$MainMenuId', '$name','$link','$marathiName','$priority','$tooltip','',now());") or die ("Problem");
	display();
}
//update
 if (isset($_POST['update'])) 
 {
	$id=$_POST['id'];
	$mainmenuId=$_POST['mid'];
    $name=$_POST['name'];
    $link=$_POST['link'];
	$marathiName=$_POST['marathiName'];
	$tooltip=$_POST['tooltip'];
	$priority=$_POST['priority'];
	$update=mysql_query("UPDATE `smain` SET `mid`='$mainmenuId', `name` = '$name',`path` = '$link',`marathiname` = '$marathiName',`priority` = '$priority',`tooltip` = '$tooltip',`flag`='',`modifieddate`=now() WHERE `smain`.`sid` ='$id' ") or die ("Problem");
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
	$result=mysql_query("UPDATE `smain` SET `flag`='Y',`modifieddate`=now() WHERE `smain`.`sid` ='$id' ") or die ("Problem");
	display();
				
		
}

ob_end_flush();

?>