<!DOCTYPE html>

<html lang="en">


<head>
	<meta charset="utf-8" />
	<title>FDA | Login </title>
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
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login bg-black animated fadeInDown">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <span class="logo"></span> <b>FDA</b> Maharashtra
                    <small></small>
                </div>
                <div class="icon">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <!-- end brand -->
            <!-- begin login-content -->
            <div class="login-content">
                <form action="login-exec.php" method="POST" class="margin-bottom-0">
                    <div class="form-group m-b-20">
                        <input type="text" name="login" class="form-control form-control-lg inverse-mode" placeholder="User Name" required />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" name="pass" class="form-control form-control-lg inverse-mode" placeholder="Password" required />
                    </div>
                   
					<div class="form-group m-b-20">
             
  <select name="logintype" id="fda" class="form-control form-control-lg " >
	                                        <option id="1" value="ADMIN">--Login as--</option>
	                                        <option id="2" value="Commissioner">Commissioner</option>
                                            <option id="3" value="JCHQ">JC (HQ)</option>
                                            <option id="4" value="JC">JC</option>
                                               <option id="5" value="AO">AO</option>
                                               <option id="6" value="ACHQ">AC (HQ)</option>
	                                        <option id="7" value="DO">DO</option>
	                                        <option id="8" value="FSOHQ">FSO (HQ)</option>
	                                        <option id="9" value="FSO">FSO</option>
											
											 <option id="l1" value="code">Coding</option>
											 <option id="l2" value="fooda">Food Analyst</option>
											 <option id="l3" value="an">Analyst</option>
											 <option id="l4" value="store">Store</option>
											
											
	                                   
	                                    </select>
										
										
					
					</div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
                    </div>
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end login -->
        
       
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
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>

</body>


</html>

