<?php

Class Articles {
    private array $articles;

    public function __construct(array $articles)
    {
        $this->articles = $articles;
    }

    public function getArticles()
    {
        return $this->articles;
    }

    public function setArticles($articles)
    {
        $this->articles = $articles;
    }


}

?>