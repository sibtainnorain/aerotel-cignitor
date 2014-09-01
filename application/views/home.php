<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- basic styles -->
        <link href="http://salespro.aerotelgroup.com/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
        <link href="<?php echo asset_url(); ?>css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/font-awesome.min.css" />

        <!--[if IE 7]>		  
            <link rel="stylesheet" href="<?php echo asset_url(); ?>css/font-awesome-ie7.min.css" />		  
        <![endif]-->

        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/jquery-ui-1.10.3.custom.min.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/chosen.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/datepicker.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/bootstrap-timepicker.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/daterangepicker.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/colorpicker.css" />

        <!-- fonts -->
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/ace-fonts.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/ace-rtl.min.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/main.css" />

        <!--[if lte IE 8]>		  
            <link rel="stylesheet" href="<?php echo asset_url(); ?>css/ace-ie.min.css" />		  
        <![endif]-->

        <!-- inline styles related to this page -->
        <!-- ace settings handler -->
        <script src="<?php echo asset_url(); ?>js/ace-extra.min.js"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
<!--        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>-->
        <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>		
            <script src="<?php echo asset_url(); ?>js/html5shiv.js"></script>		
            <script src="<?php echo asset_url(); ?>js/respond.min.js"></script>
        <![endif]-->

        <script>
            var selected_so = null;
            
            $(document).ready(function()
            {
                var lists_loaded = false;

                $.get("so/get_all_sos",
                {'user_id': '<?php echo $this->session->userdata('user_id'); ?>',
                 'department_id': '<?php echo $this->session->userdata('department_id'); ?>'
                },
                function(result) 
                {
                    var obj = $.parseJSON(result);
                    var n_count = u_count = s_count = c_count = 0;
                    
                    if (obj.status == 'SUCCESS')
                    {
                        var records = obj.records;
                        var department_id = '<?php echo $this->session->userdata('department_id'); ?>';
                        var current_user = '<?php echo $this->session->userdata('user_id'); ?>';
                        var user_is_supervisor = '<?php echo $this->session->userdata('is_supervisor'); ?>';
                        
                        if (obj.count > 0)
                        {
                            for (var i = 0; i < records.length; i++)
                            {
                                var row = $('<tr></tr>');
                                var action_buttons_td = $('<td></td>');
                                var revert_stage_btn = $('<a style="text-decoration: none; padding: 0; " href="javascript:void(0);" title="Revert to previous stage"><button data-toggle="modal" data-target="#revert_stage_modal" class="btn btn-xs btn-danger action_btn" value="' + records[i].id +'"><i class="icon-repeat bigger-120"></i></button></a>');
                                var update_notes_btn = $('<a style="text-decoration: none; padding: 0;" title="Update Notes" href="javascript:void(0);"><button data-toggle="modal" data-target="#update_notes_modal" class="btn btn-xs btn-info action_btn" value="' + records[i].id +'"><i class="icon-edit bigger-120"></i></button></a>');
                                var update_status_btn = $('<a style="text-decoration: none; padding: 0;" title="Update Status" href="javascript:void(0);"><button data-toggle="modal" data-target="#update_status_modal" class="btn btn-xs btn-info action_btn" value="' + records[i].id +'"><i class="icon-check bigger-120"></i></button></a>');
                                var next_stage_btn = $('<a style="text-decoration: none; padding: 0;" title="Advance to next stage" href="javascript:void(0);"><button data-toggle="modal" data-target="#next_stage_modal" class="btn btn-xs btn-success action_btn" value="' + records[i].id +'"><i class="icon-ok bigger-120"></i></button></a>');
                                var change_owner_btn = $('<a style="text-decoration: none; padding: 0;" title="Change Owner" href="javascript:void(0);"><button data-toggle="modal" data-target="#change_owner_modal" class="btn btn-xs btn-success action_btn" value="' + records[i].id +'"><i class="icon-user bigger-120"></i></button></a>');
                                
                                $('<td><b>' + records[i].id + '</b></td>').css('cursor', 'pointer').addClass('so_list_td').appendTo(row);
                                $('<td>' + records[i].order_type + '</td>').css('cursor', 'pointer').addClass('so_list_td').appendTo(row);
                                $('<td>' + records[i].technology_type + '</td>').css('cursor', 'pointer').addClass('so_list_td').appendTo(row);
                                $('<td>' + records[i].service_type + '</td>').css('cursor', 'pointer').addClass('so_list_td').appendTo(row);
                                $('<td>' + records[i].customer_name + '</td>').css('cursor', 'pointer').addClass('so_list_td').appendTo(row);
                                $('<td>' + records[i].country + '</td>').css('cursor', 'pointer').addClass('so_list_td').appendTo(row);

                                if (department_id == 1)
                                {
                                    //update_notes_btn.appendTo(action_buttons_td);
                                    next_stage_btn.appendTo(action_buttons_td);
                                    
                                }
                                else if (department_id == 2)
                                {
                                    update_status_btn.appendTo(action_buttons_td);
                                    if (records[i].department_id == department_id)
                                    {
                                        //update_notes_btn.appendTo(action_buttons_td);
                                        next_stage_btn.appendTo(action_buttons_td);
                                        revert_stage_btn.appendTo(action_buttons_td);
                                    }
                                }
                                else
                                {
                                    if (user_is_supervisor)
                                    {
                                        change_owner_btn.appendTo(action_buttons_td);
                                    }
                                    else
                                    {
                                        //update_notes_btn.appendTo(action_buttons_td);
                                        next_stage_btn.appendTo(action_buttons_td);
                                        revert_stage_btn.appendTo(action_buttons_td);
                                    }
                                }
                                
                                action_buttons_td.appendTo(row);
                                
                                if (records[i].status_id == 1)
                                {
                                    $('#normal_sos_table').show();
                                    row.appendTo($('#normal_sos_table'));
                                    n_count += 1;
                                }
                                else if (records[i].status_id == 2)
                                {
                                    $('#urgent_sos_table').show();
                                    row.appendTo($('#urgent_sos_table'));
                                    u_count += 1;
                                }
                                else if (records[i].status_id == 3)
                                {
                                    $('#stalled_sos_table').show();
                                    row.appendTo($('#stalled_sos_table'));
                                    s_count += 1;
                                }
                                else if (records[i].status_id == 4)
                                {
                                    $('#canceled_sos_table').show();
                                    row.appendTo($('#canceled_sos_table'));
                                    c_count += 1;
                                }

                                row = '';
                            }
                        }

                        if (n_count == 0)
                        {
                            $('#normal_sos_table').hide();
                            $('#normal_sos').html('<div class="alert alert-error btn-block"> You do not have any Normal Service Orders.</div>');
                        }
                        if (u_count == 0)
                        {
                            $('#urgent_sos_table').hide();
                            $('#urgent_sos').html('<div class="alert alert-error btn-block"> You do not have any Urgent Service Orders.</div>');
                        }
                        if (s_count == 0)
                        {
                            $('#stalled_sos_table').hide();
                            $('#stalled_sos').html('<div class="alert alert-error btn-block"> You do not have any Stalled Service Orders.</div>');
                        }
                        if (c_count == 0)
                        {
                            $('#canceled_sos_table').hide();
                            $('#canceled_sos').html('<div class="alert alert-error btn-block"> You do not have any Cancelled Service Orders.</div>');
                        }

                        $('#normal_sos_count').html(n_count);
                        $('#urgent_sos_count').html(u_count);
                        $('#stalled_sos_count').html(s_count);
                        $('#canceled_sos_count').html(c_count);

                        $('.action_btn').click(function(){
                            selected_so = $(this).parent().parent().siblings()[0].children[0].innerHTML;
                        });
                    }
                    
                    $('.so_list_td').click(function(){
                        window.location = 'so/so_details';
                    });
                });

                $("#btnAddServiceOrder").click(function()
                {
                    if (!lists_loaded)
                    {
                        $.get("lists/get_country_list",
                            function(result) {
                                var obj = $.parseJSON(result);
                                if (obj.status == 'SUCCESS')
                                {
                                    var records = obj.records;

                                    for (var i = 0; i < records.length; i++)
                                    {
                                        $('<option value="' + records[i].country_id + '">' + records[i].country_name + '</option>').css('text-indent', '0px').appendTo($("#country_dd"));
                                    }
                                }
                            });

                        $.get("lists/get_service_type_list",
                            function(result) {
                                var obj = $.parseJSON(result);
                                if (obj.status == 'SUCCESS')
                                {
                                    var records = obj.records;

                                    for (var i = 0; i < records.length; i++)
                                    {
                                        $('<option value="' + records[i].st_id + '">' + records[i].st_name + '</option>').css('text-indent', '0px').appendTo($("#service_type_dd"));
                                    }
                                }
                            });

                        $.get("lists/get_order_type_list",
                            function(result) {
                                var obj = $.parseJSON(result);
                                if (obj.status == 'SUCCESS')
                                {
                                    var records = obj.records;

                                    for (var i = 0; i < records.length; i++)
                                    {
                                        $('<option value="' + records[i].ot_id + '">' + records[i].ot_name + '</option>').css('text-indent', '0px').appendTo($("#order_type_dd"));
                                    }
                                }
                            });

                        $.get("lists/get_technology_type_list",
                            function(result) {
                                var obj = $.parseJSON(result);
                                if (obj.status == 'SUCCESS')
                                {
                                    var records = obj.records;

                                    for (var i = 0; i < records.length; i++)
                                    {
                                        $('<option value="' + records[i].tt_id + '">' + records[i].tt_name + '</option>').css('text-indent', '0px').appendTo($("#technology_type_dd"));
                                    }
                                }
                            });

                        $.get("lists/get_isp_list",
                            function(result) {
                                var obj = $.parseJSON(result);
                                if (obj.status == 'SUCCESS')
                                {
                                    var records = obj.records;

                                    for (var i = 0; i < records.length; i++)
                                    {
                                        $('<option value="' + records[i].isp_id + '">' + records[i].isp_name + '</option>').css('text-indent', '0px').appendTo($("#isp_dd"));
                                    }
                                }
                            });

                        $.get("lists/get_suburb_list",
                            function(result) {
                                var obj = $.parseJSON(result);
                                if (obj.status == 'SUCCESS')
                                {
                                    var records = obj.records;

                                    for (var i = 0; i < records.length; i++)
                                    {
                                        $('<option value="' + records[i].suburb_code + '">' + records[i].suburb_name + '</option>').css('text-indent', '0px').appendTo($("#suburb_dd"));
                                    }
                                }
                            });

                        $.get("lists/get_customer_list",
                            function(result) {
                                var obj = $.parseJSON(result);
                                if (obj.status == "SUCCESS")
                                {
                                    var records = obj.records;

                                    for (var i = 0; i < records.length; i++)
                                    {
                                        $('<option value="' + records[i].customer_id + '">' + records[i].customer_name + '</option>').css('text-indent', '0px').appendTo($("#customer_dd"));
                                    }
                                }
                            });
                    }
                    lists_loaded = true;
                });
            });
        </script>

    </head>
    <body>
        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.check('main-container', 'fixed')
                } catch (e) {
                }
            </script>
            <div class="main-container-inner">
                <div class="main-content">
                    <div class="page-content">
                        <div class="page-inner">
                            <div class="page-header">
                                <div class="task clearfix">
                                    <h1>									Service Orders								</h1>	
                                    <div class="pull-right">	<span class="btn btn-app btn-sm btn-success no-radius">										<span class="bigger-175">0</span>	
                                            <br>	<span class="smaller-90">Today</span>	</span>	<span class="btn btn-app btn-sm btn-inverse no-radius">										<span class="bigger-175">0</span>	
                                            <br>	<span class="smaller-90">Week</span>	</span>	<span class="btn btn-app btn-warning btn-sm no-radius">										<span class="bigger-175">0</span>	
                                            <br>	<span class="smaller-90">Month</span>	</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="widget-header-1 widget-header-flat-1 widget-header-small-1 pull-right" style="width:254px;">
                                        <h5>										<i class="icon-tasks"></i>										Service Orders Closed									</h5>	
                                    </div>
                                </div>
                                <legend></legend>
                                <form method="post" action="" accept-charset="utf-8">
                                    <div class="row" style="margin-left: 10px">
                                        <input class="span3 typeahead" placeholder="Search by SO Title" style="margin-right: 5px" id="tasks" name="title" value="" type="text" />
                                        <select class="span3" name="status" id="form_status">
                                            <option value="0" style="text-indent: 0px;" selected="selected">- Select SO Status -</option>
                                            <option value="4" style="text-indent: 0px;">Normal</option>
                                            <option value="1" style="text-indent: 0px;">Urgent</option>
                                            <option value="2" style="text-indent: 0px;">Stalled</option>
                                            <option value="3" style="text-indent: 0px;">Cancelled</option>
                                        </select>
                                        <select class="span3" name="assigned" id="form_assigned">
                                            <option value="" style="text-indent: 0px;" selected="selected">- Select SO Owner -</option>
                                            <option value="37" style="text-indent: 0px;">Cole Myers</option>
                                            <option value="38" style="text-indent: 0px;">James Mackie</option>
                                            <option value="39" style="text-indent: 0px;">Noel Langton</option>
                                        </select>
                                    </div>
                                    <div class="row" style="margin-left: 10px; margin-top: 10px">
                                        <!-- for buttons -->
                                        <button class="btn-large btn-primary1" type="submit" style="min-width: 200px"><i class="icon-white icon-search"></i> Search</button>
                                        <a href="#" style="text-decoration: none">
                                            <button class="btn-large btn-warning1" style="min-width: 200px" type="button"> <i class="icon-white icon-th-list"></i> Show All Service Orders</button>
                                        </a>
                                        <?php if ($this->session->userdata('department_id') == 1) { ?>
                                            <button id="btnAddServiceOrder" type="button" style="min-width: 200px" class="btn-large btn-success1" data-toggle="modal" data-target="#create_so_modal"><i class="icon-white icon-plus-sign"></i> New Service Order</button>
                                        <?php } ?>



                                    </div>
                                    <input type="hidden" id="activate_fld" name="activate_fld" value="" />
                                </form>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->
                                    <div class="space-4"></div>
                                    <!-- Tabbed View -->
                                    <div class="tabbable" id='tasks'>
                                        <ul class="nav nav-tabs">
                                            <li class="active">	
                                                <a data-toggle="tab" href="#normal_sos">Normal Service Orders &nbsp;<span class="badge badge-success" id="normal_sos_count"></span></a>	
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#urgent_sos">Urgent Service Orders &nbsp;<span class="badge badge-danger" id="urgent_sos_count"></span></a>	
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#stalled_sos">Stalled Service Orders &nbsp;<span class="badge badge-pink" id="stalled_sos_count"></span></a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#canceled_sos">Cancelled Service Orders &nbsp;<span class="badge badge-grey" id="canceled_sos_count"></span></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane " id="open">
                                                <!-- start open tasks -->
                                                <div class="alert alert-error btn-block"></div>
                                                <!-- end open tasks -->
                                            </div>
                                            <div class="tab-pane" id="closed">
                                                <!-- start closed tasks -->
                                                <div class="alert alert-error btn-block"></div>
                                                <!-- end closed tasks -->
                                            </div>
                                            <!-- start my tasks -->
                                            <div class="tab-pane active" id="normal_sos">
                                                <table class="table table-striped" id="normal_sos_table" style="display: none;">
                                                    <thead>
                                                        <tr class="header-columns">
                                                            <th style="width: 10%">SO Number</th>
                                                            <th style="width: 15%">Order Type</th>
                                                            <th style="width: 20%">Technology Type</th>
                                                            <th style="width: 10%">Service Type</th>
                                                            <th style="width: 15%">Customer Name</th>
                                                            <th style="width: 15%">Location</th>
                                                            <th style="width: 15%">Action Bar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="urgent_sos">
                                                <table class="table table-striped" id="urgent_sos_table">
                                                    <thead>
                                                        <tr class="header-columns">
                                                            <th style="width: 10%">SO Number</th>
                                                            <th style="width: 15%">Order Date</th>
                                                            <th style="width: 20%">Technology Type</th>
                                                            <th style="width: 10%">Service Type</th>
                                                            <th style="width: 15%">Customer Name</th>
                                                            <th style="width: 15%">Location</th>
                                                            <th style="width: 15%">Action Bar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="stalled_sos">
                                                <table class="table table-striped" id="stalled_sos_table">
                                                    <thead>
                                                        <tr class="header-columns">
                                                            <th style="width: 10%">SO Number</th>
                                                            <th style="width: 15%">Order Date</th>
                                                            <th style="width: 20%">Technology Type</th>
                                                            <th style="width: 10%">Service Type</th>
                                                            <th style="width: 15%">Customer Name</th>
                                                            <th style="width: 15%">Location</th>
                                                            <th style="width: 15%">Action Bar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="canceled_sos">
                                                <table class="table table-striped" id="canceled_sos_table">
                                                    <thead>
                                                        <tr class="header-columns">
                                                            <th style="width: 10%">SO Number</th>
                                                            <th style="width: 15%">Order Date</th>
                                                            <th style="width: 20%">Technology Type</th>
                                                            <th style="width: 10%">Service Type</th>
                                                            <th style="width: 15%">Customer Name</th>
                                                            <th style="width: 15%">Location</th>
                                                            <th style="width: 15%">Action Bar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end container -->
                                <!-- Create SO Modal -->
                                <?php include 'create_so_modal.php'; ?>
                                <!-- Create SO Modal -->
                                <!-- Revert Stage Modal -->
                                <div class="modal fade" id="revert_stage_modal" tabindex="-1" role="dialog" aria-labelledby="revert_stage_modalLabel" aria-hidden="true">
                                    <div class="modal-dialog b-radius" style="width:500px;">
                                        <div class="modal-content b-radius" style="background-color:#eee">
                                            <div class="modal-header-1">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="revert_stage_modalLabel" style="font-family: Trebuchet MS,Tahoma,Verdana,Arial,sans-serif;
                                                    font-size: 1.1em;">Revert SO to previous stage</h4>
                                            </div>
                                            <div class="modal-body" style="padding-top:10px;">
                                                <form role="form" class="form-horizontal">
                                                    <div class="row">
                                                        <textarea rows="8" class="col-xs-10 col-sm-12" placeholder="Notes" id="revert_stage_notes" style="resize: none;"></textarea>
                                                    </div>
                                                </form>

                                                <div class="row mt20">
                                                    <button class="b-radius btn-large btn-primary1 modal-font" type="submit" style="min-width: 84%;margin-left:36px;line-height:30px;">Revert SO to previous stage</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Revert Stage Modal -->
                                <!-- Update Notes Modal -->
                                <div class="modal fade" id="update_notes_modal" tabindex="-1" role="dialog" aria-labelledby="update_notes_modalLabel" aria-hidden="true">
                                    <div class="modal-dialog b-radius" style="width:500px;">
                                        <div class="modal-content b-radius" style="background-color:#eee">
                                            <div class="modal-header-1">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="update_notes_modalLabel" style="font-family: Trebuchet MS,Tahoma,Verdana,Arial,sans-serif;
                                                    font-size: 1.1em;">Update Notes</h4>
                                            </div>
                                            <div class="modal-body" style="padding-top:10px;">
                                                <form role="form" class="form-horizontal">
                                                    <div class="row">

                                                        <textarea rows="8" class="col-sm-12" placeholder="Notes" id="update_notes_notes" style="resize: none;"></textarea>

                                                    </div>
                                                </form>

                                                <div class="row mt20">
                                                    <button class="b-radius btn-large btn-primary1 modal-font" type="submit" style="min-width: 84%;margin-left:36px;line-height:30px;">Add Notes</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Update Notes Modal -->
                                <?php include 'change_owner_modal.php' ;?>
                                
                                <?php 
                                    if ($this->session->userdata('department_id') == 1) 
                                    {
                                        include 'stage_1-2_modal.php';
                                    }    
                                    else if ($this->session->userdata('department_id') == 2) 
                                    {
                                        include 'update_so_status_modal.php';
                                        include 'stage_2-3_modal.php';
                                    }
                                ?>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.page-content -->
            </div>
        </div>
        <!-- /.main-container-inner -->
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">	<i class="icon-double-angle-up icon-only bigger-110"></i>	
        </a>
    </div>
    <!-- /.main-container -->
    <!-- basic scripts -->
    <!--[if !IE]> -->
    <script type="text/javascript">
        window.jQuery || document.write("<script src='<?php echo asset_url(); ?>js/jquery-2.0.3.min.js'>" + "<" + "/script>");
    </script>
    <!-- <![endif]-->
    <!--[if IE]><script type="text/javascript"> window.jQuery || document.write("<script src='<?php echo asset_url(); ?>js/jquery-1.10.2.min.js'>"+"<"+"/script>");</script><![endif]-->
    <script type="text/javascript">
        if ("ontouchend" in document)
            document.write("<script src='<?php echo asset_url(); ?>js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/typeahead-bs2.min.js"></script>
    <!-- page specific plugin scripts -->
    <!--[if lte IE 8]>		  <script src="js/excanvas.min.js"></script>		  <![endif]-->
    <script src="<?php echo asset_url(); ?>js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/chosen.jquery.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/fuelux/fuelux.spinner.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/date-time/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/date-time/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/date-time/moment.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/date-time/daterangepicker.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/jquery.knob.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/jquery.autosize.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/jquery.inputlimiter.1.3.1.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/jquery.maskedinput.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap-tag.min.js"></script>
    <!-- ace scripts -->
    <script src="<?php echo asset_url(); ?>js/ace-elements.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/ace.min.js"></script>
</body>

</html>