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
            function clearRegistrationData()
            {
                $("#txtSOTitle").val("");
                $("#txtSiteCode").val("");
                $("#txtTechnologyType").val("");
                $("#txtServiceType").val("");
                $("#txtContractorName").val("");
                $("#txtContractorPhone").val("");
                $('#ddlCustomers option[value=0]').attr('selected', 'selected');
                $("#txtDescription").val("");
            }
            $(document).ready(function() {
                var lists_loaded = false;
                
                $.post("so/get_all_sos",
                       {'so_status': 'normal'},
                       function(result) {
                           var obj = $.parseJSON(result);
                           if (obj.status == 'SUCCESS')
                           {
                               if (obj.count > 0)
                               {
                                   var records = obj.records;
                                   var n_count = u_count = s_count = c_count = 0;
                                   
                                   for(var i = 0; i < records.length; i++)
                                   {
                                       var row = $('<tr></tr>');
                                       
                                       $('<td><b>' + records[i].so_number + '</b></td>').css('cursor', 'pointer').appendTo(row);
                                       $('<td>' + records[i].so_order_type + '</td>').css('cursor', 'pointer').appendTo(row);
                                       $('<td>' + records[i].so_technology_type + '</td>').css('cursor', 'pointer').appendTo(row);
                                       $('<td>' + records[i].so_service_type + '</td>').css('cursor', 'pointer').appendTo(row);
                                       $('<td>' + records[i].so_contractor_name + '</td>').css('cursor', 'pointer').appendTo(row);
                                       $('<td>' + records[i].so_location + '</td>').css('cursor', 'pointer').appendTo(row);
                                       
                                       $('<td><a style="text-decoration: none; padding: 0; " href="javascript:void(0);" title="Revert to previous stage" id="revert_stage_link"><button id="" class="btn btn-xs btn-danger the_delete_thing"><i class="icon-trash bigger-120"></i></button></a><?php if ($this->session->userdata('department_id') == 2){ ?>&nbsp;<a style="text-decoration: none; padding: 0;" title="Update Status" href="javascript:void(0);"><button class="btn btn-xs btn-info"><i class="icon-edit bigger-120"></i></button></a><?php }?>&nbsp;<a style="text-decoration: none; padding: 0;" title="Advance to next stage" href="javascript:void(0);"><button class="btn btn-xs btn-success"><i class="icon-ok bigger-120"></i></button> </a></td>').appendTo(row);
                                       
                                       if (records[i].so_status == 'normal')
                                       {
                                           $('#normal_sos_table').show();
                                           row.appendTo($('#normal_sos_table'));
                                           n_count+=1;
                                       }
                                       else if (records[i].so_status == 'urgent')
                                       {
                                           $('#urgent_sos_table').show();
                                           row.appendTo($('#urgent_sos_table'));
                                           u_count+=1;
                                       }
                                       else if (records[i].so_status == 'stalled')
                                       {
                                           $('#stalled_sos_table').show();
                                           row.appendTo($('#stalled_sos_table'));
                                           s_count+=1;
                                       }
                                       else if (records[i].so_status == 'canceled')
                                       {
                                           $('#canceled_sos_table').show();
                                           row.appendTo($('#canceled_sos_table'));
                                           c_count+=1;
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
                               (c_count == 0)
                               {
                                   $('#canceled_sos_table').hide();
                                   $('#canceled_sos').html('<div class="alert alert-error btn-block"> You do not have any Cancelled Service Orders.</div>');
                               }
                               
                               $('#normal_sos_count').html(n_count);
                               $('#urgent_sos_count').html(u_count);
                               $('#stalled_sos_count').html(s_count);
                               $('#canceled_sos_count').html(c_count);
                               
                           }
                });
                        
                $("#btnAddServiceOrder").click(function() {
                    if (!lists_loaded)
                    {
                        $.get("lists/get_country_list",
                            function(result) {
                               var obj = $.parseJSON(result);
                               if (obj.status == 'SUCCESS')
                               {
                                   var records = obj.records;

                                   for(var i = 0; i < records.length; i++)
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

                                   for(var i = 0; i < records.length; i++)
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

                                   for(var i = 0; i < records.length; i++)
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

                                   for(var i = 0; i < records.length; i++)
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

                                   for(var i = 0; i < records.length; i++)
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

                                   for(var i = 0; i < records.length; i++)
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

                                   for(var i = 0; i < records.length; i++)
                                   {
                                       $('<option value="' + records[i].customer_id + '">' + records[i].customer_name + '</option>').css('text-indent', '0px').appendTo($("#customer_dd"));
                                   }
                               }
                        });
                    }
                    lists_loaded = true;
                });
                
                $("#btnRegisterServiceOrder").click(function() {
                    if ($("#customer_dd option:selected").index() == 0){
                        alert("Please select a customer.");
                        return;
                    }
                    else if ($("#txtVatNumber").val() == "")
                    {
                        alert("Please enter VAT Number.");
                        return;
                    }
                    else if ($("#txtRegistrationNumber").val() == "")
                    {
                        alert("Please enter Registration Number.");
                        return;
                    }
                    else if ($("#txtAdminName").val() == "")
                    {
                        alert("Please enter Administrative Contact Name.");
                        return;
                    }
                    else if ($("#txtAdminDirectLine").val() == "")
                    {
                        alert("Please enter Administrative Contact Direct Line.");
                        return;
                    }
                    else if ($("#txtAdminAddress").val() == "")
                    {
                        alert("Please enter Administrative Contact Address.");
                        return;
                    }
                    else if ($("#txtAdminDesignation").val() == "")
                    {
                        alert("Please enter Administrative Contact Designation.");
                        return;
                    }
                    
                    else if ($("#txtAdminCell").val() == "")
                    {
                        alert("Please enter Administrative Contact Cell.");
                        return;
                    }
                    
                    else if ($("#txtAdminEmail").val() == "")
                    {
                        alert("Please enter Administrative Contact Email.");
                        return;
                    }
                    //Technical Contact Details
                    else if ($("#txtTechName").val() == "")
                    {
                        alert("Please enter Technical Contact Name.");
                        return;
                    }
                    
                    else if ($("#txtTechDirectLine").val() == "")
                    {
                        alert("Please enter Technical Contact Direct Line.");
                        return;
                    }
                    
                    else if ($("#txtTechAddress").val() == "")
                    {
                        alert("Please enter Technical Contact Address.");
                        return;
                    }
                    
                    else if ($("#txtTechDesignation").val() == "")
                    {
                        alert("Please enter Technical Contact Designation.");
                        return;
                    }
                    
                    else if ($("#txtTechCell").val() == "")
                    {
                        alert("Please enter Technical Contact Cell.");
                        return;
                    }
                    
                    else if ($("#txtTechEmail").val() == "")
                    {
                        alert("Please enter Technical Contact Email.");
                        return;
                    }
                    //Billing Contact Details
                    else if ($("#txtBillingName").val() == "")
                    {
                        alert("Please enter Billing Contact Name.");
                        return;
                    }
                    
                    else if ($("#txtBillingDirectLine").val() == "")
                    {
                        alert("Please enter Billing Contact Direct Line.");
                        return;
                    }
                    
                    else if ($("#txtBillingAddress").val() == "")
                    {
                        alert("Please enter Billing Contact Address.");
                        return;
                    }
                    
                    else if ($("#txtBillingDesignation").val() == "")
                    {
                        alert("Please enter Billing Contact Designation.");
                        return;
                    }
                    
                    else if ($("#txtBillingCell").val() == "")
                    {
                        alert("Please enter Billing Contact Cell.");
                        return;
                    }
                    
                    else if ($("#txtBillingEmail").val() == "")
                    {
                        alert("Please enter Billing Contact Email.");
                        return;
                    }
                    
                    else if ($("#country_dd option:selected").index() == 0)
                    {
                        alert("Please select Country.");
                        return;
                    }
                    
                    else if ($("#txtSpecialTerms").val() == "")
                    {
                        alert("Please enter Special Terms.");
                        return;
                    }
                    
                    else if ($("#txtInstallationAddress").val() == "")
                    {
                        alert("Please enter Installation Address.");
                        return;
                    }
                    
                    else if ($("#txtGpsCoordinates").val() == "")
                    {
                        alert("Please enter GPS Coordinates.");
                        return;
                    }
                    
                    else if ($("#order_type_dd option:selected").index() == 0)
                    {
                        alert("Please select Order Type.");
                        return;
                    }
                    
                    title = $("#txtSOTitle").val();
                    siteCode = $("#txtSiteCode").val();
                    technologyType = $("#txtTechnologyType").val();
                    serviceType = $("#txtServiceType").val();
                    contractorName = $("#txtContractorName").val();
                    contractorPhone = $("#txtContractorPhone").val();
                    customerId = $('#ddlCustomers').val();
                    description = $('#txtDescription').val();

                    if (customerId == 0 || title == "")
                    {
                        alert("Customer or Title couldn't be empty!");
                    }
                    else
                    {
                        $.post("../webservices/RegisterSO.php",
                                {title: title, customer: customerId, siteCode: siteCode, techType: technologyType, serType: serviceType, contrName: contractorName, contrPhone: contractorPhone, description: description},
                        function(ajaxresult) {
                            $('#normal_sos').html(ajaxresult);
                            $('#normal_sos_count').html($('#totalMySOCount').html());
                            clearRegistrationData();
                            $('#myModal').modal('hide');
                        });
                    }

                });//End btnRegisterServiceOrder
                $("#btnReset").click(function() {
                    clearRegistrationData();
                    $('#myModal').modal('hide');
                    editRecord = false;
                    editRecordId = -1;
                });//End btnReset
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
                <a class="menu-toggler" id="menu-toggler" href="#">	<span class="menu-text"></span>	
                </a>
                <div class="main-content">
                    <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try {
                                ace.settings.check('breadcrumbs', 'fixed')
                            } catch (e) {
                            }
                        </script>
                        <ul class="breadcrumb">
                            <li>	<i class="icon-home home-icon"></i>	Home</li>
                        </ul>
                        <!-- .breadcrumb -->
                    </div>
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
                                        <?php if ($this->session->userdata('department_id') == 1) {?>
                                            <button id="btnAddServiceOrder" type="button" style="min-width: 200px" class="btn-large btn-success1" data-toggle="modal" data-target="#myModal"><i class="icon-white icon-plus-sign"></i> New Service Order</button>
                                        <?php }?>



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
                                                            <th style="width: 20%">Order Type</th>
                                                            <th style="width: 20%">Technology Type</th>
                                                            <th style="width: 10%">Service Type</th>
                                                            <th style="width: 15%">Customer Name</th>
                                                            <th style="width: 15%">Location</th>
                                                            <th style="width: 12%">Action Bar</th>
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
                                                            <th style="width: 20%">Order Date</th>
                                                            <th style="width: 20%">Technology Type</th>
                                                            <th style="width: 10%">Service Type</th>
                                                            <th style="width: 15%">Customer Name</th>
                                                            <th style="width: 15%">Description</th>
                                                            <th style="width: 12%">Action Bar</th>
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
                                                            <th style="width: 20%">Order Date</th>
                                                            <th style="width: 20%">Technology Type</th>
                                                            <th style="width: 10%">Service Type</th>
                                                            <th style="width: 15%">Customer Name</th>
                                                            <th style="width: 15%">Description</th>
                                                            <th style="width: 12%">Action Bar</th>
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
                                                            <th style="width: 20%">Order Date</th>
                                                            <th style="width: 20%">Technology Type</th>
                                                            <th style="width: 10%">Service Type</th>
                                                            <th style="width: 15%">Customer Name</th>
                                                            <th style="width: 15%">Description</th>
                                                            <th style="width: 12%">Action Bar</th>
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
                                <!-- the popup was here guys -->
                                <div id="confirm_wrapper" style="display: none; font-size: 12px; color: white; background-color: #5C5E67;  ">Are you sure you want to delete?
                                    <br/>
                                    <button onclick="proceedAction()" style="min-width: 200px; margin-bottom: 10px; margin-top: 20px" class="btn-large btn-danger" type="button"> <i class="icon-white icon-trash"></i> Delete</button>
                                    <button onclick="cancelDelete()" style="min-width: 200px" class="btn-large btn-inverse" type="button">Cancel</button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header-1">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Create New Service Order</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h4><b>SO Header</b></h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <select class="input-large" name="customer_dd" id="customer_dd">
                                                                <option style="text-indent: 0px;">Select Customer</option>
                                                            </select>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="VAT Number" class="w100p modal-font" id="txtVatNumber"/>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Registration/ID Number" class="w100p modal-font" id="txtRegistrationNumber"/>
                                                        </form>
                                                    </div>
                                                </div>
                                                <br />
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h4><b>Administrative Contact</b></h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Name" class="w100p modal-font" id="txtAdminName"/>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Direct Line" class="w100p modal-font" id="txtAdminDirectLine"/>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Address" class="w100p modal-font" id="txtAdminAddress"/>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Designation" class="w100p modal-font" id="txtAdminDesignation"/>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Cell" class="w100p modal-font" id="txtAdminCell"/>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Email" class="w100p modal-font" id="txtAdminEmail"/>
                                                        </form>
                                                    </div>
                                                </div>
                                                <br />
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h4><b>Technical Contact</b></h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Name" class="w100p modal-font" id="txtTechName"/>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Direct Line" class="w100p modal-font" id="txtTechDirectLine"/>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Address" class="w100p modal-font" id="txtTechAddress"/>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Designation" class="w100p modal-font" id="txtTechDesignation"/>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Cell" class="w100p modal-font" id="txtTechCell"/>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Email" class="w100p modal-font" id="txtTechEmail"/>
                                                        </form>
                                                    </div>
                                                </div>
                                                <br />
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h4><b>Billing Contact</b></h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Name" class="w100p modal-font" id="txtBillingName"/>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Direct Line" class="w100p modal-font" id="txtBillingDirectLine"/>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Address" class="w100p modal-font" id="txtBillingAddress"/>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Designation" class="w100p modal-font" id="txtBillingDesignation"/>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Cell" class="w100p modal-font" id="txtBillingCell"/>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Email" class="w100p modal-font" id="txtBillingEmail"/>
                                                        </form>
                                                    </div>
                                                </div>
                                                <br />
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h4><b>Service Details</b></h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <select class="input-large" name="country_dd" id="country_dd">
                                                                <option value="4" style="text-indent: 0px;">Select Country</option>
                                                            </select>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Special Terms" class="w100p modal-font" id="txtSpecialTerms"/>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Installation Address" class="w100p modal-font" id="txtInstallationAddress"/>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="GPS Coordinates" class="w100p modal-font" id="txtGpsCoordinates"/>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <select class="input-large" name="order_type_dd" id="order_type_dd">
                                                                <option value="4" style="text-indent: 0px;">Select Order Type</option>
                                                            </select>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <select class="input-large" name="service_type_dd" id="service_type_dd">
                                                                <option value="4" style="text-indent: 0px;">Select Service Type</option>
                                                            </select>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Bandwidth" class="w100p modal-font" id="txtBandwidth"/>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <select class="input-large" name="technology_type_dd" id="technology_type_dd">
                                                                <option value="4" style="text-indent: 0px;">Select Technology Type</option>
                                                            </select>
                                                        </form>
                                                    </div>
                                                </div>
                                                <br />
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h4><b>ISP Details</b></h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <select class="input-large" name="isp_dd" id="isp_dd">
                                                                <option value="4" style="text-indent: 0px;">Select ISP Name</option>
                                                            </select>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Generated Date" class="w100p modal-font form-control" disabled="disabled" id="txtGeneratedDate" value="<?php $now = new DateTime(); echo $now->format('Y-m-d H:i:s'); ?>" />
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <select class="input-large" name="status" id="suburb_dd">
                                                                <option value="4" style="text-indent: 0px;">Select Suburb</option>
                                                            </select>
                                                        </form>
                                                    </div>
                                                </div>
                                                <br />
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h4><b>Financials</b></h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Description" class="w100p modal-font" id="txtFinanceDescription" />
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Units" class="w100p modal-font" id="txtFinanceUnits" />
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Term (Months)" class="w100p modal-font" id="txtFinanceTerm" />
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Install Charge" class="w100p modal-font" id="txtFinanceInstallCharge" />
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Monthly Charge" class="w100p modal-font" id="txtFinanceMonthlyCharge" />
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Subtotal(Exc VAT)" class="w100p modal-font" id="txtFinanceSubTotal" />
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="VAT @ 15%" class="w100p modal-font" id="txtFinanceVat" />
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="TOTAL" class="w100p modal-font" id="txtFinanceTotal" />
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="Start Point" class="w100p modal-font" id="txtFinanceStartPoint" />
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-sm-6">
                                                        <form action="" class="form-inline">
                                                            <input type="text" placeholder="End Point Address" class="w100p modal-font" id="txtFinanceEndPointAddress" />
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <button class="btn-large btn-primary1 ml11 modal-font" type="submit" style="min-width: 200px" id="btnRegisterServiceOrder"><i class="icon-white icon-plus-sign"></i> Create Service Order</button>
                                                    <button class="btn-large btn-warning1 modal-font" type="submit" style="min-width: 200px" id="btnReset"><i class="icon-white icon-remove"></i> Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->

                                <script>
                                    //Set the proceed url from clicked div's id
                                    var proceed_url;

                                    $(document).ready(function() {

                                        $(".the_delete_thing").click(function() {

                                            proceed_url = $(this).attr('id');
                                            $("tr").removeClass("clickable");

                                        });

                                    });

                                    function showConfirm() {
                                        var dia_ = $("#confirm_wrapper").dialog({
                                            modal: true,
                                            resizable: false,
                                            width: 230,
                                            minHeight: 200,
                                            title: 'Salespro Says:',
                                            hide: 'explode',
                                            closeOnEscape: true,
                                        });



                                    }

                                    function proceedAction() {
                                        window.location = proceed_url;
                                    }

                                    function cancelDelete() {
                                        $("#confirm_wrapper").dialog("destroy");
                                        $("tr").addClass("clickable");
                                    }
                                </script>
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
    <!--[if IE]><script type="text/javascript"> window.jQuery || document.write("<script src='js/jquery-1.10.2.min.js'>"+"<"+"/script>");</script><![endif]-->
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
    <!-- inline scripts related to this page -->
    <!-- inline scripts related to this page -->
</body>

</html>