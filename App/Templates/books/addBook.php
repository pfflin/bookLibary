<?php /** @var \App\Data\GenreDTO[] $data */ ?>

<h1>ADD NEW BOOK</h1>
</br>
<div style="color: red"><?php if (isset($data[1])){
    echo $data[1];
    } ?></div>
<a href="profile.php">My Profile</a>
<form method="post">
    <div>
        Book Title: <label>
            <input type="text" name="title">
        </label>
    </div>
    <div>
        Book Author: <label>
            <input type="text" name="author">
        </label>
    </div>
    <div>
        Description: <label>
            <textarea name="description"></textarea>
        </label>
    </div>
    <div>
        Image URL: <label>
            <input type="text" name="image">
        </label>
    </div>
    <input type="hidden" name="user" value="<?=$_SESSION['id']?>">
   Genre : <select name="genre">
        <?php foreach ($data[0] as $genre):?>
            <option value="<?=$genre->getId() ?>"><?=$genre->getName()?></option>
        <?php endforeach; ?>
    </select>
</br>
    <input type="submit" name="addBook" value="Add">
</form>