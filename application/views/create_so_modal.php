<script type="text/javascript" src="<?php echo asset_url(); ?>js/bootstrapValidator.min.js"></script>
<link rel="stylesheet" href="<?php echo asset_url(); ?>css/bootstrapValidator.min.css" />

<div class = "modal fade" id = "create_so_modal" tabindex = "-1" role = "dialog" aria-labelledby = "create_so_modalLabel" aria-hidden = "true">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header-1">
                <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;
                </button>
                <h4 class = "modal-title" id = "create_so_modalLabel">Create New Service Order</h4>
            </div>
            <div class = "modal-body">
                <form id="create_so_form" class = "form-inline">
                    <div class = "row">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "SO Header" class = "form-control" id = "txtSoHeader" name = "txtSoHeader"/>
                        </div>
                    </div>
                    <div class="row mt20">
                        <div class = "col-sm-6">
                            <select class = "form-control" name = "customer_dd" id = "customer_dd">
                                <option style = "text-indent: 0px;">- Select Customer -</option>
                            </select>
                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "VAT Number" class = "form-control" id = "txtVatNumber" name = "txtVatNumber"/>
                        </div>
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Registration/ID Number" class = "form-control" id = "txtRegistrationNumber" name = "txtRegistrationNumber"/>
                        </div>
                    </div>
                    <br />
                    <div class = "row">
                        <div class = "col-sm-6">
                            <h4><b>Administrative Contact</b></h4>
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Name" class = "form-control" id = "txtAdminName" name = "txtAdminName"/>
                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Direct Line" class = "form-control" id = "txtAdminDirectLine" name = "txtAdminDirectLine"/>
                        </div>
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Address" class = "form-control" id = "txtAdminAddress" name = "txtAdminAddress"/>
                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Designation" class = "form-control" id = "txtAdminDesignation" name = "txtAdminDesignation"/>
                        </div>
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Cell" class = "form-control" id = "txtAdminCell" name = "txtAdminCell"/>
                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Email" class = "form-control" id = "txtAdminEmail" name = "txtAdminEmail"/>
                        </div>
                    </div>
                    <br />
                    <div class = "row">
                        <div class = "col-sm-6">
                            <h4><b>Technical Contact</b></h4>
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Name" class = "form-control" id = "txtTechName" name = "txtTechName"/>
                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Direct Line" class = "form-control" id = "txtTechDirectLine" name = "txtTechDirectLine"/>

                        </div>
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Address" class = "form-control" id = "txtTechAddress" name = "txtTechAddress"/>

                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Designation" class = "form-control" id = "txtTechDesignation" name = "txtTechDesignation"/>

                        </div>
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Cell" class = "form-control" id = "txtTechCell" name = "txtTechCell"/>

                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Email" class = "form-control" id = "txtTechEmail" name = "txtTechEmail"/>

                        </div>
                    </div>
                    <br />
                    <div class = "row">
                        <div class = "col-sm-6">
                            <h4><b>Billing Contact</b></h4>
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Name" class = "form-control" id = "txtBillingName" name = "txtBillingName"/>

                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Direct Line" class = "form-control" id = "txtBillingDirectLine" name = "txtBillingDirectLine"/>

                        </div>
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Address" class = "form-control" id = "txtBillingAddress" name = "txtBillingAddress"/>

                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Designation" class = "form-control" id = "txtBillingDesignation" name = "txtBillingDesignation"/>

                        </div>
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Cell" class = "form-control" id = "txtBillingCell" name = "txtBillingCell"/>

                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Email" class = "form-control" id = "txtBillingEmail" name = "txtBillingEmail"/>

                        </div>
                    </div>
                    <br />
                    <div class = "row">
                        <div class = "col-sm-6">
                            <h4><b>Service Details</b></h4>
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "col-sm-6">
                            <select class = "form-control" name = "country_dd" id = "country_dd">
                                <option style = "text-indent: 0px;">- Select Country -</option>
                            </select>
                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Special Terms" class = "form-control" id = "txtSpecialTerms" name = "txtSpecialTerms"/>

                        </div>
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Installation Address" class = "form-control" id = "txtInstallationAddress" name = "txtInstallationAddress"/>

                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "GPS Coordinates" class = "form-control" id = "txtGpsCoordinates" name = "txtGpsCoordinates"/>

                        </div>
                        <div class = "col-sm-6">
                            <select class = "form-control" name = "order_type_dd" id = "order_type_dd">
                                <option style = "text-indent: 0px;">- Select Order Type -</option>
                            </select>
                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <select class = "form-control" name = "service_type_dd" id = "service_type_dd">
                                <option style = "text-indent: 0px;">- Select Service Type -</option>
                            </select>
                        </div>
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Bandwidth" class = "form-control" id = "txtBandwidth" name = "txtBandwidth"/>

                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <select class = "form-control" name = "technology_type_dd" id = "technology_type_dd">
                                <option style = "text-indent: 0px;">- Select Technology Type -</option>
                            </select>
                        </div>
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Start Point" class = "form-control" id = "txtStartPoint" name = "txtStartPoint" />
                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "End Point Address" class = "form-control" id = "txtEndPointAddress" name = "txtEndPointAddress" />
                        </div>
                    </div>
                    <br />
                    <div class = "row">
                        <div class = "col-sm-6">
                            <h4><b>ISP Details</b></h4>
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "col-sm-6">
                            <select class = "form-control" name = "isp_dd" id = "isp_dd">
                                <option style = "text-indent: 0px;">- Select ISP Name -</option>
                            </select>
                        </div>
                    </div>
