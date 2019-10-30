<?php


namespace Repository;


use Database\PDODatabase;
use DataDTO\ImageEditPostDTO;
use DataDTO\PostDTO;

class PostRepository
{
    /**
     * @var PDODatabase
     */
    private $db;

    /**
     * PostRepository constructor.
     * @param PDODatabase $db
     */
    public function __construct(PDODatabase $db)
    {
        $this->db = $db;
    }

    public function createPost(PostDTO $post){
        $stm=$this->db->query('INSERT INTO post (cat_id, content_bg, content_en, title_bg, title_en, author) 
                                VALUES (:cat_id, :content_bg, :content_en, :title_bg, :title_en, :author)')
            ->execute([
                'cat_id'=>$post->getCatId(),
                'content_bg'=>$post->getContentBg(),
                'content_en'=>$post->getContentEn(),
                'title_bg'=>$post->getTitleBg(),
                'title_en'=>$post->getTitleEn(),
                'author'=>$post->getAuthor(),]);
        return $this->db->lastInsertId();
    }

    public function getOnePostById(int $post_id){
        return $stm=$this->db->query('SELECT post_id, cat_id, content_bg, content_en, title_bg, title_en, author, create_date FROM post
                                WHERE post_id=:post_id')
            ->execute(['post_id'=>$post_id])->getOne(PostDTO::class);
    }

    public function updatePost(PostDTO $post, int $post_id){
        $stm=$this->db->query('UPDATE post SET  cat_id=:cat_id,
                                                content_bg=:content_bg,
                                                content_en=:content_en,
                                                title_bg=:title_bg,
                                                title_en=:title_en,
                                                author=:author
                                                WHERE post_id=:post_id')
            ->execute([
                'cat_id'=>$post->getCatId(),
                'content_bg'=>$post->getContentBg(),
                'content_en'=>$post->getContentEn(),
                'title_bg'=>$post->getTitleBg(),
                'title_en'=>$post->getTitleEn(),
                'author'=>$post->getAuthor(),
                'post_id'=>$post_id]);
    }

    public function deletePost(int $post_id){
        $stm=$this->db->query('DELETE FROM post WHERE post_id=:post_id')
            ->execute(['post_id'=>$post_id]);
    }

    public function getAllPosts(){
        return $stm=$this->db->query('SELECT post_id, cat_id, content_bg, content_en, title_bg, title_en, author, create_date FROM post')
            ->execute()->fetch(PostDTO::class);
    }

    public function getAllPostsplusImages(){
        return $stm=$this->db->query('SELECT post_id,cat_id, content_bg, content_en, title_bg, title_en, author, create_date,image_name 
                                      FROM post
                                      INNER JOIN images USING (post_id)
                                      ORDER BY create_date')
            ->execute()->fetch(PostDTO::class);
    }
}