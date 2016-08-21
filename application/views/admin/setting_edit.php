<script>
    jQuery(function($){
        $('#setting_change').on('click', function(){
            setting_change();
            return false;
        });
    });

    function setting_change(){

        if($('input[name="value"]').val()){
            val = $('input[name="value"]').val();
        }else{
            val = $('select[name="value"]').val();
        }

        $.ajax({
            method: "POST",
            url: "/admin_ajax/setting_change/",
            data: {
                id: $('input[name="id"]').val(),
                value: val,
                sort: $('input[name="sort"]').val(),
            },
        }).done(function( json_data ) {
            var obj_data = jQuery.parseJSON( json_data );
            //console.log(obj_data);
            if(obj_data.is_error){
                alert(obj_data.msg);
            }else{
                window.location.href = "/admin/setting/";
            }
        });
    }
</script>

<div>
    <div class="reg_form_title">
        <h1>Редактирование настройки <?=$Setting->name?></h1>
        <table class="table">
            <tr><td>id</td><td><?=$Setting->id?></td></tr>
            <tr><td>name</td><td><?=$Setting->name?></td></tr>
            <tr><td>value</td><td>
                    <div class="form-group">
                        <?php if($Setting->name == 'cur_payment'): ?>
                            <select name="value" class="form-control">
                                <option value="yandex" <?php if($Setting->value == 'yandex') echo "selected"; ?> >yandex</option>
                                <option value="payeer" <?php if($Setting->value == 'payeer') echo "selected"; ?> >payeer</option>
                            </select>
                        <?php else: ?>
                            <input type="text" class="form-control" id="inputName1" placeholder="value" name="value" value="<?=$Setting->value?>">
                        <?php endif; ?>

                    </div>
                </td></tr>
            <tr><td>type</td><td><?=$Setting->type?></td></tr>
            <tr><td>sort</td><td>
                    <div class="form-group">
                        <input type="number" class="form-control" id="inputName2" placeholder="sort" name="sort" value="<?=$Setting->sort?>">
                        <input type="hidden" class="form-control" id="inputName3" name="id" value="<?=$Setting->id?>">
                    </div>
                </td></tr>
            <tr><td>group</td><td><?=$Setting->group?></td></tr>
            <tr><td>description</td><td><?=$Setting->description?></td></tr>
            <tr><td colspan="2">
                    <button id="setting_change" type="submit" name="submit" class="btn btn-primary btn-lg btn-block" style="width:150px">изменить</button>
                </td></tr>
        </table>
    </div>
</div>
<div class="pad-50"></div>