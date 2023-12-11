<?php
Class Article {
    private $id = 0;
    private $name = "";
    private $context = "";
    private $content = "";

    public function __construct($id,$name,$context,$content)
    {
        $this->id = $id;
        $this->name = $name;
        $this->context = $context;
        $this->content = $content;
    }

    public function getArticleID(){
        return $this->id;
    }

    public function getArticleName(){
        return $this->name;
    }

    public function getArticleContext(){
        return $this->context;
    }

    public function getArticleContent(){
        return $this->content;
    }
} 

?>