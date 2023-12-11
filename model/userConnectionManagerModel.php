<?php

Class UserConnectionManager {
    private $db;

    public function __construct(BDDConnection $db)
    {
        $this->db = $db;
    }

    public function verifyUser($name,$password) {
        if($password){
            $password = hash('sha256', $password);
            $connection = $this->db->getConnection();

            $stmt = $connection->prepare("SELECT * FROM users WHERE password= ?");
            $stmt->bind_param("i", $password);
            $stmt->execute();
            $stmt->bind_result($id,$name,$email,$password,$isAdmin);
            $stmt->fetch();
            $stmt->close();

            $userConnected = new UserConnection($id,$name,$email,$password,$isAdmin);

            if($userConnected->getName()){
                return $userConnected;
            }

            return null;
            }
    }
}

?>