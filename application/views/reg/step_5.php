<script>
    jQuery(function($){
        $('#step_5').on('click', function(){
            step_5();
            return false;
        });
    });

    function step_5(){
        $.ajax({
            method: "POST",
            url: "/reg/ajax_step_5/",
            data: {
                add_document: $('select[name="add_document"]').val(),
                document_number: $('input[name="document_number"]').val(),
                is_have_car: $('select[name="is_have_car"]').val(),
                credit_amount: $('input[name="credit_amount"]').val(),
                credit_period: $('input[name="credit_period"]').val(),
            },
        }).done(function( json_data ) {
            var obj_data = jQuery.parseJSON( json_data );
            //console.log(obj_data);
            if(obj_data.is_error){
                alert(obj_data.msg);
            }else{
                window.location.href = "/reg/step_6/";
            }
        });
    }
</script>
<div class="reg_form_title">
    <h1>Заявка на микрозайм - 5 шаг: Доп. данные</h1>
    <h3>Заполните дополнительные данные</h3>
</div>

<form>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputMaritalStatus">Дополнительный документ</label>
                <select class="form-control" id="inputMaritalStatus" name="add_document">
                    <option value="car">Водительское удостоверение</option>
                    <option value="foreign">Заграничный  паспорт</option>
                    <option value="war">Военный билет</option>
                    <option value="snils">СНИЛС</option>
                    <option value="inn">ИНН</option>
                </select>
            </div>

            <div class="form-group">
                <label for="input2">Номер дополнительного документа</label>
                <input type="text" class="form-control" id="input2" placeholder="номер" name="document_number">
            </div>

            <div class="form-group">
                <label for="inputMaritalStatus">Наличие автомобиля</label>
                <select class="form-control" id="inputMaritalStatus" name="is_have_car">
                    <option value="0">Нет автомобиля</option>
                    <option value="1">Есть автомобиль</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="input4">Сумма займа</label>
                <input type="number" class="form-control" id="input4" placeholder="30000" name="credit_amount">
            </div>

            <div class="form-group">
                <label for="input4">Срок займа</label>
                <input type="number" class="form-control" id="input4" placeholder="20" name="credit_period">
            </div>

            <div class="form-button">
                <button type="button" class="btn btn-primary btn-lg btn-block" id="step_5">Продолжить ></button>
            </div>
        </div>
    </div>
</form>

<div class="pad-50"></div>