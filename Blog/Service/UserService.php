<?php


namespace Service;


use DataDTO\UserDTO;
use mysql_xdevapi\Exception;
use Repository\UserRepository;

class UserService
{
    /**
     * @var UserRepository
     */
    private $user_repository;

    /**
     * UserService constructor.
     * @param UserRepository $user_repository
     */
    public function __construct(UserRepository $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function login(string $username,string $password){
        $user=$this->user_repository->getOneByName($username);
        /** @var UserDTO $user */
        if($user){

            if(!($password==$user->getPassword()))
            {
                throw new \Exception('Invalid Password');
            }
            return $user->getUserId();
        }else{
            throw new \Exception('Username is incorrect');
        }
}
}