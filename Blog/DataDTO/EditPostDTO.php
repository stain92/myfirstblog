<?php


namespace DataDTO;


class EditPostDTO extends PostDTO
{
    private $categories;

    /**
     * @return \DataDTO\CategoryDTO[]|\Generator
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param mixed $categories
     */
    public function setCategories($categories): void
    {
        $this->categories = $categories;
    }


}