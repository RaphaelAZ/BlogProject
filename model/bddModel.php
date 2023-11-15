<?php

class BDDConnection {
    public function execute($query){
        try {
            $connection = new PDO('mysql:host=localhost;dbname=blog_project','root','');
            $statement = $connection->query($query);
            return $statement;
        } catch (PDOException $e) {
            var_dump($e);
            trigger_error(
                $e,
                E_USER_ERROR
            );
            return false;
        }
    }
}

?>