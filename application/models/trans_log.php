<?php
class Trans_log{
    public $id;
    public $tstamp;
    public $user_id;
    public $body;
    public $type;
    public $attribute;

    function setAttrFromRow($row){
        $this->id   = @$row['id'];
        $this->tstamp = @$row['tstamp'];
        $this->user_id= @$row['user_id'];
        $this->body = @$row['body'];
        $this->type = @$row['type'];
        $this->attribute = @$row['attribute'];
    }
}
?>
