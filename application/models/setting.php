<?php
class Setting{
    public $id;
    public $name;
    public $value;
    public $type;
    public $description;
    public $sort;
    public $group;

    function setAttrFromRow($row){
        $this->id   = @$row['id'];
        $this->name = @$row['name'];
        $this->value= @$row['value'];
        $this->type = @$row['type'];
        $this->description = @$row['description'];
        $this->sort = @$row['sort'];
        $this->group = @$row['group'];
    }
}
?>