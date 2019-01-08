<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/11/2018
 * Time: 11:07 AM
 */

namespace App\Service;


use App\Data\GenreDTO;
use App\Repository\GenreRepositoryInterface;

class GenreService implements GenreServiceInterface
{
    /** @var GenreRepositoryInterface */
    private $genreRepository;

    public function __construct(GenreRepositoryInterface $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    /** @return \Generator|GenreDTO[] */
    public function all(): \Generator
    {
        return $this->genreRepository->findAll();
    }
}