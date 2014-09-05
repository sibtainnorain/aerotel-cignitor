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

    </head>
    <body>
        <div class="main-container" id="main-container">
            <div class="main-container-inner">
                <div class="main-content">
                    <div class="page-content">
                        <div class="page-inner">
                            <div class="page-header">
                                <div class="row">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th>LTZ Project Code</th>
                                                <td><?php echo $so_data['so_data']['so_header']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Service Order Number</th>
                                                <td><?php echo $so_data['so_data']['id']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><h5><b>Customer Hereinafter the "Customer"</b></h5></td>
                                            <td colspan="2"><h5><b><?php echo $so_data['customer_data']['customer_name']; ?></b></h5></td>
                                        </tr>
                                        <tr>
                                            <td>VAT Number</td>
                                            <td><?php echo $so_history[0]->stage_data->vat_number; ?></td>
                                            <td>Registration Number / ID Number</th>
                                            <td><?php echo $so_history[0]->stage_data->registration_number; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br />
                                <h4>Section A: Customer Contact Details</h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th colspan="4">Contact Details - Administrative Contact</th>
                                        </tr>
                                        <tr>
                                            <td class="active">Name</td>
                                            <td><?php echo $so_history[0]->stage_data->admin_name; ?></td>
                                            <td class="active">Designation</td>
                                            <td><?php echo $so_history[0]->stage_data->admin_designation; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="active">Direct Line</td>
                                            <td><?php echo $so_history[0]->stage_data->admin_direct_line; ?></td>
                                            <td class="active">Cell</td>
                                            <td><?php echo $so_history[0]->stage_data->admin_cell; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="active">Address</td>
                                            <td><?php echo $so_history[0]->stage_data->admin_address; ?></td>
                                            <td class="active">Email</td>
                                            <td><?php echo $so_history[0]->stage_data->admin_email; ?></td>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Contact Details - Technical Contact</th>
                                        </tr>
                                        <tr>
                                            <td class="active">Name</td>
                                            <td><?php echo $so_history[0]->stage_data->tech_name; ?></td>
                                            <td class="active">Designation</td>
                                            <td><?php echo $so_history[0]->stage_data->tech_designation; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="active">Direct Line</td>
                                            <td><?php echo $so_history[0]->stage_data->tech_direct_line; ?></td>
                                            <td class="active">Cell</td>
                                            <td><?php echo $so_history[0]->stage_data->tech_cell; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="active">Address</td>
                                            <td><?php echo $so_history[0]->stage_data->tech_address; ?></td>
                                            <td class="active">Email</td>
                                            <td><?php echo $so_history[0]->stage_data->tech_email; ?></td>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Contact Details - Billing Contact</th>
                                        </tr>
                                        <tr>
                                            <td class="active">Name</td>
                                            <td><?php echo $so_history[0]->stage_data->billing_name; ?></td>
                                            <td class="active">Designation</td>
                                            <td><?php echo $so_history[0]->stage_data->billing_designation; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="active">Direct Line</td>
                                            <td><?php echo $so_history[0]->stage_data->billing_direct_line; ?></td>
                                            <td class="active">Cell</td>
                                            <td><?php echo $so_history[0]->stage_data->billing_cell; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="active">Address</td>
                                            <td><?php echo $so_history[0]->stage_data->billing_address; ?></td>
                                            <td class="active">Email</td>
                                            <td><?php echo $so_history[0]->stage_data->billing_email; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br />
                                <h4>Section B: Service Details</h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th colspan="4">Service Specs</th>
                                        </tr>
                                        <tr>
                                            <td class="active">Country</td>
                                            <td><?php echo $so_data['so_data']['country']; ?></td>
                                            <td class="active">Order Type</td>
                                            <td><?php echo $so_data['so_data']['order_type']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="active">Special Terms</td>
                                            <td><?php echo $so_history[0]->stage_data->special_terms; ?></td>
                                            <td class="active">Service Type</td>
                                            <td><?php echo $so_data['so_data']['service_type']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="active">Town</td>
                                            <td><?php echo $so_history[0]->stage_data->suburb; ?></td>
                                            <td class="active">Technology Type</td>
                                            <td><?php echo $so_data['so_data']['technology_type']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="active">GPS Coordinates</td>
                                            <td><?php echo $so_history[0]->stage_data->gps_coordinates; ?></td>
                                            <td class="active">Bandwidth</td>
                                            <td><?php echo $so_history[0]->stage_data->bandwidth; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="active">Start Point</td>
                                            <td><?php echo $so_history[0]->stage_data->start_point; ?></td>
                                            <td class="active">End Point Address</td>
                                            <td><?php echo $so_history[0]->stage_data->end_point_address; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="active">Installation Address</td>
                                            <td colspan="3"><?php echo $so_history[0]->stage_data->installation_address; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="active">Notes</td>
                                            <td colspan="3"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br />
                                <h4>Section C: Account Manager Details</h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th colspan="4">Account Manager Details</th>
                                        </tr>
                                        <tr>
                                            <td class="active">Name</td>
                                            <td></td>
                                            <td class="active">Cell</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="active">Email</td>
                                            <td colspan="3"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br />
                                <h4>Section D: ISP Details</h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th colspan="4">ISP Contacts</th>
                                        </tr>
                                        <tr>
                                            <td class="active">Name</td>
                                            <td><?php echo $so_history[0]->stage_data->isp; ?></td>
                                            <td class="active">Address</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="active">Website</td>
                                            <td></td>
                                            <td class="active">VAT Number</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Contact Person - Details</th>
                                        </tr>
                                        <tr>
                                            <td class="active">Name</td>
                                            <td></td>
                                            <td class="active">Cell</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="active">Email</td>
                                            <td colspan="4"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>