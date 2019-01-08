<?php /** @var \App\Data\BookDTO[] $data */ ?>

<h1>My Books</h1>

<div><a href="add_book.php">Add Book</a> | <a href="profile.php">My Profile</a> | <a href="logout.php">logout</a> </div>

</br>

<table border="1">
    <thead>
    <td>Title</td>
    <td>Author</td>
    <td>Genre</td>
    <td>Added by User</td>
    <td>Details</td>
    </thead>
    <tbody>
    <?php foreach ($data as $book):?>
        <tr>
            <td><?=$book->getTitle()?></td>
            <td><?=$book->getAuthor()?></td>
            <td><?=$book->getGenre()?></td>
            <td><?=$book->getUser()?></td>
            <td> <a href="view.php?id=<?=$book->getBookId()?>">Details</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>