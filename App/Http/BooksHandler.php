<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/11/2018
 * Time: 11:25 AM
 */

namespace App\Http;

use App\Data\BookDTO;
use App\Service\BooksServiceInterface;
use App\Service\GenreServiceInterface;
use App\Service\UserServiceInterface;

class BooksHandler extends HttpHandlerAbstract
{
    public function addBook(BooksServiceInterface $bookService,$formData,GenreServiceInterface $genreService)
    {
        if (isset($formData["addBook"])) {
            $this->handleAddingProcess($bookService,$formData, $genreService);
        }else {
            $this->render("/books/addBook",[$genreService->all()]);
        }
    }

    private function handleAddingProcess(BooksServiceInterface $bookService,$formData,$genreService)
    {
        /** @var BookDTO $book */
        try {
            $book = $this->dataBinder->bind($formData, BookDTO::class);
            if ($bookService->add($book)) {
                $this->redirect("profile.php");
            }
            else {
                $this->render("/users/register");
            }
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $this->render("/books/addBook", [$genreService->all(),$message]);
        }
    }

    public function getMyBooks(BooksServiceInterface $bookService){

        $this->render("/books/allMine",$bookService->allMine());
    }

    public function getAllBooks(BooksServiceInterface $bookService)
    {
        $this->render("/books/allBooks",$bookService->all());
    }

    public function getDetails(BooksServiceInterface $bookService,UserServiceInterface $userService,array $form)
    {
        $id = $form['id'];
        $this->render("/books/details",$bookService->findOneById($id));
    }

    public function edit(BooksServiceInterface $bookService, UserServiceInterface $userService,GenreServiceInterface $genreService, array $get, array $formData)
    {
        $currentUser = $userService->currentUser();
        if ($currentUser == null){
            $this->redirect("login.php");
        }
        if (isset($formData["editBook"])) {
            $this->handleEditingProcess( $get,$bookService,$formData, $genreService);
        }else {
           $bookId =  $get['id'];
            $this->render("/books/edit",[$bookService->findOneById($bookId),$genreService->all()]);
        }
    }

    private function handleEditingProcess(array $get,BooksServiceInterface $bookService, array $formData, GenreServiceInterface $genreService)
    {
        /** @var BookDTO $book */
        try {
            $book = $this->dataBinder->bind($formData, BookDTO::class);

            if ($bookService->edit($book)) {
                $this->redirect("my_books.php");
            }
            else {
                $this->render("/users/register");
            }
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $bookId =  $get['id'];
            $this->render("/books/edit", [$bookService->findOneById($bookId),$genreService->all(),$message]);
        }
    }

    public function delete(\App\Service\BooksService $bookService, \App\Service\UserService $userService, array $data)
    {
        $currentUser = $userService->currentUser();
        if ($currentUser == null){
            $this->redirect("login.php");
        }
        $bookId = $data['id'];
        if ($bookService->deleteOneById($bookId)){
            $this->redirect("my_books.php");
        }
    }
}