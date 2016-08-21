<div>
    <div class="reg_form_title">
        <h1>Настройки</h1>

        <table class="table">
            <tr><th>id</th><th>name</th><th>value</th><th>type</th><th>sort</th><th>group</th><th>description</th><th>edit</th></tr>
            <?php foreach($a_list as $Setting):?>
                <?php echo "<tr><td>$Setting->id</td><td>$Setting->name</td><td>$Setting->value</td><td>$Setting->type</td><td>$Setting->sort</td><td>$Setting->group</td><td>$Setting->description</td><td>[<a href='/admin/setting_edit/$Setting->id'>edit</a>]</td></tr>"; ?>
            <?php endforeach?>
        </table>
    </div>
</div>

<div class="pad-50"></div>