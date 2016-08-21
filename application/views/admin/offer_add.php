
<script>
    jQuery(function($){
        $('#offer_add').on('click', function(){
            title =  $('input[name="title"]').val();
            link =   $('input[name="link"]').val();
            if(title.length <= 0 ){
                alert('Заполните title');
                return false;
            }
            if(link.length <= 0 ){
                alert('Заполните link');
                return false;
            }
            return true;
        });
    });

    function offer_check(){
        $.ajax({
            method: "POST",
            url: "/admin_ajax/offer_check/",
            data: {
                id:     $('input[name="id"]').val(),
                title:  $('input[name="title"]').val(),
                link:   $('input[name="link"]').val(),
                is_active: $('select[name="is_active"]').val(),
                type:   $('select[name="type"]').val(),
                sort:   $('input[name="sort"]').val()
            },
        }).done(function( json_data ) {
            var obj_data = jQuery.parseJSON( json_data );
            //console.log(obj_data);
            if(obj_data.is_error){
                alert(obj_data.msg);
                return false;
            }else{
                //window.location.href = "/admin/offer/";
                return true;
            }
        });
    }
</script>


<div>
    <div class="reg_form_title">
        <h1>Добавление кредитного оффера</h1>
        <table class="table">
            <form enctype="multipart/form-data" action="/admin/offer_add/" method="POST">
            <tr><td>title</td><td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputName1" placeholder="title" name="title" value="">
                    </div>
                </td></tr>
            <tr><td>link</td><td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputName2" placeholder="link" name="link" value="">
                    </div>
                </td></tr>
            <tr><td>is_active</td><td>
                    <div class="form-group">
                        <select name="is_active" class="form-control">
                            <option value="1">активный</option>
                            <option value="0">неактивный</option>
                        </select>
                    </div>
                </td></tr>
            <tr><td>type</td><td>
                    <div class="form-group">
                        <select name="type" class="form-control">
                            <option value="partner">partner</option>
                            <option value="creditor">creditor</option>
                        </select>
                    </div>
                </td></tr>
            <tr><td>sort</td><td>
                    <div class="form-group">
                        <input type="number" class="form-control" id="inputName3" placeholder="sort" name="sort" value="">
                    </div>
                </td></tr>
            <tr><td>sort</td><td>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile" name="userfile">
                        <p class="help-block">Загрузите файл</p>
                    </div>
                </td></tr>
            <tr><td colspan="2">
                    <input type="hidden" class="form-control" placeholder="sort" name="send_offer" value="1">
                    <input type="submit" id="offer_add" type="submit" name="submit" class="btn btn-primary btn-lg btn-block" style="width:150px">
                </td></tr>
            </form>
        </table>
    </div>
</div>

<div class="pad-50"></div>