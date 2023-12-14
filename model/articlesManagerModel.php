<?php

Class ArticlesManager {
    private $db;

    public function __construct(BDDConnection $db)
    {
        $this->db = $db;
    }

    public function getAllArticles()
    {
        $connection = $this->db->getConnection();

        $stmt = $connection->query("SELECT * FROM articles");

        $articles = [];
        while ($row = $stmt->fetch_assoc()) {
            $articles[] = new Article($row['id'], $row['name'], $row['context'], $row['content']);
        }

        return $articles;
    }

    public function getArticleById($id){
        $connection = $this->db->getConnection();

        $stmt = $connection->prepare("SELECT id, name, context, content FROM articles WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($id, $name, $context, $content);
        $stmt->fetch();
        $stmt->close();

        if ($id !== null) {
            return new Article($id, $name, $context, $content);
        }

        return null;
    }

    public function getAuthorOfArticle($id){
        $connection = $this->db->getConnection();

        $stmt = $connection->prepare("SELECT idUser FROM articles WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($name);
        $stmt->fetch();
        $stmt->close();

        if ($id !== null) {
            return $name;
        }

        return null;
    }

    public function deleteThisPost($id){
        $connection = $this->db->getConnection();

        $stmt = $connection->prepare("DELETE FROM articles WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function modifyPostByID($content,$id){
        $connection = $this->db->getConnection();

        $stmt = $connection->prepare("UPDATE articles SET content = ? WHERE id = ?");
        $stmt->bind_param("si", $content,$id);
        $stmt->execute();
        $stmt->close();
    }

    public function addNewArticle($name,$context,$content){
        $connection = $this->db->getConnection();

        // $name = strip_tags($name);
        // $context = strip_tags($context);
        // $content = strip_tags($content);

        $idUser = $_SESSION['id'];
        
        $stmt = $connection->prepare("INSERT INTO articles (idUser, name, context, content) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $idUser,$name,$context,$content);
        $stmt->execute();
        $stmt->close();
    }
}

?>