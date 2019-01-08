<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/11/2018
 * Time: 11:42 AM
 */

namespace App\Service;
use App\Data\BookDTO;

interface BooksServiceInterface
{
    public function add(BookDTO $bookDTO):bool ;
    public function edit(BookDTO $bookDTO):bool ;
    /** @return \Generator|BookDTO[] */
    public function all() : \Generator;
    /** @return \Generator|BookDTO[] */
    public function allMine() : \Generator;

    public function findOneById(int $id):?BookDTO;

    public function deleteOneById($bookId):bool ;
}