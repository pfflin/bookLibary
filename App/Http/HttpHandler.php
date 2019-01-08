<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/5/2018
 * Time: 8:35 PM
 */

namespace App\Http;


use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\GenreServiceInterface;
use App\Service\UserServiceInterface;

class HttpHandler extends HttpHandlerAbstract
{
    public function index(){
        $this->render("/home/index");
    }

    public function profile(UserServiceInterface $userService,array $formData = []){

        $currentUser = $userService->currentUser();
        if ($currentUser == null){
            $this->redirect("login.php");
        }
        if (isset($formData["edit"])) {
            $this->handleEditProcess( $userService,$formData);
        }else {
                  $this->render("/users/profile",$currentUser);
        }
    }
    public function login(UserServiceInterface $userService,array $formData = []){
        if (isset($formData["login"])) {
            $this->handleLoginProcess( $userService,$formData);
        }else {
            if (isset($_SESSION['username']))
            {
                $username = $_SESSION['username'];
                $this->render("/users/login","<div style=\"color:green;\">Congratulations, $username.Login into our platform</div>");

            }


            $this->render("/users/login");
        }
    }
    public function register(UserServiceInterface $userService,array $formData = [])
    {

        if (isset($formData["register"])) {
            $this->handleRegisterProcess( $userService,$formData);
        }else {
            $this->render("/users/register");
        }
    }
    private function handleRegisterProcess(UserServiceInterface $userService,array $formData = []){
        /** @var UserDTO $user */
        try {
            $user = $this->dataBinder->bind($formData, UserDTO::class);

            if (!$userService->checkPasswords($user,$formData['password_confirm'])){
                $this->render("/users/register", "Passwords don't match");
                exit;
            };

            if ($userService->register($user, $formData['password_confirm'])) {
                $userName = $user->getUsername();
                $_SESSION['username']=$userName;
             $this->redirect("login.php");
               // $this->render("/users/login", "<div style=\"color:green;\">Congratulations, $userName.Login into our platform</div>");
            }
            else {
                $this->render("/users/register", "Username is already taken");
            }
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $this->render("/users/register", $message);

        }
    }
    private function handleLoginProcess(UserServiceInterface $userService,array $formData = [])
    {
        $currentUser=$userService->checkForUser($formData['username']);

        if (!$currentUser){
            $this->render("/users/login", "<div style=\"color:red;\">Your username does not exist, you might want to <a href='register.php'>register</a></div>");
        }
        else{
            if ($userService->login($currentUser, $formData['password']) !== null) {
                $_SESSION['id'] = $currentUser->getId();
                $this->redirect("profile.php");
            } else{
                $this->render("/users/login", "<div style=\"color:red;\">Wrong password.Did you forget it?</div>");
            }
        }
    }
    private function handleEditProcess( UserServiceInterface $userService,array $formData = [])
        {
            $user = $this->dataBinder->bind($formData,UserDTO::class);
            if($userService->edit($user)){
                $this->redirect("profile.php");
            }
            else{
                $this->render("/app/error", new ErrorDTO("Error in Editing process"));
            }

        }


}