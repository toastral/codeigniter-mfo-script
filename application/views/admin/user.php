<div>
    <div class="reg_form_title">
        <h1>Пользователи</h1>

        <table class="table">
            <tr><th>id</th><th>name</th><th>created</th><th>pay_status</th><th>подробнее</th></tr>
            <?php foreach($a_list as $row):?>
                <?php echo "<tr><td>".$row['id']."</td><td>".$row['name_1']." ".$row['name_2']."</td><td>".date("Y-m-d",$row['created'])."</td><td>".$row['pay_status']."</td><td><a href='/admin/user_item/".$row['id']."'>подробнее</a></td></tr>"; ?>
            <?php endforeach?>
        </table>

        <?php echo $pagination->create_links(); ?>

    </div>
</div>

<div class="pad-50"></div>