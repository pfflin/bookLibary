<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/11/2018
 * Time: 11:04 AM
 */

namespace App\Repository;


use App\Data\GenreDTO;
use Database\DatabaseInterface;

class GenreRepository implements GenreRepositoryInterface
{
    /** @var DatabaseInterface */
    private $db;

    /**
     * UserRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }
    /** @return \Generator|GenreDTO[] */
    public function findAll(): \Generator
    {
        return $this->db->query("SELECT genre_id as id, name
        FROM genres")
            ->execute([])->fetch(GenreDTO::class);
    }
}