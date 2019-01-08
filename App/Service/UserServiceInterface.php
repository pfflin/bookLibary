<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/5/2018
 * Time: 3:26 PM
 */

namespace App\Service;
use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO,string $confirmPassword):bool ;
    public function login(UserDTO $currentUser,string $password):?bool ;
    public function currentUser():?UserDTO;
    public function edit(UserDTO $userDTO):bool ;
    public function checkPasswords(UserDTO $userDTO, string $pass): bool;
    public function checkForUser(string $username): ?UserDTO;
}