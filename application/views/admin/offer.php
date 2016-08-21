<script>
    function del(id){
        if(!confirm("Удалить запись?")) {
            return false;
        }

        $.ajax({
            method: "POST",
            url: "/admin_ajax/del_offer",
            data: {
                id: id,
            },
        }).done(function( json_data ) {
            var obj_data = jQuery.parseJSON( json_data );
            //console.log(obj_data);
            if(obj_data.is_error){
                alert(obj_data.msg);
            }else{
                $('.row-'+id).fadeOut();
            }
        });
    }
</script>

<div>
    <div class="reg_form_title">
        <h1>Кредитные предложения</h1>

        <form action="/admin/offer_add" method="GET">
            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" style="width:150px">добавить</button>
        </form>
<br>
        <table class="table">
            <tr><th>id</th><th>title</th><th>link</th><th>img</th><th>is_active</th><th>type</th><th>sort</th><th>edit</th><th>del</th></tr>
            <?php foreach($a_list as $Offer):?>
                <?php echo "<tr class='row-".$Offer->id."'><td>$Offer->id</td><td>$Offer->title</td><td>$Offer->link</td><td>$Offer->img</td><td>$Offer->is_active</td><td>$Offer->type</td><td>$Offer->sort</td><td>[<a href='/admin/offer_edit/$Offer->id'>edit</a>]</td><td><a href=\"javascript:del('".$Offer->id."')\">[x]</a></td></tr>"; ?>
            <?php endforeach?>
        </table>

        <?php echo $pagination->create_links(); ?>
    </div>
</div>

<div class="pad-50"></div>