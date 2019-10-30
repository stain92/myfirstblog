<?php


namespace DataDTO;


class PostDTO
{
    /**
     * @var int
     */
    private $post_id;
    /**
     * @var int
     */
    private $cat_id;
    /**
     * @var string
     */
    private $content_bg;
    /**
     * @var string
     */
    private $content_en;
    /**
     * @var string
     */
    private $title_bg;
    /**
     * @var string
     */
    private $title_en;
    /**
     * @var string
     */
    private $author;
    /**
     * @var string
     */
    private $create_date;

    /**
     * @return int
     */

    /**
     * @var string
     */
    private $image_name;

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
    public function getContentBg(): string
    {
        return $this->content_bg;
    }

    /**
     * @param string $content_bg
     */
    public function setContentBg(string $content_bg): void
    {
        $this->content_bg = $content_bg;
    }

    /**
     * @return string
     */
    public function getContentEn(): string
    {
        return $this->content_en;
    }

    /**
     * @param string $content_en
     */
    public function setContentEn(string $content_en): void
    {
        $this->content_en = $content_en;
    }

    /**
     * @return string
     */
    public function getTitleBg(): string
    {
        return $this->title_bg;
    }

    /**
     * @param string $title_bg
     */
    public function setTitleBg(string $title_bg): void
    {
        $this->title_bg = $title_bg;
    }

    /**
     * @return string
     */
    public function getTitleEn(): string
    {
        return $this->title_en;
    }

    /**
     * @param string $title_en
     */
    public function setTitleEn(string $title_en): void
    {
        $this->title_en = $title_en;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getImageName(): string
    {
        return $this->image_name;
    }
    /**
     * @return string
     */
    public function getCreateDate(): string
    {
        return $this->create_date;
    }

    /**
     * @param string $create_date
     */
    public function setCreateDate(string $create_date): void
    {
        $this->create_date = $create_date;
    }

}