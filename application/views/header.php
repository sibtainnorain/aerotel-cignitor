<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Field Task Management</title>
        <meta content="overview &amp; stats" name="description">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <!-- basic styles -->
        <link href="<?php echo asset_url();?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo asset_url();?>css/font-awesome.min.css" rel="stylesheet">
        <!--[if IE 7]>  <link rel="stylesheet" href="css/font-awesome-ie7.min.css" />  <![endif]--><!-- page specific plugin styles -->
        <link href="<?php echo asset_url();?>css/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">
        <link href="<?php echo asset_url();?>css/chosen.css" rel="stylesheet">
        <link href="<?php echo asset_url();?>css/datepicker.css" rel="stylesheet">
        <link href="<?php echo asset_url();?>css/bootstrap-timepicker.css" rel="stylesheet">
        <link href="<?php echo asset_url();?>css/daterangepicker.css" rel="stylesheet">
        <link href="<?php echo asset_url();?>css/colorpicker.css" rel="stylesheet"><!-- fonts -->
        <link href="<?php echo asset_url();?>css/ace-fonts.css" rel="stylesheet"><!-- ace styles -->
        <link href="<?php echo asset_url();?>css/ace.min.css" rel="stylesheet">
        <link href="<?php echo asset_url();?>css/ace-rtl.min.css" rel="stylesheet">
        <link href="<?php echo asset_url();?>css/ace-skins.min.css" rel="stylesheet">
        <link href="<?php echo asset_url();?>css/main.css" rel="stylesheet">
        <!--[if lte IE 8]>          
            <link rel="stylesheet" href="css/ace-ie.min.css" />          
        <![endif]-->
        <!-- inline styles related to this page --><!-- ace settings handler -->
        <script src="<?php echo asset_url();?>js/ace-extra.min.js"></script>
        <script src="<?php echo asset_url();?>/js/jquery-1.10.2.min.js"></script>
        <script>
            $(document).ready(function(){
               $(".logout-user").find("a").on("click", function(){
                    window.location.href = "login/logout";
                }); 
            });
    </script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --><!--[if lt IE 9]>        <script src="js/html5shiv.js"></script>        <script src="js/respond.min.js"></script>        <![endif]-->
    </head>

    <body>
        <div id="header">
            <style type="text/css">
                .logo-main          {               /*background-image: url(http://salespro.aerotelgroup.com/assets/img/logo-main-salespro.png);*/              background-image: url(http://salespro.aerotelgroup.com/assets/img/logo-main-inbox.png);         }           
            </style><!-- end css -->
            <table border="0" cellpadding="0" cellspacing="0" class="wide" style=
                   "height:52px; border: none; margin: 0px; padding: 0px;" width="100%">
                <tbody>
                    <tr>
                        <td class="logo-main" style="">&nbsp;</td>

                        <td id="logo-right" style=
                            " background-repeat: no-repeat; background-size: 100% 100%; background-image:url(http://salespro.aerotelgroup.com/assets/img/logo-right.gif);">
                            <!-- Notifications -->&nbsp;

                            <div class="navbar navbar-inner container-fluid" style=
                                 "background: none; padding: 0px; position: absolute; top: 0">
                                <ul class="nav ace-nav pull-left" style="padding:0; margin:0; margin-right: 2px; float: right;">
                                    <!-- to pull-right -->

                                    <li class="grey">
                                        <a class="dropdown-toggle" data-toggle=
                                           "dropdown" href=""><i class=
                                                              "icon-tasks"></i> <span class=
                                                              "badge badge-grey">0</span></a> 
                                                              <!--                                            <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">                                                 <li class="nav-header">                                                    <i class="icon-ok"></i>                                                                                                     3 Escalated Tasks                                               </li>                                                                                                <li>                                                   <a href="http://salespro.aerotelgroup.com/task/view/11">                                                        <div class="clearfix">                                                          <span class="pull-left">Task #10 === Price book update</span>                                                       </div>                                                  </a>                                                </li>                                               <li>                                                    <a href="http://salespro.aerotelgroup.com/task/view/12">                                                        <div class="clearfix">                                                          <span class="pull-left">Task #11 === Prepare Quote</span>                                                       </div>                                                  </a>                                                </li>                                               <li>                                                    <a href="http://salespro.aerotelgroup.com/task/view/65">                                                        <div class="clearfix">                                                          <span class="pull-left">Task #64 === Activity Metrics</span>                                                        </div>                                                  </a>                                                </li>                                                                                               <li>                                                    <a href="http://salespro.aerotelgroup.com/task/inbox">                                                      See tasks with details                                                      <i class="icon-arrow-right"></i>                                                    </a>                                                </li>                                           </ul>-->
                                    </li>

                                    <li class="purple">
                                        <a class="dropdown-toggle" data-toggle=
                                           "dropdown" href=""><i class=
                                                              "icon-bell-alt icon-animated-bell"></i>
                                            <span class=
                                                  "badge badge-important">0</span></a> 
                                                  <!--                                            <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">                                                 <li class="nav-header">                                                    <i class="icon-warning-sign"></i>                                                   4 Escalated Opportunities                                                                                                   </li>                                                                                               <li>                                                    <a href="http://salespro.aerotelgroup.com/opportunity/view/94">                                                     <div class="clearfix">                                                          <span class="pull-left">                                                                <i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>                                                                IT Infrastructure                                           </span>                                                         </div>                                                      </a>                                                    </li>                                                                                                       <li>                                                        <a href="http://salespro.aerotelgroup.com/opportunity/view/104">                                                            <div class="clearfix">                                                              <span class="pull-left">                                                                    <i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>                                                                    Tracking Trial                                          </span>                                                             </div>                                                          </a>                                                        </li>                                                                                                               <li>                                                            <a href="http://salespro.aerotelgroup.com/opportunity/view/107">                                                                <div class="clearfix">                                                                  <span class="pull-left">                                                                        <i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>                                                                        Group Pipeline by Sales stage                                           </span>                                                                 </div>                                                              </a>                                                            </li>                                                                                                                       <li>                                                                <a href="http://salespro.aerotelgroup.com/opportunity/view/171">                                                                    <div class="clearfix">                                                                      <span class="pull-left">                                                                            <i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>                                                                            The Core i 5, Intel processor                                           </span>                                                                     </div>                                                                  </a>                                                                </li>                                                                                                                               <li>                                                                    <a href="http://salespro.aerotelgroup.com/opportunity">                                                                     View Opportunities                                                                                                                                              <i class="icon-arrow-right"></i>                                                                    </a>                                                                </li>                                                           </ul>                       -->
                                    </li>

                                    <li class="green">
                                        <a class="dropdown-toggle" data-toggle=
                                           "dropdown" href=""><i class=
                                                              "icon-envelope icon-animated-vertical"></i>
                                            <span class=
                                                  "badge badge-success">0</span></a> 
                                                  <!--                                                                <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">                                                                     <li class="nav-header">                                                                        <i class="icon-envelope-alt"></i>                                                                       0 Escalated Cases                                                                   </li>                                                                                                                                       <li>                                                                        <a href="http://salespro.aerotelgroup.com/cases">                                                                           View cases                                                                          <i class="icon-arrow-right"></i>                                                                        </a>                                                                    </li>                                                               </ul>                       -->
                                    </li>
                                    <!-- lets tryna move this little box all the way to the right -->

                                    <li class="light-blue" style="">
                                        <a class="dropdown-toggle" data-toggle=
                                           "dropdown" href="javascript:void(0)"><img alt="Skhan" class=
                                                                "nav-user-photo" src="<?php echo asset_url();?>avatars/avatar5.png"> <span class=
                                                                "user-info"><small>Welcome,</small><?php print $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?></span>
                                            <i class="icon-caret-down"></i></a>

                                        <ul class=
                                            "user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
                                            <!-- <li>                                                                               <a href="http://salespro.aerotelgroup.com/admin/user/edit/5">                                                                                   <i class="icon-user"></i>                                                                                   My Profile                                                                              </a>                                                                            </li>                                                                                                                                                       <li class="divider"></li>                                                                           <li>                                                                                <a href="http://salespro.aerotelgroup.com/customer#" id="supportclick" onclick="logIssue()">                                                                                    <i class="icon-question-sign"></i>                                                                                  Report Problem                                                                              </a>                                                                            </li> --><!-- <li class="divider"></li> -->

                                            <li class="change-password">
                                                <a href="#"><i class=
                                                               "icon-lock"></i> Change
                                                    Password</a>
                                            </li>

                                            <li class="divider"></li>

                                            <li class="logout-user">
                                                <a href="#"><i class="icon-off"></i> Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul><!--/.ace-nav-->
                            </div><!-- modal to change password -->
                            <!-- Button to trigger modal --><!-- Modal -->

                            <div class="modal hide fade" id="change_pass" tabindex=
                                 "-1">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal"
                                            type="button">�</button>

                                    <h3 id="myModalLabel">Change Your Password</h3>
                                </div>

                                <form accept-charset="utf-8" action=
                                      ""
                                      class="form-horizontal" method="post" style=
                                      "height: 200px">
                                    <div class="modal-body">
                                        <div class="row-fluid control-group">
                                            <label class="control-label">Type
                                                current password</label>

                                            <div class="controls">
                                                <input class="input-xlarge" id=
                                                       "form_old_pass" name="old_pass"
                                                       type="password" value="">
                                            </div>
                                        </div>

                                        <div class="row-fluid control-group">
                                            <label class="control-label">Type new
                                                password</label>

                                            <div class="controls">
                                                <input class="input-xlarge" id=
                                                       "form_new_1" name="new_1" type=
                                                       "password" value="">
                                            </div>
                                        </div>

                                        <div class="row-fluid control-group">
                                            <label class="control-label">Confirm
                                                new password</label>

                                            <div class="controls">
                                                <input class="input-xlarge" id=
                                                       "form_new_confirm" name=
                                                       "new_confirm" type="password"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss=
                                                "modal">Cancel</button> <button class=
                                                "btn btn-primary">Change Password</button>
                                    </div>
                                </form>
                            </div><!-- end change pass -->
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="navbar navbar-inverse navbar-inner container-nav" style=
                 "background-color: black; height: 40px">
                <a class="btn btn-navbar" data-target=".nav-collapse" data-toggle=
                   "collapse"><span class="icon-bar"></span> <span class=
                                                                "icon-bar"></span> <span class="icon-bar"></span></a>

                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="libs_menu_links my_active_menu_link" id="">
                            <a href="" id="so_order"><span style="font-weight: bolder;">Service Orders</span></a>
                        </li>

                        <li class="libs_menu_links" id="">
                            <a href="" id="analytics"><span style="font-weight: bolder;">Analytics</span></a>
                        </li>

                        <li class="libs_menu_links" id="">
                            <a href="" id="admin"><span style="font-weight: bolder;">Admin</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- For Ajax request/ calls -->
            <style type="text/css">
                #toolbar{               width: 100%;                background-color: #cea;             border-bottom: 2px solid #333;          }                       #toolbar #toolbar-header{               font-size: 14px;                float: left;                font-weight: normal;                font-family: "Modata", Tahoma, Arial, sans-serif;               line-height: 24px;              margin-left: 5px;           }           #toolbar ul#toolbar-actions{                float: right;               list-style:none;                margin: 0;              padding: 0;         }           #toolbar ul#toolbar-actions li{             display: inline;                padding: 0px;           }           #toolbar ul#toolbar-actions li:hover{               /* background-color: #dfdfdf; */            }           #toolbar ul#toolbar-actions li a{               font-size: 11px;                color: #006699;             padding-right: 5px;             background: url(../images/default.png) no-repeat 0 0;               text-decoration: none;          }                       #toolbar ul#toolbar-actions li a.print{             background: url(../images/icons/print/Print_16x16.png) no-repeat 0 0;                   }                       #toolbar ul#toolbar-actions li a.print{             background: url(../images/icons/print/Print_16x16.png) no-repeat 0 0;                   }           #toolbar ul#toolbar-actions li a.close{             background: url(../images/icons/cancel/Cancel_16x16.png) no-repeat 0 0;         }           #toolbar ul#toolbar-actions li a.new{               background: url(../images/icons/print/New_16x16.png) no-repeat 0 0;                 }                       #toolbar ul#toolbar-actions li a:hover{             color: #663300;         }           /* What if we do not want the icon */               #toolbar ul#toolbar-actions li a.no-icon{               background: none;               padding: 0;         }                       
            </style>

            <div class="row-fluid" id="toolbar" style=
                 "background-color: #2f2e32; border: 1px solid #2f2e32 ; height: 48px; margin-top: 0px">
                <div class="row" id="submenu_bar" style=
                     " margin-left: 10px; /*margin-bottom:200px */"></div>

                <div class="span3 pull-right" id="alerts_container" style="color: gray; font-size: 13px; font-weight: normal; height: 48px; padding: 10px; padding-right: 1px; position: absolute; right: 0; text-align: center">
                    <?php print $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?>
                </div>
            </div>
        </div>
    </body>
</html>