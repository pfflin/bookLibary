<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/5/2018
 * Time: 2:28 PM
 */
namespace App\Data;
class UserDTO
{
    private $id;
    private $username;
    private $password;
    private $fullName;
    private $bornOn;

    public function getId()
    {
        return $this->id;
    }

    public function getFullName()
    {
        return $this->fullName;
    }
    public function setFullName($fullName): void
    {
        if (strlen($fullName)<5){
            throw new \Exception("Full Name must be at between 5 and 255 characters!");
        }
        $this->fullName = $fullName;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        if (strlen($username)<4){
            throw new \Exception("Username must be at between 4 and 255 characters!");
        }
        $this->username = $username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        if (strlen($password)<4){
            throw new \Exception("Password must be at between 4 and 255 characters!");
        }
        $this->password = $password;
    }
    public function getBornOn()
    {

        return $this->bornOn;
    }
    public function setBornOn($bornOn)
    {
        if ($bornOn){
            $this->bornOn = $bornOn;
        }
        else{
            throw new \Exception("Date of birth can't be empty");
        }
    }
}