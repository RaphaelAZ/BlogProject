<?php

Class CommentsManager {
    private $db;

    public function __construct(BDDConnection $db)
    {
        $this->db = $db;
    }

    public function getCommentsOfArticle($idArticle){
        $connection = $this->db->getConnection();

        $stmt = $connection->query("SELECT * FROM comments WHERE idArticle=".$idArticle);

        $comments = [];

        while ($row = $stmt->fetch_assoc()) {
            $comments[] = new Comment($row['id'], $row['idArticle'], $row['idUser'], $row['postDate'], $row['message']);
        }

        return $comments;
    }

    public function getUserOfThisComment($id){
        $connection = $this->db->getConnection();

        $stmt = $connection->prepare("SELECT name FROM comments,users WHERE comments.idArticle = ? AND comments.idUser = users.id");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($name);
        $stmt->fetch();
        $stmt->close();

        return $name;
    }

    public function deleteACommentById($id){
        if(isset($_SESSION['admin'])&&$_SESSION['admin']==true){
            $connection = $this->db->getConnection();

            $stmt = $connection->prepare("DELETE FROM comments WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }
    }

    public function insertNewComment($newComment){
        $connection = $this->db->getConnection();
        $idArticle = $newComment->getCommentArticle();
        $idUser = $newComment->getCommentUser();
        $postDate = $newComment->getPostDate();
        $message = $newComment->getmessage();



        $stmt = $connection->prepare("INSERT INTO comments (idArticle, idUser, postDate, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $idArticle,$idUser,$postDate,$message);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteAllCommentsByID($id){
        $connection = $this->db->getConnection();

        $stmt = $connection->prepare("DELETE FROM comments WHERE idArticle = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

?>