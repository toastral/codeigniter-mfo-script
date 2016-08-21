<?php
if($User->is_ajax_offer_list ){
    ?>
    <script>
        function explode(){
            $("#loader").hide();
            $("#offers").show();
        }
        setTimeout(explode, 4000);
    </script>

    <div class="bg-info lead" style="padding:10px" id="loader">
        <div style="width:200px; margin:0 auto;">Выполняется поиск</div>
        <div style="width:70px; margin:0 auto;"><img src="/img/loader.gif"></div>
    </div>
    <?php
}else{
    ?>
    <script>
        jQuery(function($){
            $("#offers").show();
        });
    </script>
    <?php
}
?>
<div id="offers" style="display:none;">
<table class="table">
    <?php foreach($a_offer as $Offer):?>
    <tr>
        <td><h3><?=$Offer->title?></h3></td>
        <td><a href="<?=$Offer->link?>"><img src="/img/offer/<?=$Offer->img?>"></a></td>
    </tr>
    <?php endforeach;?>
</table>
</div>
