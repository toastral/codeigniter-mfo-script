<div>
    <div class="reg_form_title">
        <h1>Пользователь id: <?=$User->id?></h1>

        <table class="table">
            <tr><td width="50%">id</td><td><?=$User->id?></td></tr>
            <tr><td>status</td><td><?=$User->status?></td></tr>
            <tr><td>pay_status</td><td><?=$User->pay_status?></td></tr>
        </table>

        <h3>Личные данные</h3>
        <table class="table">
            <tr><td width="50%">name_1</td><td><?=$Personal_data->name_1?></td></tr>
            <tr><td>name_2</td><td><?=$Personal_data->name_2?></td></tr>
            <tr><td>name_3</td><td><?=$Personal_data->name_3?></td></tr>
            <tr><td>sex</td><td><?=$Personal_data->sex?></td></tr>
            <tr><td>birth day</td><td><?=$Personal_data->b_day?>.<?=$Personal_data->b_month?>.<?=$Personal_data->b_year?></td></tr>
            <tr><td>email</td><td><?=$Personal_data->email?></td></tr>
            <tr><td>phone</td><td><?=$Personal_data->phone?></td></tr>
        </table>

        <h3>Паспортные данные</h3>
        <table class="table">
            <tr><td width="50%">serial</td><td><?=$Passport_data->serial?></td></tr>
            <tr><td>number</td><td><?=$Passport_data->number?></td></tr>
            <tr><td>code</td><td><?=$Passport_data->code?></td></tr>
            <tr><td>organ</td><td><?=$Passport_data->organ?></td></tr>
            <tr><td>data</td><td><?=$Passport_data->day?>.<?=$Passport_data->month?>.<?=$Passport_data->year?></td></tr>
            <tr><td>marital_status</td><td><?=$Passport_data->marital_status?></td></tr>
        </table>

        <h3>Адрес</h3>
        <table class="table">
            <tr><td width="50%">get_region</td><td><?=$Address->get_region?></td></tr>
            <tr><td>get_city</td><td><?=$Address->get_city?></td></tr>
            <tr><td>region</td><td><?=$Address->region?></td></tr>
            <tr><td>city</td><td><?=$Address->city?></td></tr>
            <tr><td>street</td><td><?=$Address->street?></td></tr>
            <tr><td>building</td><td><?=$Address->building?></td></tr>
            <tr><td>apartment</td><td><?=$Address->apartment?></td></tr>
        </table>

        <h3>Работа</h3>
        <table class="table">
            <tr><td width="50%">company_name</td><td><?=$Job->company_name?></td></tr>
            <tr><td>city</td><td><?=$Job->city?></td></tr>
            <tr><td>street</td><td><?=$Job->street?></td></tr>
            <tr><td>building</td><td><?=$Job->building?></td></tr>
            <tr><td>phone</td><td><?=$Job->phone?></td></tr>
            <tr><td>prof_status</td><td><?=$Job->prof_status?></td></tr>
            <tr><td>month_amount</td><td><?=$Job->month_amount?></td></tr>
        </table>

        <h3>Доп.информация</h3>
        <table class="table">
            <tr><td width="50%">add_document</td><td><?=$Addition_data->add_document?></td></tr>
            <tr><td>document_number</td><td><?=$Addition_data->document_number?></td></tr>
            <tr><td>is_have_car</td><td><?=$Addition_data->is_have_car?></td></tr>
            <tr><td>credit_amount</td><td><?=$Addition_data->credit_amount?></td></tr>
            <tr><td>credit_period</td><td><?=$Addition_data->credit_period?></td></tr>
        </table>

    </div>
</div>

<div class="pad-50"></div>