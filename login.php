<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Page </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- resposive -->
        <!--<link href="../css/resposive/layout.css" rel="stylesheet" type="text/css" />-->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

          <script src="assets/jquery-3.min.js"></script>
<style type="text/css">
    html{
        background-size: cover;
    }

    .alert {
        display: none;
        background-color: rgb(233, 30, 107);
        border-color: #f3a7a7;
    }
     .bg-white{
          background-color: rgba(255, 255, 255, 0.65)!important;
      }
      .form-control {
        background-color: rgba(255, 255, 255, 0.49);
      }
      .btn-block:hover{
          background-color: rgba(179, 58, 193, 0.40)!important;
          border-color: rgba(125, 10, 197, 0.44);
      }
     #login_btn{
       background-color: rgba(204, 111, 222, 0.42);
       border-color: #eee;
     }
</style>

    </head>
    <body>
        <div class="login_logo"></div>
        <div class="form-box" id="">
            <div class="header" style="background-color: rgba(255, 255, 255, 0.65); color:rgb(69, 65, 64);">
                <div class="bg-logo">
                    <span style="font-size: 3em !important;">
                        <strong>Login</strong>
                    </span>
                </div>
            </div>
            <form id="form_login">
                <div class="body bg-white">
                    <br>
                     <div class="alert alert-warning alert-dismissable">
                      <i class="fa fa-warning"></i>
                      <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
                      <b>Error !</b>
                     User Login or Password tidak benar
                    </div>
                    <div class="form-group">
                        <input style="border:1px solid #c3c3c3;" required type="text" name="i_login" class="form-control" placeholder="User Login"/>
                    </div>
                    <div class="form-group">
                        <input style="border:1px solid #c3c3c3;" required type="password" name="i_password" class="form-control" placeholder="Password"/>
                      </div>
                      <div class="form-group">
                       <button id="login_btn" type="submit" class="btn btn-danger btn-block" style="margin-top:10px;">LOGIN</button>
                      </div>

                </div>

            </form>

<div></div>


        </div>

<span></span>




    </body>
</html>
<script type="text/javascript">
    $("#form_login").submit(function(e) {

    var url = "controllers/login.php?page=login"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#form_login").serialize(), // serializes the form's elements.
           dataType: 'json',
           success: function(data)
           {
               login_response(data); // show response from the php script.
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

    function login_response(status){
        if (status ==1) {
            window.location.href = "controllers/home.php";
        }  else {
                  $(".alert").fadeIn(1000, function(){
                  $(".alert");
         });
       }
    }
</script>
