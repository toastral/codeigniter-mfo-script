<script>
    jQuery(function($){
        $('#step_3').on('click', function(){
            step_3();
            return false;
        });
    });

    function step_3(){
        $.ajax({
            method: "POST",
            url: "/reg/ajax_step_3/",
            data: {
                get_region: $('input[name="get_region"]').val(),
                get_city: $('input[name="get_city"]').val(),
                region: $('input[name="region"]').val(),
                city: $('input[name="city"]').val(),
                street: $('input[name="street"]').val(),
                building: $('input[name="building"]').val(),
                apartment: $('input[name="apartment"]').val(),
            },
        }).done(function( json_data ) {
            var obj_data = jQuery.parseJSON( json_data );
            //console.log(obj_data);
            if(obj_data.is_error){
                alert(obj_data.msg);
            }else{
                window.location.href = "/reg/step_4/";
            }
        });
    }
</script>
<div class="reg_form_title">
    <h1>Заявка на микрозайм - 3 шаг: Адрес</h1>
    <h3>Укажите где Вы желаете получить деньги</h3>
</div>

<form>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputGetReg">Регион</label>
                <input type="text" class="form-control" id="inputGetReg" placeholder="регион" name="get_region">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputGetCity">Город</label>
                <input type="text" class="form-control" id="inputGetCity" placeholder="город" name="get_city">
            </div>
        </div>
    </div>

    <div class="reg_form_title">
        <h3>Укажите адрес Вашей регистрации</h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputReg">Регион</label>
                <input type="text" class="form-control" id="inputReg" placeholder="регион" name="region">
            </div>
            <div class="form-group">
                <label for="inputCity">Город</label>
                <input type="text" class="form-control" id="inputCity" placeholder="город" name="city">
            </div>
            <div class="form-group">
                <label for="inputStr">Улица</label>
                <input type="text" class="form-control" id="inputStr" placeholder="улица" name="street">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputBuild">Дом</label>
                <input type="text" class="form-control" id="inputBuild" placeholder="дом" name="building">
            </div>
            <div class="form-group">
                <label for="inputAp">Квартира</label>
                <input type="text" class="form-control" id="inputAp" placeholder="квартира" name="apartment">
            </div>
            <div class="form-button">
                <button type="button" class="btn btn-primary btn-lg btn-block" id="step_3">Продолжить ></button>
            </div>
        </div>
    </div>
</form>

<div class="pad-50"></div>