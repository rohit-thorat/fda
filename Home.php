<?php    
session_start();

include('db.php');

$uid=$_SESSION['SESS_UID'];
$name=$_SESSION['SESS_FIRST_NAME'];
$userid=$_SESSION['SESS_MEMBER_ID'];
$upost=$_SESSION['SESS_USER'];
$_SESSION['SESS_INITIAL_NAME'];
$lang='EN';
?>
<!DOCTYPE html>

<html lang="en">



<head>
	<meta charset="utf-8" />
	<title>FDA | </title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="../assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="../assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
	<link href="../assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="../assets/css/default/style.min.css" rel="stylesheet" />
	<link href="../assets/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="../assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="../assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	<link href="../assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/plugins/DataTables/extensions/Buttons/css/buttons.bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/plugins/DataTables/extensions/AutoFill/css/autoFill.bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/plugins/DataTables/extensions/ColReorder/css/colReorder.bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/plugins/DataTables/extensions/KeyTable/css/keyTable.bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/plugins/DataTables/extensions/RowReorder/css/rowReorder.bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/plugins/DataTables/extensions/Select/css/select.bootstrap.min.css" rel="stylesheet" />
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed page-with-top-menu" >
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="index-2.html" class="navbar-brand"><span class="navbar-logo"></span> <b>FDA</b> MAHARASHTRA</a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header -->
			
			<!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				<li>
					<form class="navbar-form">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Enter keyword" />
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</li>
				<li class="dropdown">
					<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-bell"></i>
						<span class="label">5</span>
					</a>
					<ul class="dropdown-menu media-list dropdown-menu-right">
						<li class="dropdown-header">NOTIFICATIONS (5)</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-bug media-object bg-silver-darker"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
									<div class="text-muted f-s-11">3 minutes ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<img src="../assets/img/user/user-1.jpg" class="media-object" alt="" />
									<i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">John Smith</h6>
									<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
									<div class="text-muted f-s-11">25 minutes ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<img src="../assets/img/user/user-2.jpg" class="media-object" alt="" />
									<i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">Olivia</h6>
									<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
									<div class="text-muted f-s-11">35 minutes ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-plus media-object bg-silver-darker"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading"> New User Registered</h6>
									<div class="text-muted f-s-11">1 hour ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-envelope media-object bg-silver-darker"></i>
									<i class="fab fa-google text-warning media-object-icon f-s-14"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading"> New Email From John</h6>
									<div class="text-muted f-s-11">2 hour ago</div>
								</div>
							</a>
						</li>
						<li class="dropdown-footer text-center">
							<a href="javascript:;">View more</a>
						</li>
					</ul>
				</li>
				<li class="dropdown navbar-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<img src="../assets/img/user/user-13.jpg" alt="" /> 
						<span class="d-none d-md-inline"><?php echo $name; ?></span> <b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="javascript:;" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div>
						<a href="javascript:;" class="dropdown-item">Log Out</a>
					</div>
				</li>
			</ul>
			<!-- end header navigation right -->
		</div>
		<!-- end #header -->
		
		<!-- begin #top-menu -->
		<div id="top-menu" class="top-menu" style="background: #2c88c5;">
            <!-- begin top-menu nav -->
			<ul class="nav">
				<li class=""><span style="color: #2c88c5;">ABCDEFGTRTEGHHHHHHHHHHHddd</span></li>
				<li class=""><a href="?" style="font-size: 14px;"><span style="color: #ffff;">Home</span></a></li>
			
			<?php	


			$query = mysql_query("SELECT main.name,main.path,main.id,main.marathiname FROM `menup`,main WHERE uid='$uid' and mtype='MM' and `menup`.menuid=main.id order by priority") or die("problem");
