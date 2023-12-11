<?php
Class Comment {
    private $id;
    private $idArticle;
    private $idUser;
    private $postDate;
    private $message;


    public function __construct($id,$idArticle,$idUser,$postDate,$message)
    {
        $this->id = $id;
        $this->idArticle = $idArticle;
        $this->idUser = $idUser;
        $this->postDate = $postDate;
        $this->message = $message;
    }

    public function getCommentId(){
        return $this->id;
    }

    public function getCommentArticle(){
        return $this->idArticle;
    }

    public function getCommentUser(){
        return $this->idUser;
    }

    public function getPostDate(){
        return $this->postDate;
    }

    public function getmessage(){
        return $this->message;
    }
} 

?>