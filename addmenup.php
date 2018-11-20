<?php
session_start();
 // $opid = $_SESSION['SESS_MEMBER_ID']; 
 // $fname = $_SESSION['SESS_FIRST_NAME'];
 // $bid = $_SESSION['SESS_BRANCH_NAME'];


 include("db.php"); 
ob_start();
//maim
if (isset($_POST['main'])) 
{
    $mid=$_POST['menu'];
    $uid=$_POST['uid'];

	$resultz = mysql_query("SELECT count(pid) as cnt FROM `menup` where uid=$uid and menuid=$mid and mtype='MM'") ;
	 $rz = mysql_fetch_assoc($resultz);
	 $ct=$rz['cnt'];
	if($ct<=0)
	{
	
	$update=mysql_query("INSERT INTO `menup` (`uid`, `menuid`, `mtype`) VALUES ( '$uid', '$mid', 'MM')") or die ("Problem");
	}
	else
	{
$update22=mysql_query("SELECT menup.pid FROM menup, main, smain WHERE smain.mid = main.id AND smain.sid = menup.menuid AND menup.mtype = 'SM' AND main.id = '$mid' AND menup.uid = '$uid'");
 while($rw = mysql_fetch_array($update22))
 {
	$pid=$rw['pid'];	 
	mysql_query("delete from `menup` where pid='$pid'") or die ("Problem");
 }
 

 
 $update222=mysql_query("SELECT menup.pid FROM menup, main, smain, sidemenu WHERE smain.mid = main.id AND sidemenu.sid = menup.menuid AND menup.mtype = 'LM' AND sidemenu.smid = smain.sid AND main.id = '$mid' AND menup.uid = '$uid'");
 while($rws = mysql_fetch_array($update222))
 {
	$pid=$rws['pid'];	 
	mysql_query("delete from `menup` where pid='$pid'") or die ("Problem");
 }
 
 
 
	
	$update=mysql_query("delete from `menup` where uid=$uid and menuid=$mid and mtype='MM'") or die ("Problem");
	//$update=mysql_query("delete from `menup` where uid=$uid and menuid=$mid and mtype='MM'") or die ("Problem");
	

	}
	
		
     
		   
$updated1z = mysql_query("SELECT * FROM `menup`,main where menup.menuid=main.id and menup.uid='$uid' and mtype='MM' order by main.id");
											

		 $rows = array();
     	 while($r = mysql_fetch_assoc($updated1z)){   
     			  $rows[] = $r;
     			  }
    	   echo json_encode($rows);
		

}

