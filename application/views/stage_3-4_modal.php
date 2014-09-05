<script type="text/javascript" src="<?php echo asset_url(); ?>js/bootstrapValidator.min.js"></script>
<link rel="stylesheet" href="<?php echo asset_url(); ?>css/bootstrapValidator.min.css" />

<!-- Advance Stage Modal -->
<div class="modal fade" id="next_stage_modal" tabindex="-1" role="dialog" aria-labelledby="next_stage_modalLabel" aria-hidden="true">
    <div class="modal-dialog b-radius" style="width:610px;">
        <div class="modal-content b-radius" style="background-color:#eee">
            <div class="modal-header-1">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="next_stage_modalLabel" style="font-family: Trebuchet MS,Tahoma,Verdana,Arial,sans-serif;
                    font-size: 1.1em;">Advance to next stage</h4>
            </div>
            <div class="modal-body" style="padding-top:10px;">
                <form role="form" class="form-horizontal" id="next_stage_form">
                    <div class="row mt20">
                        <div class="col-sm-6"> 
                            <input type = "text" title="Allocated By" readonly="readonly" class = "form-control" id = "txtCheckedBy" name = "txtAllocatedBy" value="<?php print $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?>" />
                        </div>
                        <div class="col-sm-6">
                            <input type = "text" title="Date of Allocation to Contractor" readonly="readonly" class = "form-control" id = "txtDateAllocated" name = "txtDateAllocated" value="<?php $now = new DateTime(); echo $now->format('m-d-Y'); ?>" />
                        </div>
                    </div>
                    <div class="row mt20">
                        <div class=" col-sm-6"> 
                            <select class="form-control b-radius" id="contractor_name_dd">
                                <option value="">- Contractor Name -</option>
                            </select>
                        </div>
                        <div class=" col-sm-6"> 
                            <select class="form-control b-radius" id="impl_engineer_dd">
                                <option value="">- Implementation Engineer Details -</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt20">
                        <div>
                            <textarea rows="8" class="col-xs-10 col-sm-12" placeholder="Notes" id="next_stage_notes" name="next_stage_notes" style="resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="row mt20">
                        <button id="advanceStageBtn" class="b-radius btn-large btn-primary1 modal-font" style="min-width: 84%;margin-left:35px;line-height:30px;">Advance to next stage</button>
                    </div>
                    <input type="hidden" name="current_stage" value="3" />
                    <input type="hidden" name="next_stage" value="4" />
                    <input type="hidden" id="stage_3-4_so_id" name="so_id" value="" />
                    <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
                    <input type="hidden" name="department_id" value="<?php echo $this->session->userdata('department_id'); ?>" />
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $.get("user/get_all_contractors",
    function(result) 
    {
        var obj = $.parseJSON(result);
        if (obj.status == 'SUCCESS')
        {
            var records = obj.records;

            for (var i = 0; i < records.length; i++)
            {
                $('<option value="' + records[i].user_id + '">' + records[i].first_name + ' ' + records[i].last_name + '</option>').css('text-indent', '0px').appendTo($("#contractor_name_dd"));
            }
        }
        
    });
    
    $('#next_stage_modal').on('shown.bs.modal', function() {
        $('#next_stage_form').bootstrapValidator('resetForm', true);
    });
    
    $('#advanceStageBtn').on('click', function(event) {
        var $form = $('#next_stage_form');
        $('#stage_2-3_so_id').val(selected_so);
        
        $.ajax({
            type: 'get',
            url: 'so/next_stage',
            data: $form.serialize(),
            success: function(result) {
                var obj = $.parseJSON(result);
                
                if (obj.status == 'SUCCESS')
                {
                    $('#next_stage_modal').modal('hide');
                    window.location = 'home';
                }
            }
        });

        event.preventDefault();
    });
});
</script>