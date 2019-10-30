<?php


namespace Repository;

use Database\PDODatabase;
use DataDTO\UserDTO;

class UserRepository
{
    /**
     * @var PDODatabase
     */
    private $db;

    /**
     * UserRepository constructor.
     * @param PDODatabase $db
     */
    public function __construct(PDODatabase $db)
    {
        $this->db = $db;
    }

    public function getOneById(int $id):?UserDTO
    {
        $stm=$this->db->query('SELECT user_id,username,password 
                                FROM user WHERE user_id=:user_id');
        $result= $stm->execute(['user_id'=>$id]);
        return $result->getOne(UserDTO::class);
    }

    public function getOneByName(string $username)
    {
        $stm=$this->db->query('SELECT user_id,username,password 
                                FROM user WHERE username=:username');
        return  $stm->execute(['username'=>$username])->getOne(UserDTO::class);

    }

}