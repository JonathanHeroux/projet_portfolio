<?php

require_once 'Manager.php';

class ArticleManager extends Manager{

    public function getAllArticles(){
        $bdd = $this->connection();

        $request = $bdd->query('SELECT * FROM articles ORDER BY created_at DESC');
        $articles = [];

        while($article = $request->fetch()){
            $articles[]=$article;
        }
        return $articles;
    }

    public function createArticle($title, $teaser, $article_image){
        $bdd = $this->connection();
        $request = $bdd->prepare('INSERT INTO articles(title,teaser,article_image) VALUES (?,?,?)');
        $request->execute([$title,$teaser,$article_image]);
    }

    public function deleteArticle($id){
        $bdd = $this->connection();
        $request = $bdd->prepare('DELETE FROM articles WHERE id=?');
        $request->execute([$id]);
    }

    public function getArticleById($id){
        $bdd = $this->connection();
        $request = $bdd->prepare('SELECT * FROM articles WHERE id=?');
        $request->execute([$id]);

        $article = $request->fetch();
        if(!$article){
            return null;
        }
        return $article;
    }

    public function updateArticle($id,$title,$teaser,$article_image){
        $bdd = $this->connection();
        $request = $bdd->prepare('UPDATE articles SET title=?, teaser=?, article_image=? WHERE id=?');
        $request->execute([$title,$teaser,$article_image,$id]);
    }
}