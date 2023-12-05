<?php 

Class User {
    private string $name = "";
    private string $mail = "";
    private bool $isAdmin = false;

    public function __construct(string $name, string $mail, bool $isAdmin)
    {
        $this->name = $name;
        $this->mail = $mail;
        $this->isAdmin = $isAdmin;
    }

    public function userIsAdmin(){
        if($this->isAdmin){
            return true;
        }
        return false;
    }

    public function getUser(){
        return $this->name;
    }

    public function getMail(){
        return $this->mail;
    }


}

?>