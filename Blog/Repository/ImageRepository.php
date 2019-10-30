<?php


namespace Repository;


use Database\PDODatabase;
use DataDTO\ImageDTO;

class ImageRepository
{
    /**
     * @var PDODatabase
     */
    private $db;

    /**
     * ImageRepository constructor.
     * @param PDODatabase $db
     */
    public function __construct(PDODatabase $db)
    {
        $this->db = $db;
    }

    public function addImages(string $images){
        return $stm=$this->db->query('INSERT INTO images (image_name,post_id) VALUES '.$images)
            ->execute();
    }

    public function getImagesByPostID(int $post_id)
    {
        return $stm=$this->db->query('SELECT image_name FROM images WHERE post_id=:post_id')
            ->execute(['post_id'=>$post_id])->fetch(ImageDTO::class);
    }
}