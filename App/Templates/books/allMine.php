<?php /** @var \App\Data\BookDTO[] $data */ ?>

<h1>My Books</h1>

<div><a href="add_book.php">Add Book</a> | <a href="profile.php">My Profile</a> | <a href="logout.php">logout</a> </div>

</br>

<table border="1">
    <thead>
    <td>Title</td>
    <td>Author</td>
    <td>Genre</td>
    <td>Edit</td>
    <td>Delete</td>
    </thead>
    <tbody>
    <?php foreach ($data as $book):?>
        <tr>
            <td><?=$book->getTitle()?></td>
            <td><?=$book->getAuthor()?></td>
            <td><?=$book->getGenre()?></td>
            <td> <a href="edit.php?id=<?=$book->getBookId()?>">Edit</a></td>
            <td> <a href="delete.php?id=<?=$book->getBookId()?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>