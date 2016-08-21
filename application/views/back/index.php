<div>
    <div class="reg_form_title">
        <h1>Микрозаймы</h1>
    </div>
    <?php if(strlen($pay_result)>0){
            if($pay_result == 'success'){
                echo '<p class="bg-success lead" style="padding:10px">Оплата успешно произведена!</p>';
            }
            if($pay_result == 'fail'){
                echo '<p class="bg-danger lead" style="padding:10px">Во время операции оплаты возникла ошибка</p>';
            }
        } ?>
    <?php
    if($User->pay_status == 'no_pay'){
    ?>

        <script>
            function explode(){
                $("#loader").hide();
                $("#suggestion").show();
            }
            setTimeout(explode, 4000);
        </script>

        <div class="bg-info lead" style="padding:10px" id="loader">
            <div style="width:200px; margin:0 auto;">Выполняется поиск</div>
            <div style="width:70px; margin:0 auto;"><img src="/img/loader.gif"></div>
        </div>
        <div style="display:none; padding:10px" id="suggestion">
        <?php include_once($this->config->item('views_root').'/back/before_pay_suggestion.php');?>
    <?php
    }
    ?>
    <?php
    if( $User->pay_status == 'try_pay'){
        ?>
        <?php include_once($this->config->item('views_root').'/back/before_pay_suggestion.php');?>
        <p class="lead" style="padding:10px">Извините, во время оплаты что-то пошло не так. Вы можете воспользоваться предложениями наших партнёров</p>
        <?php include_once($this->config->item('views_root').'/back/offers.php');?>
        <?php
    }
    if( $User->pay_status == 'payed_full'){
    ?>
        <p class="lead" style="padding:10px"><?=$a_setting['offers_description']->value?></p>
        <?php include_once($this->config->item('views_root').'/back/offers.php');?>
    <?php
    }
    ?>

    <?php if($User->pay_status == 'payed_full')?>

    <??>
</div>
<div class="pad-50"></div>