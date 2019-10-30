<?php


namespace Service;


use DataDTO\CategoryDTO;
use Repository\CategoryRepository;

class CategoryService
{
    /**
     * @var CategoryRepository
     */
    private $category_repository;

    /**
     * CategoryService constructor.
     * @param CategoryRepository $category_repository
     */
    public function __construct(CategoryRepository $category_repository)
    {
        $this->category_repository = $category_repository;
    }

    public function insertCategory(CategoryDTO $cat){
        $this->category_repository->insertCategory($cat);
    }

    public function getAllCategories(){
        return $this->category_repository->getAllCategories();
    }

}