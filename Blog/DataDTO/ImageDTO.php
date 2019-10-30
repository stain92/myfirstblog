<?php


namespace DataDTO;


class ImageDTO
{
    /**
     * @var int
     */
    private $image_id;
    /**
     * @var int
     */
    private $post_id;
    /**
     * @var string
     */
    private $image_name;

    /**
     * @return int
     */
    public function getImageId(): int
    {
        return $this->image_id;
    }

    /**
     * @param int $image_id
     */
    public function setImageId(int $image_id): void
    {
        $this->image_id = $image_id;
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->post_id;
    }

    /**
     * @param int $post_id
     */
    public function setPostId(int $post_id): void
    {
        $this->post_id = $post_id;
    }

    /**
     * @return string
     */
    public function getImageName(): string
    {
        return $this->image_name;
    }

    /**
     * @param string $image_name
     */
    public function setImageName(string $image_name): void
    {
        $this->image_name = $image_name;
    }


}