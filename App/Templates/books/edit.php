<?php /** @var \App\Data\BookDTO $data */ ?>

<h1>EDIT BOOK</h1>

<div style="color: red"><?php if (isset($data[2])){
    echo $data[2];
} ?>
</div>
</br>
<a href="profile.php">My Profile</a>
<form method="post">
    <div>
        Book Title: <label>
            <input type="text" name="title" value="<?= $data[0]->getTitle()?>">
        </label>
    </div>
    <div>
        Book Author: <label>
            <input type="text" name="author" value="<?= $data[0]->getAuthor()?>" >
        </label>
    </div>
    <div>
        Description: <label>
            <textarea name="description"><?= $data[0]->getDescription()?></textarea>
        </label>
    </div>
    <div>
        Image URL: <label>
            <input type="text" name="image" value="<?= $data[0]->getImage()?>">
        </label>
    </div>
    <input type="hidden" name="user" value="<?=$_SESSION['id']?>">
    <input type="hidden" name="bookId" value="<?=$data[0]->getBookId()?>">
    Genre : <select name="genre">
        <?php foreach ($data[1] as $genre):?>


            <option  <?php if ($data[0]->getGenre() === $genre->getName()){
                echo "selected";
            } ?>  value="<?=$genre->getId() ?>"><?=$genre->getName()?></option>
        <?php endforeach; ?>
    </select>
    </br>
    <input type="submit" name="editBook" value="Edit Book">
</form>