if (isset($_POST['smain'])) 
{
    $mid=$_POST['menu'];
    $uid=$_POST['uid'];

	$resultz = mysql_query("SELECT count(pid) as cnt FROM `menup` where uid='$uid' and menuid='$mid' and mtype='SM'") ;
	 $rz = mysql_fetch_assoc($resultz);
	 $ct=$rz['cnt'];
	if($ct<=0)
	{
	
	$update=mysql_query("INSERT INTO `menup` (`uid`, `menuid`, `mtype`) VALUES ( '$uid', '$mid', 'SM')") or die ("Problem");
	}
	else
	{

	$update222=mysql_query("SELECT menup.pid FROM menup, main, smain, sidemenu WHERE smain.mid = main.id AND sidemenu.sid = menup.menuid AND menup.mtype = 'LM' AND sidemenu.smid = smain.sid AND main.id = '$mid' AND menup.uid = '$uid'");
	while($rws = mysql_fetch_array($update222))
	{
	$pid=$rws['pid'];	 
	mysql_query("delete from `menup` where pid='$pid'") or die ("Problem");
	}
 
	$update=mysql_query("delete from `menup` where uid='$uid' and menuid='$mid' and mtype='SM'") or die ("Problem");

	}
  
$updated1z = mysql_query("SELECT * FROM `menup`,main where menup.menuid=main.id and menup.uid='$uid' and mtype='SM' order by main.id");

		 $rows = array();
     	 while($r = mysql_fetch_assoc($updated1z)){   
     			  $rows[] = $r;
     			  }
    	   echo json_encode($rows);
		

}
//insert side n access
if (isset($_POST['sideaccess'])) 
{
    $mid=$_POST['menu'];
    $acid=$_POST['acid'];
    
    $uid=$_POST['uid'];
if($acid=='1')
{
	$resultz = mysql_query("SELECT count(acid) as cnt FROM `access` where userid='$uid' and linkid='$mid' and adds='1'") ;
	$rz = mysql_fetch_assoc($resultz);
	$ct=$rz['cnt'];
	if($ct<=0)
	{
	$update=mysql_query("update  `access` set adds='1' where userid='$uid' and linkid='$mid'") or die ("Problem1");
	}
	else
	{
		$update=mysql_query("update  `access` set adds='' where userid='$uid' and linkid='$mid'") or die ("Problem2");
	}
	$updated1z = mysql_query("SELECT * FROM `menup`,main where menup.menuid=main.id and menup.uid='$uid' and mtype='SL' order by main.id");
											

		 $rows = array();
     	 while($r = mysql_fetch_assoc($updated1z)){   
     			  $rows[] = $r;
     			  }
    	   echo json_encode($rows);
	
}
elseif($acid=='3')
{
	$resultz = mysql_query("SELECT count(acid) as cnt FROM `access` where userid='$uid' and linkid='$mid' and deletes='1'") ;
	$rz = mysql_fetch_assoc($resultz);
	$ct=$rz['cnt'];
	if($ct<=0)
	{
	$update=mysql_query("update  `access` set deletes='1' where userid='$uid' and linkid='$mid'") or die ("Problem3");
	}
	else
	{
		$update=mysql_query("update  `access` set deletes='' where userid='$uid' and linkid='$mid'") or die ("Problem4");
	}
	
	$updated1z = mysql_query("SELECT * FROM `menup`,main where menup.menuid=main.id and menup.uid='$uid' and mtype='SL' order by main.id");
											

		 $rows = array();
     	 while($r = mysql_fetch_assoc($updated1z)){   
     			  $rows[] = $r;
     			  }
    	   echo json_encode($rows);
}

elseif($acid=='2')
{
	$resultz = mysql_query("SELECT count(acid) as cnt FROM `access` where userid='$uid' and linkid='$mid' and edits='1'") ;
	$rz = mysql_fetch_assoc($resultz);
	$ct=$rz['cnt'];
	if($ct<=0)
	{
	$update=mysql_query("update  `access` set edits='1' where userid='$uid' and linkid='$mid'") or die ("Problem3");
	}
	else
	{
		$update=mysql_query("update  `access` set edits='' where userid='$uid' and linkid='$mid'") or die ("Problem4");
	}
	
	$updated1z = mysql_query("SELECT * FROM `menup`,main where menup.menuid=main.id and menup.uid='$uid' and mtype='SL' order by main.id");
											

		 $rows = array();
     	 while($r = mysql_fetch_assoc($updated1z)){   
     			  $rows[] = $r;
     			  }
    	   echo json_encode($rows);
}
elseif($acid=='4')
{
	$resultz = mysql_query("SELECT count(acid) as cnt FROM `access` where userid='$uid' and linkid='$mid' and shows='1'") ;
	$rz = mysql_fetch_assoc($resultz);
	$ct=$rz['cnt'];
	if($ct<=0)
	{
	$update=mysql_query("update  `access` set shows='1' where userid='$uid' and linkid='$mid'") or die ("Problem3");
	}
	else
	{
		$update=mysql_query("update  `access` set shows='' where userid='$uid' and linkid='$mid'") or die ("Problem4");
	}
	
	$updated1z = mysql_query("SELECT * FROM `menup`,main where menup.menuid=main.id and menup.uid='$uid' and mtype='SL' order by main.id");
											

		 $rows = array();
     	 while($r = mysql_fetch_assoc($updated1z)){   
     			  $rows[] = $r;
     			  }
    	   echo json_encode($rows);
}

elseif($acid=='5')
{
	$resultz = mysql_query("SELECT count(acid) as cnt FROM `access` where userid='$uid' and linkid='$mid' and passs='1'") ;
	$rz = mysql_fetch_assoc($resultz);
	$ct=$rz['cnt'];
	if($ct<=0)
	{
	$update=mysql_query("update  `access` set passs='1' where userid='$uid' and linkid='$mid'") or die ("Problem3");
	}
	else
	{
		$update=mysql_query("update  `access` set passs='' where userid='$uid' and linkid='$mid'") or die ("Problem4");
	}
	
	$updated1z = mysql_query("SELECT * FROM `menup`,main where menup.menuid=main.id and menup.uid='$uid' and mtype='SL' order by main.id");
											

		 $rows = array();
     	 while($r = mysql_fetch_assoc($updated1z)){   
     			  $rows[] = $r;
     			  }
    	   echo json_encode($rows);
}	
		
     
		   

		

}

//insert side n access
if (isset($_POST['sidem'])) 
{

     $mid=$_POST['menu'];
 
    $uid=$_POST['uid'];

	$resultz = mysql_query("SELECT count(pid) as cnt FROM `menup` where uid='$uid' and menuid='$mid' and mtype='LM'") ;
	 $rz = mysql_fetch_assoc($resultz);
	 $ct=$rz['cnt'];
	if($ct<=0)
	{
	
	$update=mysql_query("INSERT INTO `menup` (`uid`, `menuid`, `mtype`) VALUES ( '$uid', '$mid', 'LM')") or die ("Problem");
	$updates=mysql_query("INSERT INTO `access` (`userid`, `linkid`) VALUES ( '$uid', '$mid')") or die ("Problem");
	
	}
	else
	{

	$update=mysql_query("delete from `menup` where uid='$uid' and menuid='$mid' and mtype='LM'") or die ("Problem");
	$update=mysql_query("delete from `access` where userid='$uid' and linkid='$mid'") or die ("Problem");
	}
	
		
     
		   
$updated1z = mysql_query("SELECT * FROM `menup`,main where menup.menuid=main.id and menup.uid='$uid' and mtype='LM' order by main.id");
											

		 $rows = array();
     	 while($r = mysql_fetch_assoc($updated1z)){   
     			  $rows[] = $r;
     			  }
    	   echo json_encode($rows);
		
}
ob_end_flush();

?>