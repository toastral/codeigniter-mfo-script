<script>
    jQuery(function($){
        $('#email_pass_change').on('click', function(){
            email_pass_change();
            return false;
        });
    });
    function email_pass_change(){
        $.ajax({
            method: "POST",
            url: "/admin_ajax/update_email_pass/",
            data: {
                email: $('input[name="email"]').val(),
                pass:  $('input[name="pass"]').val(),
            },
        }).done(function( json_data ) {
            var obj_data = jQuery.parseJSON( json_data );
            //console.log(obj_data);
            if(obj_data.is_error){
                alert(obj_data.msg);
            }else{
                window.location.href = "/admin/upacc/";
            }
        });
    }
</script>

<div>
    <div class="reg_form_title">
        <h1>Email и пароль</h1>
        <table class="table">
            <tr><td>title</td><td>
                    <div class="form-group">
                        <input type="email" class="form-control" id="inputName1" placeholder="email" name="email" value="<?=$Personal_data->email?>">
                    </div>
                </td></tr>
            <tr><td>link</td><td>
                    <div class="form-group">
                        <input type="password" class="form-control" id="inputName1" placeholder="password" name="pass" value="">
                    </div>
                </td></tr>
            <tr><td colspan="2">
                    <button id="email_pass_change" type="submit" name="submit" class="btn btn-primary btn-lg btn-block" style="width:150px">изменить</button>
                </td></tr>
        </table>
    </div>
</div>

<div class="pad-50"></div>