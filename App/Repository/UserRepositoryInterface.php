<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/5/2018
 * Time: 2:24 PM
 */
namespace App\Repository;
use App\Data\UserDTO;
use App\Service\UserService;

interface UserRepositoryInterface
{
    public function insert(UserDTO $userDTO):bool ;
    public function findOneByUsername(string $name):?UserDTO;
    public function findOneById($id):?UserDTO;
    public function update(int $id,UserDTO $userDTO):bool ;
    /** @return \Generator|UserDTO[] */
    public function findAll():\Generator;
}