while($row = mysql_fetch_array( $query ))
{
	if($lang=='MR')
	{
		 $nm=$row['marathiname'];
	}
	else
	{
		 $nm=$row['name'];
	}
	
	 $path=$row['path'];
	 $mid=$row['id'];
if($row>1)
{
echo'<li ';
	  if(isset($_GET['mid'])!="")
     {
	  $mn=$_GET['mid'];
	if($mn==$mid){ 
	echo 'class="active"';
	}
	  echo'> <a style="font-size: 14px;" href=?mid='.$mid.'>';
}
else
{
	echo '<li><a style="font-size: 14px;" href=?mid='.$mid.'>';
}
echo'<span style="color: #ffff;">'.$nm.'</span></a></li>';
      
}
}
?>
			
			
			
			
			
                <li class="menu-control menu-control-left">
                    <a href="javascript:;" data-click="prev-menu"><i class="fa fa-angle-left"></i></a>
                </li>
                <li class="menu-control menu-control-right">
                    <a href="javascript:;" data-click="next-menu"><i class="fa fa-angle-right"></i></a>
                </li>
            </ul>
            <!-- end top-menu nav -->
		</div>
		<!-- end #top-menu -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							
							<div class="image">
								<img src="../assets/img/user/user-13.jpg" alt="" />
							</div>
							<div class="info">
								<?php echo $name;?>
								
								<small><?php echo $upost;?></small>
							</div>
						</a>
					</li>
					
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					
					
					
					
					<?php
					if(isset($_GET['mid'])!="")
  {
$mid=$_GET['mid'];

					$query = mysql_query("SELECT smain.name,smain.path,smain.sid,smain.marathiname FROM `menup`,smain,main WHERE uid='$uid' and mtype='SM' and `menup`.menuid=smain.sid and main.id=smain.mid and main.id='$mid' order by smain.priority") or die(mysql_error());
while($row = mysql_fetch_array( $query ))
{
	if($lang=='MR')
	{
		 $nm=$row['marathiname'];
	}
	else
	{
		 $nm=$row['name'];
	}
	
	 $path=$row['path'];
	 if(isset($_GET['mid'])!="")
     {
	 $sid=$row['sid'];

$queryz = mysql_query("SELECT smain.name,smain.path,smain.sid FROM `menup`,smain,main WHERE uid='$uid' and mtype='SM' and `menup`.menuid=smain.sid and main.id=smain.mid and main.id='$mid'") or die(mysql_error());
$rowz = mysql_fetch_row( $queryz );
if($rowz>1)
{
	  echo'     <li ';
	  if(isset($_GET['mid'])!="")
     {
	  $mn=$row['sid'];
	if($mn==$sid)
	{ 
	echo 'class="has-sub active"';}
    	 else
	{
		echo 'class="has-sub"';}
	 } 
	 else
	{
		echo 'class="has-sub"';}
	  
	  echo'> <a style="font-size: 13px;" href="javascript:;">
                        <b class="caret pull-right"></b>
						 <i class="fa fa-align-left"></i>';
}
else
{
	echo '<li><a style="font-size: 13px;" href='.$path.'>
                <i class="fa fa-circle-o"></i>';
}
     
				
            echo'    <span style="
    color: white;
">'.$nm.'</span>
                
              </a>
 <ul class="sub-menu">';

$query1 = mysql_query("SELECT sidemenu.sid,sidemenu.name,sidemenu.pathmn,sidemenu.mname FROM `smain`,sidemenu,menup where  sidemenu.smid=smain.sid and menup.menuid=sidemenu.sid and smain.sid='$sid' and  menup.uid='$uid' and mtype='LM' order by sidemenu.priority") or die(mysql_error());
while($row1 = mysql_fetch_array( $query1 ))
{
	
	if($lang=='MR')
	{
		 $snm=$row1['mname'];
	}
	else
	{
		 $snm=$row1['name'];
	}
	
	$path=$row1['pathmn'];

	$lid=$row1['sid'];
	echo '
	<li class="active"><a style="font-size: 13px;color: #ffff;" href=?link='.$lid.'&sid='.$sid.'&mid='.$mid.'>'.$snm.'</a></li>
	';

}
echo'</ul>
             </li>';
            
}
}
}
?>
					
					
					
					
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
		<?php
			if(isset($_GET['link'])!="")
  {
	 $lid=$_GET['link'];
	  $_SESSION['links']=$lid;
	  
	
	$query = mysql_query("SELECT pathmn FROM sidemenu WHERE sid='$lid' ") or die("problem");
	$row1 = mysql_fetch_array( $query );
	$inc=$row1['pathmn'];
	
	include $inc;
	
  }
  ?>
			
		</div>
		<!-- end #content -->
		
        <!-- begin theme-panel -->

        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
		<div id="footer" class="footer">
		    &copy; 2018 FDA MAHARASHTRA
		</div>
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="../assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="../assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<!--[if lt IE 9]>
		<script src="../assets/crossbrowserjs/html5shiv.js"></script>
		<script src="../assets/crossbrowserjs/respond.min.js"></script>
		<script src="../assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="../assets/js/theme/default.min.js"></script>
	<script src="../assets/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	<script src="../assets/plugins/highlight/highlight.common.js"></script>
	<script src="../assets/js/demo/render.highlight.js"></script>
	<script src="../assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="../assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="../assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
	<script src="../assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js"></script>
	<script src="../assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js"></script>
	<script src="../assets/plugins/DataTables/extensions/Buttons/js/jszip.min.js"></script>
	<script src="../assets/plugins/DataTables/extensions/Buttons/js/pdfmake.min.js"></script>
	<script src="../assets/plugins/DataTables/extensions/Buttons/js/vfs_fonts.min.js"></script>
	<script src="../assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js"></script>
	<script src="../assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js"></script>
	<script src="../assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="../assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js"></script>
	<script src="../assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
	<script src="../assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js"></script>
	<script src="../assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js"></script>
	<script src="../assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js"></script>
	<script src="../assets/js/demo/table-manage-combine.demo.min.js"></script>
	<script>
		$(document).ready(function() {
			App.init();
			TableManageCombine.init();
		});
	</script>

</body>


</html>

