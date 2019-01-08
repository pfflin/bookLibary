<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/11/2018
 * Time: 11:28 AM
 */

namespace App\Data;


class BookDTO
{
    private $bookId;
    private $title;
    private $author;
    private $description;
    private $image;
    private $genre;
    private $user;


    public function getBookId()
    {
        return $this->bookId;
    }


    public function setBookId($bookId): void
    {

        $this->bookId = $bookId;
    }


    public function getTitle()
    {

        return $this->title;
    }


    public function setTitle($title): void
    {
        if (strlen($title)<3 || strlen($title)>50){
            throw new \Exception("Title must be at between 3 and 50 characters!");
        }
        $this->title = $title;
    }


    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author): void
    {
        if (strlen($author)<3 || strlen($author)>50){
            throw new \Exception("Author must be at between 3 and 50 characters!");
        }
        $this->author = $author;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description): void
    {
        if (strlen($description)<10 || strlen($description)>10000){
            throw new \Exception("Description must be at between 10 and 10000 characters!");
        }
        $this->description = $description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        if (strlen($image)<3 || strlen($image)>255){
            throw new \Exception("ImageURL must be at between 3 and 255 characters!");
        }
        $this->image = $image;
    }
    public function getGenre()
    {
        return $this->genre;
    }

    public function setGenre($genre): void
    {
        $this->genre = $genre;
    }

    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user): void
    {
        $this->user = $user;
    }

}