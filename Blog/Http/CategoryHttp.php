<?php


namespace Http;


use Core\DataBinding;
use Core\Template;
use DataDTO\CategoryDTO;
use Service\CategoryService;

class CategoryHttp extends HttpAbstracts
{
    /**
     * @var Template
     */
    private $template;
    /**
     * @var DataBinding
     */
    private $data_binder;
    /**
     * @var CategoryService
     */
    private $category_service;

    /**
     * CategoryHttp constructor.
     * @param Template $template
     * @param DataBinding $data_binder
     * @param CategoryService $category_service
     */
    public function __construct(Template $template, DataBinding $data_binder, CategoryService $category_service)
    {
        $this->template = $template;
        $this->data_binder = $data_binder;
        $this->category_service = $category_service;
    }

    public function insert($data=[])
    {
        if(isset($data['insert'])){
            try {
                $category = $this->data_binder->bind($data, CategoryDTO::class);
                $this->category_service->insertCategory($category);
                $this->redirect('admin.php');
            } catch (\Exception $ex) {
                $this->template->render('add_cat',null,[$ex->getMessage()]);
            }

        }else{
            $this->template->render('add_cat');
        }
    }

    public function all_categories(){
        $this->template->render('all_cats',$this->category_service->getAllCategories());
    }

    public function all_categories_blog(){
        $this->template->render('all_cats_blog',$this->category_service->getAllCategories());
    }
}