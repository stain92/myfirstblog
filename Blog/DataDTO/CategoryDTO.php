<?php


namespace DataDTO;


class CategoryDTO
{
    private const CATEGORY_NAME_MIN_LENGTH=4;
    private const CATEGORY_NAME_MAX_LENGTH=255;
    /**
     * @var int
     */
    private $cat_id;
    /**
     * @var string
     */
    private $cat_name_en;

    /**
     * @var string
     */
    private $cat_name_bg;

    /**
     * @return int
     */
    public function getCatId(): int
    {
        return $this->cat_id;
    }

    /**
     * @param int $cat_id
     */
    public function setCatId(int $cat_id): void
    {
        $this->cat_id = $cat_id;
    }

    /**
     * @return string
     */
    public function getCatNameEn(): string
    {
        return $this->cat_name_en;
    }

    /**
     * @param string $cat_name_en
     * @throws \Exception
     */
    public function setCatNameEn(string $cat_name_en): void
    {
        DTOValidator::validate(self::CATEGORY_NAME_MIN_LENGTH,self::CATEGORY_NAME_MAX_LENGTH,$cat_name_en,
            'text','Category Name');
        $this->cat_name_en = $cat_name_en;
    }

    /**
     * @return string
     */
    public function getCatNameBg(): string
    {
        return $this->cat_name_bg;
    }

    /**
     * @param string $cat_name_bg
     * @throws \Exception
     */
    public function setCatNameBg(string $cat_name_bg): void
    {
        DTOValidator::validate(self::CATEGORY_NAME_MIN_LENGTH,self::CATEGORY_NAME_MAX_LENGTH,$cat_name_bg,
            'text','Category Name');
        $this->cat_name_bg = $cat_name_bg;
    }



}