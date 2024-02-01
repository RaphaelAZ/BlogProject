<?php

Class UserConnectionManager {
    private $db;

    public function __construct(BDDConnection $db)
    {
        $this->db = $db;
    }

    public function verifyUser($name, $password) {
    if ($name && $password) {
        $connection = $this->db->getConnection();

        // Vérification de l'utilisateur par le nom
        $stmt = $connection->prepare("SELECT id, name, email, password, admin FROM users WHERE name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->bind_result($id, $name, $email, $hashedPassword, $isAdmin);
        $stmt->fetch();
        $stmt->close();

        if ($id) {
            // Vérification du mot de passe
            $password = hash('sha256', $password);
            if ($password == $hashedPassword) {
                $userConnected = new UserConnection($id, $name, $email, $hashedPassword, $isAdmin);

                if ($userConnected->getName()) {
                    return $userConnected;
                }
            }
        } else {
            return null; // L'utilisateur n'existe pas
        }
    }

    return null; // Paramètres invalides
}
}

?>