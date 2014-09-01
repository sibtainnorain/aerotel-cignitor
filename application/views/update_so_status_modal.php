<!-- Update Status Modal -->
<div class="modal fade" id="update_status_modal" tabindex="-1" role="dialog" aria-labelledby="update_status_modalLabel" aria-hidden="true">
    <div class="modal-dialog b-radius" style="width:300px;">
        <div class="modal-content b-radius" style="background-color:#eee">
            <div class="modal-header-1">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="update_status_modalLabel" style="font-family: Trebuchet MS,Tahoma,Verdana,Arial,sans-serif;
                    font-size: 1.1em;">Update SO Status</h4>
            </div>
            <div class="modal-body" style="padding-top:10px;">
                <form class = "form-inline" id="update_status_form">
                    <div class="row">
                        <div class=" col-sm-11"> 
                            <select class="form-control" id="update_status_dd" name="update_status_dd">
                                <option>- Select a Status -</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt20">
                        <button id="updateStatusBtn" class="b-radius btn-large btn-primary1 modal-font" style="min-width: 84%;margin-left:13px;line-height:30px;">Update Status</button>
                    </div>
                    <input type="hidden" id="update_status_so_id" name="so_id"/>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $.get("so/get_so_statuses",
            function(result) {
                var obj = $.parseJSON(result);

                if (obj.status == 'SUCCESS')
                {
                    var records = obj.records;

                    for (var i = 0; i < records.length; i++)
                    {
                        $('<option value="' + records[i].status_id + '">' + records[i].status_name + '</option>').css('text-indent', '0px').appendTo($("#update_status_dd"));
                    }
                }
        });

//        $('#update_status_form').bootstrapValidator({
//            excluded: [':disabled', ':hidden', ':not(:visible)'],
//            feedbackIcons: {
//                valid: 'glyphicon glyphicon-ok',
//                invalid: 'glyphicon glyphicon-remove',
//                validating: 'glyphicon glyphicon-refresh'
//            },
//            live: 'enabled',
//            message: 'This value is not valid',
//            submitButtons: 'button[type="submit"]',
//            trigger: null,
//            fields: {
//            }
//        });
        
        $('#update_status_modal').on('shown.bs.modal', function() {
            $('#update_status_form').bootstrapValidator('resetForm', true);
        });
        
        $('#updateStatusBtn').on('click', function(event) {
            var $form = $('#update_status_form');
            $('#update_status_so_id').val(selected_so);
            
            if ($('#update_status_dd option:selected').index() == 0)
            {
                alert('Please select a status'); 
                return;
            }
            
            $.ajax({
                type: 'get',
                url: 'so/update_so_status',
                data: $form.serialize(),
                success: function(result) {
                    var obj = $.parseJSON(result);

                    if (obj.status == 'SUCCESS')
                    {
                        $('#update_status_modal').modal('hide');
                        window.location = 'home';
                    }
                }
            });
        });
    });
</script>
