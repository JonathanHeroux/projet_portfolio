<?php

require_once 'Manager.php';

class CommentManager extends Manager
{
    public function getCommentsByArticleId(int $articleId): array
    {
        $bdd = $this->connection();
        $request = $bdd->prepare(
            'SELECT * FROM comments WHERE article_id = ? ORDER BY created_at DESC'
        );
        $request->execute([$articleId]);

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createComment(int $articleId, string $authorName, string $content): void
    {
        $bdd = $this->connection();
        $request = $bdd->prepare(
            'INSERT INTO comments (article_id, author_name, content) VALUES (?, ?, ?)'
        );
        $request->execute([$articleId, $authorName, $content]);
    }

    public function getCommentById($id){
    $bdd = $this->connection();
    $req = $bdd->prepare('SELECT * FROM comments WHERE id=?');
    $req->execute([$id]);
    return $req->fetch();
    }

    public function updateComment($id, $content){
        $bdd = $this->connection();
        $req = $bdd->prepare('UPDATE comments SET content=? WHERE id=?');
        $req->execute([$content, $id]);
    }

    public function deleteComment($id){
        $bdd = $this->connection();
        $req = $bdd->prepare('DELETE FROM comments WHERE id=?');
        $req->execute([$id]);
    }

}
