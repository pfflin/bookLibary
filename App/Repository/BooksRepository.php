<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/11/2018
 * Time: 11:31 AM
 */

namespace App\Repository;


use App\Data\BookDTO;
use Database\DatabaseInterface;
class BooksRepository implements BooksRepositoryInterface
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

    public function insert(BookDTO $bookDTO): bool
    {
        $this->db->query("INSERT INTO books(title,author,description,image,genre_id,user_id)
        VALUES(? , ? , ? , ? , ?, ? )")
            ->execute([$bookDTO->getTitle(),
                $bookDTO->getAuthor(),
                $bookDTO->getDescription(),
                $bookDTO->getImage(),
                $bookDTO->getGenre(),
                $bookDTO->getUser()
            ]);
        return true;
    }

    public function findOneById($id): ?BookDTO
    {
        return $this->db->query("SELECT b.book_id as bookId,b.title,b.author,b.description,b.image,g.name as genre,u.username as user FROM books b
INNER JOIN genres g
on b.genre_id = g.genre_id
INNER JOIN users u
on b.user_id = u.user_id
        WHERE  book_id = ?")
            ->execute([$id])->fetch(BookDTO::class)->current();
    }

    public function update(BookDTO $bookDTO): bool
    {
        $this->db->query("UPDATE books
                                SET title = ?,
                                author = ?,
                                description = ?,
                                image = ?,
                                genre_id = ?,
                                user_id=?
                                WHERE book_id = ?")
            ->execute([$bookDTO->getTitle(),
                $bookDTO->getAuthor(),
                $bookDTO->getDescription(),
                $bookDTO->getImage(),
                $bookDTO->getGenre(),
                $bookDTO->getUser(),
                $bookDTO->getBookId()
            ]);
        return true;
    }

    /** @return \Generator|BookDTO[] */
    public function findAll(): \Generator
    {
        return $this->db->query("SELECT b.book_id as bookId,b.title,b.author,b.description,b.image,g.name as genre,u.username as user FROM books b
INNER JOIN genres g
on b.genre_id = g.genre_id
INNER JOIN users u
on b.user_id = u.user_id
ORDER BY b.added_on DESC
")
            ->execute([])->fetch(BookDTO::class);
    }
    /** @return \Generator|BookDTO[] */
    public function findAllMine(int $id): \Generator
    {
        return $this->db->query("SELECT b.book_id as bookId,b.title,b.author,b.description,b.image,g.name as genre,u.username as user FROM books b
INNER JOIN genres g
on b.genre_id = g.genre_id
INNER JOIN users u
on b.user_id = u.user_id
WHERE u.user_id= ?
ORDER BY b.added_on DESC")
            ->execute([$id])->fetch(BookDTO::class);
    }
    public function deleteOne(int $id): bool
    {
         $this->db->query("DELETE FROM books WHERE book_id = ?")
            ->execute([$id]);
         return true;
    }
}