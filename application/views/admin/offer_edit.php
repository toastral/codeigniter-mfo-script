<script>
    jQuery(function($){
        $('#offer_change').on('click', function(){
            offer_change();
            return false;
        });
    });
    function offer_change(){
        $.ajax({
            method: "POST",
            url: "/admin_ajax/offer_change/",
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
            }else{
                window.location.href = "/admin/offer/";
            }
        });
    }
</script>

<!--
public $id;
public $title;
public $link;
public $img;
public $is_active;
public $type;
public $sort;
-->

<div>
    <div class="reg_form_title">
        <h1>Редактирование кредитного оффера id:<?=$Offer->id?></h1>
        <table class="table">
            <tr><td>id</td><td><?=$Offer->id?></td></tr>
            <tr><td>title</td><td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputName1" placeholder="title" name="title" value="<?=$Offer->title?>">
                    </div>
                    </td></tr>
            <tr><td>link</td><td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputName2" placeholder="link" name="link" value="<?=$Offer->link?>">
                    </div>
                </td></tr>
            <tr><td>is_active</td><td>
                    <div class="form-group">
                        <select name="is_active" class="form-control">
                            <option value="1" <?php if($Offer->is_active) echo "selected"; ?> >активный</option>
                            <option value="0" <?php if(!$Offer->is_active) echo "selected"; ?>>неактивный</option>
                        </select>
                    </div>
                </td></tr>
            <tr><td>type</td><td>
                    <div class="form-group">
                        <select name="type" class="form-control">
                            <option value="partner" <?php if($Offer->type == 'partner') echo "selected"; ?> >partner</option>
                            <option value="creditor" <?php if($Offer->type == 'creditor') echo "selected"; ?>>creditor</option>
                        </select>
                    </div>
                </td></tr>
            <tr><td>sort</td><td>
                    <div class="form-group">
                        <input type="number" class="form-control" id="inputName3" placeholder="sort" name="sort" value="<?=$Offer->sort?>">
                    </div>
                </td></tr>
            <tr><td colspan="2">
                    <input type="hidden" class="form-control" id="inputName4" name="id" value="<?=$Offer->id?>">
                    <button id="offer_change" type="submit" name="submit" class="btn btn-primary btn-lg btn-block" style="width:150px">изменить</button>
                </td></tr>
        </table>

        <h2>Баннер</h2>

        <form enctype="multipart/form-data" action="/admin/offer_edit_banner/<?=$Offer->id?>" method="POST">
            <img src="/img/offer/<?=$Offer->img?>">
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile" name="userfile">
                <p class="help-block">Загрузите новый файл</p>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!--
        <form enctype="multipart/form-data" action="/admin/offer_edit_banner/<?=$Offer->id?>" method="POST">
            Send this file: <input name="userfile" type="file" />
            <input type="submit" value="Send File" class="btn btn-primary btn-lg" />
        </form>
        -->
    </div>
</div>
<div class="pad-50"></div>