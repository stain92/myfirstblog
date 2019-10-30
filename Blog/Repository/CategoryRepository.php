<?php


namespace Repository;


use Database\PDODatabase;
use DataDTO\CategoryDTO;

class CategoryRepository
{
    /**
     * @var PDODatabase
     */
    private $db;

    /**
     * CategoryRepository constructor.
     * @param PDODatabase $db
     */
    public function __construct(PDODatabase $db)
    {
        $this->db = $db;
    }

    public function getAllCategories(){
        return $stm=$this->db->query('SELECT cat_id,cat_name_en,cat_name_bg from category ORDER BY cat_id')
            ->execute()->fetch(CategoryDTO::class);
    }

    public function getCategoryById(int $cat_id){
        return $stm=$this->db->query('SELECT cat_name_en,cat_name_bg FROM category WHERE cat_id=:cat_id')
            ->execute(['cat_id'=>$cat_id])->getOne(CategoryDTO::class);
    }

    public function insertCategory(CategoryDTO $cat){
         $stm=$this->db->query('INSERT INTO category (cat_name_en,cat_name_bg) VALUES (:cat_name_en,:cat_name_bg)')
            ->execute(['cat_name_en'=>$cat->getCatNameEn(),
            'cat_name_bg'=>$cat->getCatNameBg()]);
    }
}