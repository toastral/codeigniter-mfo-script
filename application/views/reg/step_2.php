<script>
    jQuery(function($){
        $('#step_2').on('click', function(){
            step_2();
            return false;
        });
    });

    function step_2(){
        $.ajax({
            method: "POST",
            url: "/reg/ajax_step_2/",
            data: {
                serial: $('input[name="serial"]').val(),
                number: $('input[name="number"]').val(),
                date: $('input[name="date"]').val(),
                code: $('input[name="code"]').val(),
                marital_status: $('select[name="marital_status"]').val(),
                organ: $('input[name="organ"]').val(),
            },
        }).done(function( json_data ) {
            var obj_data = jQuery.parseJSON( json_data );
            //console.log(obj_data);
            if(obj_data.is_error){
                alert(obj_data.msg);
            }else{
                window.location.href = "/reg/step_3/";
            }
        });
    }
</script>

<div class="reg_form_title">
    <h1>Заявка на микрозайм - 2 шаг: Паспортные данные</h1>
    <h3>Заполните свои паспортные данные</h3>
</div>

<form>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputSerial">Серия паспорта</label>
                <input type="number" class="form-control" id="inputSerial" placeholder="0000" name="serial" maxlength="4">
            </div>

            <div class="form-group">
                <label for="inputNumber">Номер паспорта</label>
                <input type="number" class="form-control" id="inputNumber" placeholder="000000" name="number" maxlength="6">
            </div>

            <div class="form-group">
                <label for="inputDate">Дата выдачи</label>
                <input type="date" class="form-control" id="inputDate" name="date">
            </div>


        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputCode">Код подразделения</label>
                <input type="text" class="form-control" id="inputCode" placeholder="000-000" name="code">
            </div>

            <div class="form-group">
                <label for="inputMaritalStatus">Семейное положение</label>
                <select class="form-control" id="inputMaritalStatus" name="marital_status">
                    <option value="not_married"> не в браке </option>
                    <option value="married"> в браке </option>
                </select>
            </div>

            <div class="form-group">
                <label for="inputOrgan">Организация выдавшая паспорт</label>
                <input type="text" class="form-control" id="inputOrgan" placeholder="организация" name="organ">
            </div>

            <div class="form-button">
                <button type="button" class="btn btn-primary btn-lg btn-block" id="step_2">Продолжить ></button>
            </div>
        </div>
    </div>
</form>

<div class="pad-50"></div>