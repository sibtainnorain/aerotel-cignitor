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
                <form role="form" class="form-horizontal">
                    <div class="row">
                        <div class=" col-sm-11"> 
                            <select class="form-control b-radius" id="change_owner_dd">
                                <option value="">- Select a Person -</option>
                            </select>
                        </div>
                    </div>
                </form>

                <div class="row mt20">
                    <button class="b-radius btn-large btn-primary1 modal-font" type="submit" style="min-width: 84%;margin-left:13px;line-height:30px;"> Change Owner</button>

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
                'stage_id': ''
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
        });
    });
</script>