<?php


namespace DataDTO;


class ImageEditPostDTO extends EditPostDTO
{
    private $images;

    /**
     * @return \DataDTO\ImageDTO[]|\Generator
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param mixed $images
     */
    public function setImages($images): void
    {
        $this->images = $images;
    }


}