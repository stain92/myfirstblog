<?php


namespace Http;


use Core\DataBinding;
use Core\Template;
use DataDTO\EditPostDTO;
use DataDTO\ImageEditPostDTO;
use DataDTO\PostDTO;
use Service\CategoryService;
use Service\ImageService;
use Service\PostService;

class PostHttp extends HttpAbstracts
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
     * @var PostService
     */
    private $post_service;
    /**
     * @var CategoryService
     */
    private $category_service;

    /**
     * @var ImageService
     */
    private $image_service;
    /**
     * PostHttp constructor.
     * @param Template $template
     * @param DataBinding $data_binder
     * @param PostService $post_service
     */
    public function __construct(Template $template, DataBinding $data_binder,
                                PostService $post_service, CategoryService $category_service,
                                ImageService $image_service)
    {
        $this->template = $template;
        $this->data_binder = $data_binder;
        $this->post_service = $post_service;
        $this->category_service = $category_service;
        $this->image_service = $image_service;
    }

    public function createPost($data=[])
    {
        if (isset($data['create'])) {
            try {
                $post = $this->data_binder->bind($data, PostDTO::class);
                $post_id=$this->post_service->createPost($post);
                setcookie("id", $post_id, time()+600);
                $this->redirect('add_post_image.php');
            } catch (\Exception $ex) {
                $this->template->render('add_post', $this->category_service->getAllCategories(), [$ex->getMessage()]);
            }
        } else {
            $this->template->render('add_post', $this->category_service->getAllCategories());
        }
    }

    public function getAllPosts(){
        $this->template->render('all_posts',$this->post_service->getAllPosts());
    }

    public function FromPostToEditDTO(PostDTO $check_post,int $id){
        $post = new EditPostDTO();
        $post->setPostId($id);
        $post->setContentBg($check_post->getContentBg());
        $post->setContentEn($check_post->getContentEn());
        $post->setTitleBg($check_post->getTitleBg());
        $post->setTitleEn($check_post->getTitleEn());
        $post->setAuthor($check_post->getAuthor());
        $post->setCreateDate($check_post->getCreateDate());
        $post->setCategories($this->category_service->getAllCategories());
        $post->setCatId($check_post->getCatId());
        return $post;
    }

    public function FromPostToImageEditDTO(PostDTO $check_post,int $id){
        $post = new ImageEditPostDTO();
        $post->setPostId($id);
        $post->setContentBg($check_post->getContentBg());
        $post->setContentEn($check_post->getContentEn());
        $post->setTitleBg($check_post->getTitleBg());
        $post->setTitleEn($check_post->getTitleEn());
        $post->setAuthor($check_post->getAuthor());
        $post->setCreateDate($check_post->getCreateDate());
        $post->setCategories($this->category_service->getAllCategories());
        $post->setCatId($check_post->getCatId());
        $post->setImages($this->image_service->getImagesByPostID($id));
        return $post;
    }

    public function getOneById(array $data=[]){
        if(!is_numeric($data['id'])){
            $this->redirect('admin.php');
        }
        if(isset($data['id'])){
            /** @var $check_post PostDTO $check_post */
            $check_post=$this->post_service->getOnePostById($data['id']);
            if(!$check_post){
                $this->redirect('admin.php');
            }
            $post = $this->FromPostToImageEditDTO($check_post,$data['id']);

            $this->template->render('view',$post);
        }else{
            $this->redirect('admin.php');
        }
    }

    public function updateOneById(array $data=[],array $datapost=[]){
        if(!is_numeric($data['id'])){
            $this->redirect('admin.php');
        }
        if(isset($datapost['update'])){
            try{
            /** @var $newpost PostDTO*/
            $newpost = $this->data_binder->bind($datapost,PostDTO::class);
            $newpost->setPostId($data['id']);


                $targetDir = "Uploads/";
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

                $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
                if (!empty(array_filter($_FILES['files']['name']))) {
                    foreach ($_FILES['files']['name'] as $key => $val) {

                        $fileName = basename($_FILES['files']['name'][$key]);
                        $targetFilePath = $targetDir . $fileName;


                        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                        if (in_array($fileType, $allowTypes)) {

                            if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {

                                $insertValuesSQL .= "('" . $fileName . "',".$newpost->getPostId()."),";
                                echo $insertValuesSQL;
                            } else {
                                $errorUpload .= $_FILES['files']['name'][$key] . ', ';
                            }
                        } else {
                            $errorUploadType .= $_FILES['files']['name'][$key] . ', ';
                        }
                    }

                    if (!empty($insertValuesSQL)) {
                        $insertValuesSQL = trim($insertValuesSQL, ',');

                        $insert = $this->image_service->addImages($insertValuesSQL);
                        if ($insert) {
                            $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . $errorUpload : '';
                            $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . $errorUploadType : '';
                            $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
                            $statusMsg = "Files are uploaded successfully." . $errorMsg;
                        } else {
                            $statusMsg = "Sorry, there was an error uploading your file.";
                        }
                    }
                } else {
                    $statusMsg = 'Please select a file to upload.';
                }


                echo $statusMsg;



            $this->post_service->updatePost($newpost,$data['id']);
            $this->redirect('admin.php');
        }catch(\Exception $ex){
                /** @var $check_post PostDTO $check_post */
                $check_post=$this->post_service->getOnePostById($data['id']);
                $post = $this->FromPostToEditDTO($check_post,$data['id']);
                $this->template->render('update',$post,[$ex->getMessage()]);
            }
        }else{
            /** @var $check_post PostDTO $check_post */
            $check_post=$this->post_service->getOnePostById($data['id']);
            $post = $this->FromPostToEditDTO($check_post,$data['id']);
            $this->template->render('update',$post);
        }
        if(isset($data['id'])){
            /** @var $check_post PostDTO $check_post */
            $check_post=$this->post_service->getOnePostById($data['id']);
            if(!$check_post){
                $this->redirect('admin.php');
            }
            $post = $this->FromPostToEditDTO($check_post,$data['id']);

            $this->template->render('update',$post);
        }else{
            $this->redirect('admin.php');
        }
    }

    public function deletePost(array $data=[])
    {
        if(isset($data['id']))
        {
            if (!is_numeric($data['id']))
            {
                $this->redirect('admin.php');
            }
            $this->post_service->deletePost($data['id']);
            $this->redirect('admin.php');
            }else {
            $this->redirect('admin.php');
        }
    }


    public function all_posts_blog(){
        $allpostsarray = [];
        $allposts = $this->post_service->getAllPosts();
        foreach($allposts as $post){
            /** @var $post PostDTO */
            $newpost = $this->FromPostToImageEditDTO($post,$post->getPostId());

            $allpostsarray[] = $newpost;
        }
        $this->template->render('all_posts_blog',$allpostsarray);
    }

    public function add_post_image(array $data,int $id){
        if(isset($data['upload'])){

            $targetDir = "Uploads/";
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
            if (!empty(array_filter($_FILES['files']['name']))) {
                foreach ($_FILES['files']['name'] as $key => $val) {

                    $fileName = basename($_FILES['files']['name'][$key]);
                    $targetFilePath = $targetDir . $fileName;

                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                    if (in_array($fileType, $allowTypes)) {

                        if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                            $insertValuesSQL .= "('" . $fileName . "',".$_COOKIE['id']."),";
                            echo $insertValuesSQL;
                        } else {
                            $errorUpload .= $_FILES['files']['name'][$key] . ', ';
                        }
                    } else {
                        $errorUploadType .= $_FILES['files']['name'][$key] . ', ';
                    }
                }

                if (!empty($insertValuesSQL)) {
                    $insertValuesSQL = trim($insertValuesSQL, ',');

                    $insert = $this->image_service->addImages($insertValuesSQL);
                    if ($insert) {
                        $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . $errorUpload : '';
                        $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . $errorUploadType : '';
                        $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
                        $statusMsg = "Files are uploaded successfully." . $errorMsg;
                    } else {
                        $statusMsg = "Sorry, there was an error uploading your file.";
                    }
                }
            } else {
                $statusMsg = 'Please select a file to upload.';
            }

            echo $statusMsg;

            $this->redirect('admin.php');
        }else{
            $this->template->render('add_post_image');
        }
    }
}