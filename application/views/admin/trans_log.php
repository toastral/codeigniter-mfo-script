<div>
    <div class="reg_form_title">
        <h1>Лог</h1>

        <table class="table">
            <tr><th>id</th><th>stamp</th><th>user_id</th><th>body</th><th>type</th><th>attribute</th></tr>
            <?php foreach($a_list as $Trans_log):?>
                <?php echo "<tr><td>$Trans_log->id</td><td>".date("Y-m-d H:i:s", $Trans_log->tstamp)."</td><td>$Trans_log->user_id</td><td><PRE>$Trans_log->body</PRE></td><td>$Trans_log->type</td><td>$Trans_log->attribute</td></tr>"; ?>
            <?php endforeach?>
        </table>

        <?php echo $pagination->create_links(); ?>
    </div>
</div>


<div class="pad-50"></div>
