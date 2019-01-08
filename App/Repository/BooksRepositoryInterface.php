<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/11/2018
 * Time: 11:27 AM
 */

namespace App\Repository;


use App\Data\BookDTO;

interface BooksRepositoryInterface
{
    public function insert(BookDTO $bookDTO):bool ;
    public function findOneById($id):?BookDTO;
    public function update(BookDTO $bookDTO):bool ;
    /** @return \Generator|BookDTO[] */
    public function findAll():\Generator;
    /** @return \Generator|BookDTO[] */
    public function findAllMine(int $id): \Generator;
    public function deleteOne(int $id):bool ;
}