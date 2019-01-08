<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/5/2018
 * Time: 3:28 PM
 */

namespace App\Service;


use App\Data\UserDTO;
use App\Repository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserDTO $userDTO, string $confirmPassword): bool
    {
        if ($this->userRepository->findOneByUsername($userDTO->getUsername()) !== null){
            return false;
        }
        $this->encryptPassword($userDTO);
        return $this->userRepository->insert($userDTO);
    }


    public function checkForUser(string $username): ?UserDTO
    {
        $currentUser = $this->userRepository->findOneByUsername($username);
        if ($currentUser === null) {
            return null;
        }
        return $currentUser;
    }

    public function login(UserDTO $currentUser, string $password): ?bool
    {

        $userPasswordHash = $currentUser->getPassword();
        if (false === password_verify($password,$userPasswordHash)){
            return null;
        }
        return true;
    }

    public function currentUser(): ?UserDTO
    {
        if (!isset($_SESSION["id"])){
            return null;
        }
       return $this->userRepository->findOneById($_SESSION["id"]);
    }

    public function edit(UserDTO $userDTO): bool
    {
        $currentUser = $this->userRepository->findOneByUsername($userDTO->getUsername());
        if ($currentUser !== null){
            return false;
        }
        $this->encryptPassword($userDTO);
       return $this->userRepository->update($_SESSION['id'],$userDTO);
    }

    /**
     * @param UserDTO $userDTO
     */
    private function encryptPassword(UserDTO $userDTO): void
    {
        $plainText = $userDTO->getPassword();
        $passwordHash = password_hash($plainText, PASSWORD_DEFAULT);
        $userDTO->setPassword($passwordHash);
    }

    public function checkPasswords(UserDTO $userDTO, string $pass): bool
    {
        if ($userDTO->getPassword() !== $pass){
            return false;
        }
        return true;
    }
}