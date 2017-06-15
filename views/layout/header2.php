<?php

if(!$_SESSION['login']){
    header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>.: Kedai Taman :.</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Popup Modal -->
        <link href="../css/popModal.css" type="text/css" rel="stylesheet" >
        <!-- Preview -->
        <link href="../css/preview.css" type="text/css" rel="stylesheet" >
         <!-- iCheck for checkboxes and radio inputs -->
        <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />
         <!-- daterange picker -->
        <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap time Picker -->
        <link href="../css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <!-- datepicker -->
       <link href="../css/datepicker/datepicker.css" rel="stylesheet">
       
       <!-- lookup -->
       <link rel="stylesheet" type="text/css" href="../css/lookup/bootstrap-select.css">
       <!-- Button -->
	   <link rel="stylesheet" type="text/css" href="../css/button/component.css" />
       <!-- tooptip meja -->
       <link rel="stylesheet" type="text/css" href="../css/tooltip/tooltip-classic.css" />
      
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <!-- footable 
           <link href="../css/footable/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css"/>
            <link href="../css/footable/footable.standalone.css" rel="stylesheet" type="text/css"/>
           
           
            <script src="../js/footable/footable.js?v=2-0-1" type="text/javascript"></script>
            <script src="../js/footable/footable.sort.js?v=2-0-1" type="text/javascript"></script>
            <script src="../js/footable/footable.filter.js?v=2-0-1" type="text/javascript"></script>
            <script src="../js/footable/footable.paginate.js?v=2-0-1" type="text/javascript"></script>
            <script src="../js/footable/bootstrap-tab.js" type="text/javascript"></script>
         -->

        <!-- jQuery 2.0.2 -->
       <script src="../js/jquery.js"></script>
        <script src="../js/function.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
       	<!-- date-range-picker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="../js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="../js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="../js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- pop Modal-->
        <script src="../js/popup/popModal.js"></script>
        <!-- bootstrap time picker -->
        <script src="../js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- Datepicker -->
        <script src="../js/plugins/datepicker/bootstrap-datepicker.js"></script>
		<!-- select -->
		<script type="text/javascript" src="../js/lookup/bootstrap-select.js"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- validasi -->
        <script src="../js/plugins/validate/jquery.validate.js" type="text/javascript"></script>
        <!-- button -->
        <script src="../js/button/modernizr.custom.js"></script>
		<script src="../js/button/classie.js"></script>
        <!-- find scroll -->
		
       
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../index.php" class="logo" >
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
               
                  <td width="86%" align="center"><span style="font-size:12px; font-weight:bold; color:#0FF">Kedai Taman</span><br><span style="font-weight:bold;">SOTO KUDUS</span></td>
              </tr>
              </tr>
            </table>

            	
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
              	<div class="header_new"></div>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                      
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>
                                    <?php
                                        $user_data = get_user_data();
                                        echo $user_data[0];
                                    ?>
                                     <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-new-red">
                                <?php
                            
							if($user_data[2]==""){
								$img = "../img/user/default.jpg";
							}else{
								$img = "../img/user/".$user_data[2];
							}
							?>
                                    <img src="<?= $img ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php
                                        
                                        echo $user_data[0];
                                        ?>
                                        <small><?php
                                        
                                        echo $user_data[1];
                                        ?></small>
                                    </p>
                                </li>
                              
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="edit_admin.php?page=form" class="btn btn-default btn-flat"  style="height:40px !important; padding-top:10px !important">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat" style="height:40px !important; padding-top:10px !important">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php
               // include("../views/layout/left_side.php");
            ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
        
				<script type="text/javascript">

					$().ready(function() {
						
						var container = $('div.alert.alert-danger-1');
						
						// validate the form when it is submitted
						var validator = $("#createForm").validate({
							errorContainer: container,
							errorLabelContainer: $("ol", container),
							wrapper: 'li'
						});
						
					});
        		</script>

<style>	
   
	div.alert.alert-danger-1 {
		display: none
	}
	.alert.alert-danger-1 label.error {
		display: inline;
	}

	
	form.cmxform label.error {
		display: block;
		margin-left: 1em;
		width: auto;
	}
	
	</style>
 <div class="alert alert-danger-1">
                   	 <ol>
                       
                    </ol>
            	</div>






