<?php /**@var \App\Data\UserDTO $data */

?>

<h1>Hello, <?= $data->getFullName()?></h1>



<div><a href="add_book.php">Add new Book</a> | <a href="logout.php">logout</a> </div>
</br>
<div><a href="my_books.php">My Books</a> </div>
<div><a href="all_books.php">All Books</a> </div>