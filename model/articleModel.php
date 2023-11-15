<?php

Class Article {
    private string $name="";
    private string $context="";
    private string $content="";

    public function __construct(string $name, string $context, string $content)
    {
        $this->name = $name;
        $this->context = $context;
        $this->content = $content;
    }

    public function getName(){
        return $this->name;
    }

    public function getContext(){
        return $this->context;
    }

    public function getContent(){
        return $this->content;
    }

    public function setName($name){
        if($name==""){
            trigger_error(
                'Le nom est incorrect',
                E_USER_ERROR
            );
        } else {
            $this->name = $name;
        }
    }

    public function setContext($context){
        if($context==""){
            trigger_error(
                'Le contexte est incorrect',
                E_USER_ERROR
            );
        } else {
            $this->context = $context;
        }
    }

    public function setContent($content){
        if($content==""){
            trigger_error(
                'Le contenu est incorrect',
                E_USER_ERROR
            );
        } else {
            $this->content = $content;
        }
    }
} 

?>