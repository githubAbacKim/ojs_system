<div id="receiving-box" class="panel panel-green zoom-anim-dialog mfp-hide">
    <div class="panel-heading">
        <h4>Account Security Setting</h4>
    </div>
    <div class="panel-body">        
        
    </div>
    <div class="panel-footer">
        <div class="row">
        <div class="col-md-2 col-md-push-10">
            <input type="submit" name="request" value="Save" class="btn btn-outline btn-lg btn-success" />
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){  
        $('#gen_link').click(function(){
            var guest = $('#guest').val();
            var month = $('#month').val();
            var year = $('#year').val();
            
            if( year != '' && month != ''){
            $('#error_message').hide();
            $('#printLink').attr('href','<?php echo base_url("admin/bill_record_list");?>/' + month + '/' + year + '/' + guest);
            $('#printLink').show();
            
            }else{
                $('#error_message').show();
                $('#printLink').hide();
            }
        });
        $('#error_message').hide();
    });
</script>