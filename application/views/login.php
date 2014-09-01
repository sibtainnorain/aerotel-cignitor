<?php
session_start();
session_unset();
session_destroy();
session_write_close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Please login here</title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- basic styles -->

        <link href="<?php echo asset_url();?>css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo asset_url();?>css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo asset_url();?>css/main.css">
        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo asset_url();?>/font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->

        <!-- fonts -->

        <link rel="stylesheet" href="<?php echo asset_url();?>css/ace-fonts.css" />

        <!-- ace styles -->

        <link rel="stylesheet" href="<?php echo asset_url();?>css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo asset_url();?>css/ace-rtl.min.css" />

        <!--[if lte IE 8]>
                <link rel="stylesheet" href="<?php echo asset_url();?>css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
                <script src="<?php echo asset_url();?>js/html5shiv.js"></script>
                <script src="<?php echo asset_url();?>js/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo asset_url();?>js/jquery-1.10.2.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#loginForm").submit(function(event) {
                    event.preventDefault();

                    username = $("#txtUsername").val();
                    password = $("#txtPassword").val();
                    $.get("login/authenticate",
                        {username: username, password: password, platform: 'web'},
                        function(result) {
                            var json = $.parseJSON(result);
                            if (json.status == 'SUCCESS')
                            {
                                window.location = json.redirect_url;
                            }
                            else if (json.status == 'FAILURE')
                            {
                                alert(json.message);
                            }
                    });
                });
            });
        </script>
    </head>
    <body class="login">
        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="login-box mt col-sm-8 center">
                    <img src="assets/img/inbox-login.png" alt="">
                    <div class="log-form">
                        <form id="loginForm">
                            <div class="form-group">

                                <input type="text" id="txtUsername" class="form-control" placeholder="User name">
                            </div>
                            <div class="form-group">

                                <input type="password" id="txtPassword" class="form-control"  placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-inverse"><i class="icon-white icon-user"></i>Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo asset_url();?>js/jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
            <script type="text/javascript">
             window.jQuery || document.write("<script src='<?php echo asset_url();?>js/jquery-1.10.2.min.js'>"+"<"+"/script>");
            </script>
        <![endif]-->

        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='<?php echo asset_url();?>js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>

        <!-- inline scripts related to this page -->

        <script type="text/javascript">
            function show_box(id) {
                jQuery('.widget-box.visible').removeClass('visible');
                jQuery('#' + id).addClass('visible');
            }
        </script>
    </body>
</html>