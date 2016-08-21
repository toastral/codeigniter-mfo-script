<script>
    jQuery(function($){
        $('#step_4').on('click', function(){
            step_4();
            return false;
        });
    });

    function step_4(){
        $.ajax({
            method: "POST",
            url: "/reg/ajax_step_4/",
            data: {
                company_name:   $('input[name="company_name"]').val(),
                city:           $('input[name="city"]').val(),
                street:         $('input[name="street"]').val(),
                building:       $('input[name="building"]').val(),
                phone:          $('input[name="phone"]').val(),
                prof_status:    $('input[name="prof_status"]').val(),
                month_amount:   $('input[name="month_amount"]').val(),
            },
        }).done(function( json_data ) {
            var obj_data = jQuery.parseJSON( json_data );
            //console.log(obj_data);
            if(obj_data.is_error){
                alert(obj_data.msg);
            }else{
                window.location.href = "/reg/step_5/";
            }
        });
    }
</script>
<div class="reg_form_title">
    <h1>Заявка на микрозайм - 4 шаг: Работа</h1>
    <h3>Заполните данные о работе</h3>
</div>

<form>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="input1">Название компании</label>
                <input type="text" class="form-control" id="input1" placeholder="название компании" name="company_name">
            </div>
            <div class="form-group">
                <label for="input2">Город</label>
                <input type="text" class="form-control" id="input2" placeholder="город" name="city">
            </div>
            <div class="form-group">
                <label for="input3">Улица</label>
                <input type="text" class="form-control" id="input3" placeholder="улица" name="street">
            </div>
            <div class="form-group">
                <label for="input4">Дом</label>
                <input type="text" class="form-control" id="input4" placeholder="дом" name="building">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="input5">Телефон</label>
                <input type="text" class="form-control" id="input5" placeholder="телефон" name="phone">
            </div>
            <div class="form-group">
                <label for="input6">Должность</label>
                <input type="text" class="form-control" id="input6" placeholder="должность" name="prof_status">
            </div>
            <div class="form-group">
                <label for="input7">Месячный заработок</label>
                <input type="number" class="form-control" id="input7" placeholder="20000" name="month_amount">
            </div>
            <div class="form-button">
                <button type="button" class="btn btn-primary btn-lg btn-block" id="step_4">Продолжить ></button>
            </div>
        </div>
    </div>
</form>

<div class="pad-50"></div>