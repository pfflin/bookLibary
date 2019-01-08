<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/11/2018
 * Time: 11:44 AM
 */

namespace App\Service;


use App\Data\BookDTO;
use App\Repository\BooksRepository;
use App\Repository\BooksRepositoryInterface;

class BooksService implements BooksServiceInterface
{
    /** @var BooksRepositoryInterface */
    private $bookRepository;

    public function __construct(BooksRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function add(BookDTO $bookDTO): bool
    {
        return $this->bookRepository->insert($bookDTO);
    }

    public function edit(BookDTO $bookDTO): bool
    {
        return $this->bookRepository->update($bookDTO);
    }

    /** @return \Generator|BookDTO[] */
    public function all(): \Generator
    {
        return $this->bookRepository->findAll();
    }

    /** @return \Generator|BookDTO[] */
    public function allMine(): \Generator
    {
        $id = $_SESSION['id'];
        return $this->bookRepository->findAllMine($id);
    }

    public function findOneById(int $id): ?BookDTO
    {
        return $this->bookRepository->findOneById($id);
    }

    public function deleteOneById($bookId):bool
    {
       return $this->bookRepository->deleteOne($bookId);
    }
}