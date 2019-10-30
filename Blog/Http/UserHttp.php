<?php


namespace Http;


use Core\Template;
use Service\UserService;

class UserHttp extends HttpAbstracts
{
    /**
     * @var Template
     */
    private $template;
    /**
     * @var UserService
     */
    private $user_service;

    /**
     * UserHttp constructor.
     * @param Template $template
     * @param UserService $user_service
     */
    public function __construct(Template $template, UserService $user_service)
    {
        $this->template = $template;
        $this->user_service = $user_service;
    }

    public function login(array $data=[]){
        if(isset($data['login']))
        {
            try {
                $user_id = $this->user_service->login($data['username'], $data['password']);
                $_SESSION['user_id']=$user_id;

                $this->redirect('admin.php');
            } catch (\Exception $ex) {
                $this->template->render('login',null,[$ex->getMessage()]);
            }
        }else{
            $this->template->render('login');
        }
    }
}