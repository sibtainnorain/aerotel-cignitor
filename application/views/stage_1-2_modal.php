<script type="text/javascript" src="<?php echo asset_url(); ?>js/bootstrapValidator.min.js"></script>
<link rel="stylesheet" href="<?php echo asset_url(); ?>css/bootstrapValidator.min.css" />

<!-- Advance Stage Modal -->
<div class="modal fade" id="next_stage_modal" tabindex="-1" role="dialog" aria-labelledby="next_stage_modalLabel" aria-hidden="true">
    <div class="modal-dialog b-radius" style="width:500px;">
        <div class="modal-content b-radius" style="background-color:#eee">
            <div class="modal-header-1">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="next_stage_modalLabel" style="font-family: Trebuchet MS,Tahoma,Verdana,Arial,sans-serif;
                    font-size: 1.1em;">Advance to next stage</h4>
            </div>
            <div class="modal-body" style="padding-top:10px;">
                <form role="form" id="next_stage_form" class="form-horizontal">
                    <div class="row mt20">
                        <textarea rows="8" class="col-xs-10 col-sm-12" placeholder="Notes" id="next_stage_notes" name="next_stage_notes" style="resize: none;"></textarea>
                    </div>
                    <div class="row mt20">
                        <button id="advanceStageBtn" class="b-radius btn-large btn-primary1 modal-font" style="min-width: 84%;margin-left:35px;line-height:30px;">Advance to next stage</button>
                    </div>
                    <input type="hidden" name="current_stage" value="1" />
                    <input type="hidden" name="next_stage" value="2" />
                    <input type="hidden" id="so_id" name="so_id" value="" />
                    <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
                    <input type="hidden" name="department_id" value="<?php echo $this->session->userdata('department_id'); ?>" />
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
//    $('#next_stage_form').bootstrapValidator({
//        excluded: [':disabled', ':hidden', ':not(:visible)'],
//        feedbackIcons: {
//            valid: 'glyphicon glyphicon-ok',
//            invalid: 'glyphicon glyphicon-remove',
//            validating: 'glyphicon glyphicon-refresh'
//        },
//        live: 'enabled',
//        message: 'This value is not valid',
//        trigger: null,
//        fields: {
//            next_stage_notes: {
//                validators: {
//                    notEmpty: {
//                        message: 'Notes are required'
//                    }
//                }
//            }
//        }
//    });
    
    $('#next_stage_modal').on('shown.bs.modal', function() {
        $('#next_stage_form').bootstrapValidator('resetForm', true);
    });
    
    $('#advanceStageBtn').on('click', function(event) {
        var $form = $('#next_stage_form');
        $('#so_id').val(selected_so);
        
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