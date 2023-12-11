<?php

Class UserConnection {
    private $id;
    private $name = "";
    private $email = "";
    private $password = "";
    private $isAdmin = true;

    public function __construct($id,$name,$email,$password,$isAdmin) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
    }

    public function getID() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

    public function isAdmin() {
        return $this->isAdmin;
    }
}

?>