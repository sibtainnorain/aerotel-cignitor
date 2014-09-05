<!-- Change Owner Modal -->
<div class="modal fade" id="change_owner_modal" tabindex="-1" role="dialog" aria-labelledby="change_owner_modalLabel" aria-hidden="true">
    <div class="modal-dialog b-radius" style="width:300px;">
        <div class="modal-content b-radius" style="background-color:#eee">
            <div class="modal-header-1">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="change_owner_modalLabel" style="font-family: Trebuchet MS,Tahoma,Verdana,Arial,sans-serif;
                    font-size: 1.1em;">Allocate SO to Operative</h4>
            </div>
            <div class="modal-body" style="padding-top:10px;">
                <form id="change_owner_form" role="form" class="form-horizontal">
                    <div class="row">
                        <div class=" col-sm-11"> 
                            <select class="form-control b-radius" id="change_owner_dd" name="change_owner_dd">
                                <option value="">- Select a Person -</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="change_owner_so_id" name="so_id" value="" />
                </form>
                <div class="row mt20">
                    <button id="changeOwnerBtn" class="b-radius btn-large btn-primary1 modal-font" style="min-width: 84%;margin-left:13px;line-height:30px;"> Change Owner</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Change Owner Modal -->
<script type="text/javascript">
    $(document).ready(function() {
        $.get("user/get_department_users",
            {
                'department_id': '<?php echo $this->session->userdata('department_id'); ?>',
                'stage_number': '<?php echo $this->session->userdata('stage_number'); ?>'
            },
            function(result) {
                var obj = $.parseJSON(result);
                
                if (obj.status == 'SUCCESS')
                {
                    var records = obj.records;
                    var current_user = <?php echo $this->session->userdata('user_id'); ?>
                    
                    for(var i = 0; i<records.length; i++)
                    {
                        if (records[i].user_id != current_user)
                        {
                            $('<option value="' + records[i].user_id + '">' + records[i].first_name + ' ' + records[i].last_name + '</option>').css('text-indent', '0px').appendTo($("#change_owner_dd"));
                        }
                    }
                }
            }
        );
        
        $('#changeOwnerBtn').on('click', function(event) {
            var $form = $('#change_owner_form');
            $('#change_owner_so_id').val(selected_so);

            $.ajax({
                type: 'get',
                url: 'so/change_so_owner',
                data: $form.serialize(),
                success: function(result) {
                    var obj = $.parseJSON(result);

                    if (obj.status == 'SUCCESS')
                    {
                        $('#change_owner_modal').modal('hide');
                        window.location = 'home';
                    }
                }
            });

            event.preventDefault();
    });
    
//        $.get("so/change_so_owner",
//            {'so_id': selected_so,
//             'user_id': $('#change_owner_dd').val()
//            },
//            function(result)
//            {
//                var obj = $.parseJSON(result);
//                
//                if (obj.status == 'SUCCESS')
//                {
//                    window.location = 'home';
//                    
//                }
//            }
//        );
    });
</script>