<!--                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" title="Generated Date" placeholder = "" class = "form-control form-control" disabled = "disabled" id = "txtGeneratedDate" value = "<?php $now = new DateTime(); echo $now->format('Y-m-d H:i:s'); ?>" />
                        </div>
                        <div class = "col-sm-6">
                            <input type = "text" title="Account Manager" placeholder = "" class = "form-control form-control" disabled = "disabled" id = "txtAccountManager" value = "<?php print $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?>" />
                        </div>
                    </div>-->
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <select class = "form-control" name = "suburb_dd" id = "suburb_dd">
                                <option value = "4" style = "text-indent: 0px;">- Select Suburb -</option>
                            </select>
                        </div>
                    </div>
                    <br />
                    <div class = "row">
                        <div class = "col-sm-6">
                            <h4><b>Financials</b></h4>
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Description" class = "form-control" id = "txtFinanceDescription" name = "txtFinanceDescription" />

                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Units" class = "form-control" id = "txtFinanceUnits" name = "txtFinanceUnits" />

                        </div>
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Term (Months)" class = "form-control" id = "txtFinanceTerm" name = "txtFinanceTerm" />

                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Install Charge" class = "form-control" id = "txtFinanceInstallCharge" name = "txtFinanceInstallCharge" />

                        </div>
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Monthly Charge" class = "form-control" id = "txtFinanceMonthlyCharge" name = "txtFinanceMonthlyCharge" />

                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "Subtotal(Exc VAT)" class = "form-control" id = "txtFinanceSubTotal" name = "txtFinanceSubTotal" />

                        </div>
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "VAT @ 15%" class = "form-control" id = "txtFinanceVat" name = "txtFinanceVat" />

                        </div>
                    </div>
                    <div class = "row mt20">
                        <div class = "col-sm-6">
                            <input type = "text" placeholder = "TOTAL" class = "form-control" id = "txtFinanceTotal" name = "txtFinanceTotal" />

                        </div>
                        
                    </div>
                    <div class = "row mt20">
                        <button class = "btn-large btn-primary1 ml11 modal-font" style = "min-width: 200px" id = "btnRegisterServiceOrder"><i class = "icon-white icon-plus-sign"></i>Create Service Order</button>
                        <button class = "btn-large btn-warning1 modal-font" style = "min-width: 200px" id = "btnReset"><i class = "icon-white icon-remove"></i>Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#create_so_form').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        live: 'enabled',
        message: 'This value is not valid',
        trigger: null,
        fields: {
            txtSoHeader: {
                validators: {
                    notEmpty: {
                        message: 'SO Header is required'
                    }
                }
            },
            txtVatNumber: {
                validators: {
                    notEmpty: {
                        message: 'VAT Number is required'
                    },
                    numeric: {
                        message: 'VAT Number must be a number'
                    }
                }
            },
            txtRegistrationNumber: {
                validators: {
                    notEmpty: {
                        message: 'Registration Number is required'
                    }
                }
            },
            txtAdminName: {
                validators: {
                    notEmpty: {
                        message: 'Name is required'
                    }
                }
            },
            txtAdminDirectLine: {
                validators: {
                    notEmpty: {
                        message: 'Direct Line is required'
                    }
                }
            },
            txtAdminAddress: {
                validators: {
                    notEmpty: {
                        message: 'Address is required'
                    }
                }
            },
            txtAdminDesignation: {
                validators: {
                    notEmpty: {
                        message: 'Designation is required'
                    }
                }
            },
            txtAdminCell: {
                validators: {
                    notEmpty: {
                        message: 'Cell is required'
                    }
                }
            },
            txtAdminEmail: {
                validators: {
                    notEmpty: {
                        message: 'Email is required'
                    },
                    emailAddress: {
                        message: 'Enter a valid email address'
                    }
                }
            },
            txtTechName: {
                validators: {
                    notEmpty: {
                        message: 'Name is required'
                    }
                }
            },
            txtTechDirectLine: {
                validators: {
                    notEmpty: {
                        message: 'Direct Line is required'
                    }
                }
            },
            txtTechAddress: {
                validators: {
                    notEmpty: {
                        message: 'Address is required'
                    }
                }
            },
            txtTechDesignation: {
                validators: {
                    notEmpty: {
                        message: 'Designation is required'
                    }
                }
            },
            txtTechCell: {
                validators: {
                    notEmpty: {
                        message: 'Cell is required'
                    }
                }
            },
            txtTechEmail: {
                validators: {
                    notEmpty: {
                        message: 'Email is required'
                    },
                    emailAddress: {
                        message: 'Enter a valid email address'
                    }
                }
            },
            txtBillingName: {
                validators: {
                    notEmpty: {
                        message: 'Name is required'
                    }
                }
            },
            txtBillingDirectLine: {
                validators: {
                    notEmpty: {
                        message: 'Direct Line is required'
                    }
                }
            },
            txtBillingAddress: {
                validators: {
                    notEmpty: {
                        message: 'Address is required'
                    }
                }
            },
            txtBillingDesignation: {
                validators: {
                    notEmpty: {
                        message: 'Designation is required'
                    }
                }
            },
            txtBillingCell: {
                validators: {
                    notEmpty: {
                        message: 'Cell is required'
                    }
                }
            },
            txtBillingEmail: {
                validators: {
                    notEmpty: {
                        message: 'Email is required'
                    },
                    emailAddress: {
                        message: 'Enter a valid email address'
                    }
                }
            },
            txtSpecialTerms: {
                validators: {
                    notEmpty: {
                        message: 'Special Terms are required'
                    }
                }
            },
            txtInstallationAddress: {
                validators: {
                    notEmpty: {
                        message: 'Installation Address is required'
                    }
                }
            },
            txtGpsCoordinates: {
                validators: {
                    notEmpty: {
                        message: 'GPS Coordinates are required'
                    }
                }
            },
            txtBandwidth: {
                validators: {
                    notEmpty: {
                        message: 'Bandwidth is required'
                    }
                }
            },
            txtFinanceDescription: {
                validators: {
                    notEmpty: {
                        message: 'Description is required'
                    }
                }
            },
            txtFinanceUnits: {
                validators: {
                    notEmpty: {
                        message: 'Units are required'
                    }
                }
            },
            txtFinanceTerm: {
                validators: {
                    notEmpty: {
                        message: 'Term is required'
                    }
                }
            },
            txtFinanceInstallCharge: {
                validators: {
                    notEmpty: {
                        message: 'Install Charge is required'
                    }
                }
            },
            txtFinanceMonthlyCharge: {
                validators: {
                    notEmpty: {
                        message: 'Monthly Charge is required'
                    }
                }
            },
            txtFinanceSubTotal: {
                validators: {
                    notEmpty: {
                        message: 'Subtotal is required'
                    }
                }
            },
            txtFinanceVat: {
                validators: {
                    notEmpty: {
                        message: 'VAT is required'
                    }
                }
            },
            txtFinanceTotal: {
                validators: {
                    notEmpty: {
                        message: 'Total is required'
                    }
                }
            },
            txtFinanceStartPoint: {
                validators: {
                    notEmpty: {
                        message: 'Start Point is required'
                    }
                }
            },
            txtFinanceEndPointAddress: {
                validators: {
                    notEmpty: {
                        message: 'End Point Address is required'
                    }
                }
            }
        }
    });
    
    $('#create_so_modal').on('shown.bs.modal', function() {
        $('#create_so_form').bootstrapValidator('resetForm', true);
    });
    
    $('#btnRegisterServiceOrder').on('click', function(event) {
        var form = $('#create_so_form');
        
        $.ajax({
            type: 'get',
            url: 'so/create_so',
            data: form.serialize(),

            success: function(result) {
                var obj = $.parseJSON(result);
                
                if (obj.status == 'SUCCESS')
                {
                    window.location = 'home';
                }
            }
        });

        //event.preventDefault();
    });
    
    $('#btnReset').on('click', function(event){
        $('#create_so_modal').modal('hide');
    });
});
</script>