<div>
    <div class="reg_form_title">
        <h1>Профайл</h1>
        <div class="pad-30"><a href="/back/profile_edit/">[изменить]</a></div>
        <table class="table">
            <tr><td colspan="2"><strong><?=$P_data->name_2?> <?=$P_data->name_1?> <?=$P_data->name_3?></strong></td></tr>
            <tr><td>Регион</td><td>Барнаул</td></tr>
            <tr><td>Адрес</td><td><?=$Address->region?>, <?=$Address->city?>, <?=$Address->street?> <?=$Address->building?>-<?=$Address->apartment?></td></tr>
            <tr><td>Телефон</td><td><?=$P_data->phone?></td></tr>
            <tr><td>Почта</td><td><?=$P_data->email?></td></tr>
            <tr><td>Паспорт</td><td><?=$Passport_data->serial?> <?=$Passport_data->number?></td></tr>
            <tr><td>Работа</td><td><?=$Job->company_name?>, <?=$Job->city?> <?=$Job->street?>, <?=$Job->building?></td></tr>
        </table>

    </div>

</div>

<div class="pad-50"></div>
