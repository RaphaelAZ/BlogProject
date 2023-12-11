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
}

?>