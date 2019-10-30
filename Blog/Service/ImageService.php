<?php


namespace Service;


use Repository\ImageRepository;

class ImageService
{
    /**
     * @var ImageRepository
     */
    private $image_repository;

    /**
     * ImageService constructor.
     * @param ImageRepository $image_repository
     */
    public function __construct(ImageRepository $image_repository)
    {
        $this->image_repository = $image_repository;
    }

    public function addImages(string $images){
         return $this->image_repository->addImages($images);
    }

    public function getImagesByPostID(int $post_id){
        return $this->image_repository->getImagesByPostID($post_id);
    }
}