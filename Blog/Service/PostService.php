<?php


namespace Service;


use DataDTO\PostDTO;
use Repository\PostRepository;

class PostService
{
    /**
     * @var PostRepository
     */
    private $post_repository;

    /**
     * PostService constructor.
     * @param PostRepository $post_repository
     */
    public function __construct(PostRepository $post_repository)
    {
        $this->post_repository = $post_repository;
    }

    public function createPost(PostDTO $post){
        return $this->post_repository->createPost($post);
    }

    public function getAllPosts(){
        return $this->post_repository->getAllPosts();
    }

    public function getOnePostById(int $post_id){
        return $this->post_repository->getOnePostById($post_id);
    }

    public function updatePost(PostDTO $post, int $post_id){
        $this->post_repository->updatePost($post,$post_id);
    }
    public function deletePost(int $post_id){
        $this->post_repository->deletePost($post_id);
    }
    public function getAllPostsplusImages(){
        return $this->post_repository->getAllPostsplusImages();
    }
}