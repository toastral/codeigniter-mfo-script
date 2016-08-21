<div>
    <div class="reg_form_title">

        <script>
            jQuery(function($){
                $('#personal_edit').on('click', function(){
                    personal_edit();
                    return false;
                });
            });

            function personal_edit(){
                $.ajax({
                    method: "POST",
                    url: "/back_ajax/ajax_personal_data/",
                    data: {
                        name_1: $('input[name="name_1"]').val(),
                        name_2: $('input[name="name_2"]').val(),
                        name_3: $('input[name="name_3"]').val(),
                        sex: $('select[name="sex"]').val(),
                        b_day: $('input[name="b_day"]').val(),
                        b_month: $('input[name="b_month"]').val(),
                        b_year: $('input[name="b_year"]').val(),
                    },
                }).done(function( json_data ) {
                    var obj_data = jQuery.parseJSON( json_data );
                    //console.log(obj_data);
                    if(obj_data.is_error){
                        alert(obj_data.msg);
                    }else{
                       window.location.href = "/back/profile_edit";
                    }
                });
            }
        </script>

        <h3>Личные данные</h3>
        <table class="table">
            <tr><td width="50%">Имя</td><td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputName1" placeholder="имя" value="<?=$Personal_data->name_1?>" name="name_1">
                    </div>
                </td></tr>
            <tr><td>Фамилия</td><td>
                    <input type="text" class="form-control" id="inputName1" placeholder="имя" value="<?=$Personal_data->name_2?>" name="name_2">
                </td></tr>
            <tr><td>Отчество</td><td>
                    <input type="text" class="form-control" id="inputName1" placeholder="имя" value="<?=$Personal_data->name_3?>" name="name_3">
                </td></tr>
            <tr><td>Пол</td><td>
                    <div class="form-group">
                        <select class="form-control" id="inputSex" name="sex">
                            <option value="male" <?php if($Personal_data->sex == 'male') echo 'selected';?>> м </option>
                            <option value="female" <?php if($Personal_data->sex == 'female') echo 'selected';?>> ж </option>
                        </select>
                    </div>
                </td></tr>
            <tr><td>День рождения (день/месяц/год)</td><td>
                    <div class="form-group">
                        <input type="number" class="form-control" id="input11" placeholder="день" name="b_day" value="<?=$Personal_data->b_day?>" style="width:60px; float:left">
                        <input type="number" class="form-control" id="input12" placeholder="месяц" name="b_month" value="<?=$Personal_data->b_month?>" style="width:60px; float:left">
                        <input type="number" class="form-control" id="input13" placeholder="год" name="b_year" value="<?=$Personal_data->b_year?>" style="width:80px; float:left">
                    </div>
                </td></tr>
            <tr><td>email</td><td><?=$Personal_data->email?></td></tr>
            <tr><td>phone</td><td><?=$Personal_data->phone?></td></tr>
            <tr><td colspan="2">
                    <button id="personal_edit" type="button" class="btn btn-default" >изменить</button>
                </td></tr>
        </table>

        <script>
            jQuery(function($){
                $('#passport_edit').on('click', function(){
                    passport_edit();
                    return false;
                });
            });

            function passport_edit(){
                $.ajax({
                    method: "POST",
                    url: "/back_ajax/ajax_passport_data/",
                    data: {
                        serial: $('input[name="serial"]').val(),
                        number: $('input[name="number"]').val(),
                        day: $('input[name="day"]').val(),
                        month: $('input[name="month"]').val(),
                        year: $('input[name="year"]').val(),
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
                        window.location.href = "/back/profile_edit";
                    }
                });
            }
        </script>

        <h3>Паспортные данные</h3>
        <table class="table">
            <tr><td width="50%">serial</td><td>
                    <input type="number" class="form-control" id="inputSerial" placeholder="0000" name="serial" maxlength="4" value="<?=$Passport_data->serial?>">
                </td></tr>
            <tr><td>number</td><td>
                    <input type="number" class="form-control" id="inputNumber" placeholder="000000" name="number" maxlength="6" value="<?=$Passport_data->number?>">
                </td></tr>
            <tr><td>code</td><td>
                    <input type="text" class="form-control" id="inputCode" placeholder="000-000" name="code" value="<?=$Passport_data->code?>">
                </td></tr>
            <tr><td>organ</td><td>
                    <input type="text" class="form-control" id="inputOrgan" placeholder="организация" name="organ" value="<?=$Passport_data->organ?>">
                </td></tr>
            <tr><td>data
                    (день/месяц/год)
                </td><td>
                    <div class="form-group">
                        <input type="number" class="form-control" id="input22" placeholder="день" name="day" value="<?=$Passport_data->day?>" style="width:60px; float:left">
                        <input type="number" class="form-control" id="input23" placeholder="месяц" name="month" value="<?=$Passport_data->month?>" style="width:60px; float:left">
                        <input type="number" class="form-control" id="input24" placeholder="год" name="year" value="<?=$Passport_data->year?>" style="width:80px; float:left">
                    </div>
                </td></tr>
            <tr><td>marital_status</td><td>
                    <select class="form-control" id="inputMaritalStatus" name="marital_status">
                        <option value="not_married" <?php if($Passport_data->marital_status == 'not_married') echo 'selected'; ?>> не в браке </option>
                        <option value="married" <?php if($Passport_data->marital_status == 'married') echo 'selected'; ?>> в браке </option>
                    </select>
                </td></tr>
            <tr><td colspan="2">
                    <button id="passport_edit" type="button" class="btn btn-default" >изменить</button>
                </td></tr>
        </table>

        <script>
            jQuery(function($){
                $('#address_edit').on('click', function(){
                    address_edit();
                    return false;
                });
            });

            function address_edit(){
                $.ajax({
                    method: "POST",
                    url: "/back_ajax/ajax_address/",
                    data: {
                        get_region: $('input[name="a_get_region"]').val(),
                        get_city: $('input[name="a_get_city"]').val(),
                        region: $('input[name="a_region"]').val(),
                        city: $('input[name="a_city"]').val(),
                        street: $('input[name="a_street"]').val(),
                        building: $('input[name="a_building"]').val(),
                        apartment: $('input[name="a_apartment"]').val(),
                    },
                }).done(function( json_data ) {
                    var obj_data = jQuery.parseJSON( json_data );
                    //console.log(obj_data);
                    if(obj_data.is_error){
                        alert(obj_data.msg);
                    }else{
                        window.location.href = "/back/profile_edit";
                    }
                });
            }
        </script>

        <h3>Адрес</h3>
        <table class="table">
            <tr><td width="50%">get_region</td><td>
                    <input type="text" class="form-control" id="inputGetReg" placeholder="регион" name="a_get_region" value="<?=$Address->get_region?>">
                </td></tr>
            <tr><td>get_city</td><td>
                    <input type="text" class="form-control" id="inputGetCity" placeholder="город" name="a_get_city" value="<?=$Address->get_city?>">
                </td></tr>
            <tr><td>region</td><td>
                    <input type="text" class="form-control" id="inputReg" placeholder="регион" name="a_region" value="<?=$Address->region?>">
                </td></tr>
            <tr><td>city</td><td>
                    <input type="text" class="form-control" id="inputCity" placeholder="город" name="a_city" value="<?=$Address->city?>">
                </td></tr>
            <tr><td>street</td><td>
                    <input type="text" class="form-control" id="inputStr" placeholder="улица" name="a_street" value="<?=$Address->street?>">
                </td></tr>
            <tr><td>building</td><td>
                    <input type="text" class="form-control" id="inputBuild" placeholder="дом" name="a_building" value="<?=$Address->building?>">
                </td></tr>
            <tr><td>apartment</td><td>
                    <input type="text" class="form-control" id="inputAp" placeholder="квартира" name="a_apartment" value="<?=$Address->apartment?>">
                </td></tr>
            <tr><td colspan="2">
                    <button id="address_edit" type="button" class="btn btn-default" >изменить</button>
                </td></tr>
        </table>

        <script>
            jQuery(function($){
                $('#job_edit').on('click', function(){
                    job_edit();
                    return false;
                });
            });

            function job_edit(){
                $.ajax({
                    method: "POST",
                    url: "/back_ajax/ajax_job/",
                    data: {
                        company_name:   $('input[name="j_company_name"]').val(),
                        city:           $('input[name="j_city"]').val(),
                        street:         $('input[name="j_street"]').val(),
                        building:       $('input[name="j_building"]').val(),
                        phone:          $('input[name="j_phone"]').val(),
                        prof_status:    $('input[name="j_prof_status"]').val(),
                        month_amount:   $('input[name="j_month_amount"]').val(),
                    },
                }).done(function( json_data ) {
                    var obj_data = jQuery.parseJSON( json_data );
                    //console.log(obj_data);
                    if(obj_data.is_error){
                        alert(obj_data.msg);
                    }else{
                        window.location.href = "/back/profile_edit";
                    }
                });
            }
        </script>

        <h3>Работа</h3>
        <table class="table">
            <tr><td width="50%">company_name</td><td>
                    <input type="text" class="form-control" id="input1" placeholder="название компании" name="j_company_name" value="<?=$Job->company_name?>">
                </td></tr>
            <tr><td>city</td><td>
                    <input type="text" class="form-control" id="input2" placeholder="город" name="j_city" value="<?=$Job->city?>">
                </td></tr>
            <tr><td>street</td><td>
                    <input type="text" class="form-control" id="input3" placeholder="улица" name="j_street" value="<?=$Job->street?>">
                </td></tr>
            <tr><td>building</td><td>
                    <input type="text" class="form-control" id="input4" placeholder="дом" name="j_building" value="<?=$Job->building?>">
                </td></tr>
            <tr><td>phone</td><td>
                    <input type="text" class="form-control" id="input5" placeholder="телефон" name="j_phone" value="<?=$Job->phone?>">
                </td></tr>
            <tr><td>prof_status</td><td>
                    <input type="text" class="form-control" id="input6" placeholder="должность" name="j_prof_status" value="<?=$Job->prof_status?>">
                </td></tr>
            <tr><td>month_amount</td><td>
                    <input type="number" class="form-control" id="input7" placeholder="20000" name="j_month_amount" value="<?=$Job->month_amount?>">
                </td></tr>
            <tr><td colspan="2">
                    <button id="job_edit" type="button" class="btn btn-default" >изменить</button>
                </td></tr>
        </table>

        <script>
            jQuery(function($){
                $('#addition_data').on('click', function(){
                    addition_data();
                    return false;
                });
            });

            function addition_data(){
                $.ajax({
                    method: "POST",
                    url: "/back_ajax/ajax_addition_data/",
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
                        window.location.href = "/back/profile_edit";
                    }
                });
            }
        </script>

        <h3>Доп.информация</h3>
        <table class="table">
            <tr><td width="50%">add_document</td><td>
                    <select class="form-control" id="inputMaritalStatus" name="add_document">
                        <option value="car"     <?php if($Addition_data->add_document == 'car')     echo 'selected'; ?>>Водительское удостоверение</option>
                        <option value="foreign" <?php if($Addition_data->add_document == 'foreign') echo 'selected'; ?>>Заграничный  паспорт</option>
                        <option value="war"     <?php if($Addition_data->add_document == 'war')     echo 'selected'; ?>>Военный билет</option>
                        <option value="snils"   <?php if($Addition_data->add_document == 'snils')   echo 'selected'; ?>>СНИЛС</option>
                        <option value="inn"     <?php if($Addition_data->add_document == 'inn')     echo 'selected'; ?>>ИНН</option>
                    </select>
                </td></tr>

            <tr><td>document_number</td><td>
                    <input type="text" class="form-control" id="input2" placeholder="номер" name="document_number" value="<?=$Addition_data->document_number?>">
                </td></tr>
            <tr><td>is_have_car</td><td>
                    <select class="form-control" id="inputMaritalStatus" name="is_have_car">
                        <option value="0" <?php if($Addition_data->is_have_car == '0') echo 'selected'; ?>>Нет автомобиля</option>
                        <option value="1" <?php if($Addition_data->is_have_car == '1') echo 'selected'; ?>>Есть автомобиль</option>
                    </select>
                </td></tr>
            <tr><td>credit_amount</td><td>
                    <input type="number" class="form-control" id="input4" placeholder="30000" name="credit_amount" value="<?=$Addition_data->credit_amount?>">
                </td></tr>
            <tr><td>credit_period</td><td>
                    <input type="number" class="form-control" id="input4" placeholder="20" name="credit_period" value="<?=$Addition_data->credit_period?>">
                </td></tr>
            <tr><td colspan="2">
                    <button id="addition_data" type="button" class="btn btn-default" >изменить</button>
                </td></tr>
        </table>

    </div>
</div>

<div class="pad-50"></div>