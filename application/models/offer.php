<?php
class Offer{
    public $id;
    public $title;
    public $link;
    public $img;
    public $is_active;
    public $type;
    public $sort;

    function setAttrFromRow($row){
        $this->id 	= @$row['id'];
        $this->title= @$row['title'];
        $this->link = @$row['link'];
        $this->img 	= @$row['img'];
        $this->is_active = @$row['is_active'];
        $this->type = @$row['type'];
        $this->sort = @$row['sort'];
    }

    function setAttrFromPost($post){
        $this->id 	= @$post['id'];
        $this->title= @$post['title'];
        $this->link = @$post['link'];
        $this->img 	= @$post['img'];
        $this->is_active = @$post['is_active'];
        $this->type = @$post['type'];
        $this->sort = @$post['sort'];
    }
}

