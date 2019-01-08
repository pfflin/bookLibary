<?php /** @var \App\Data\BookDTO $data */ ?>

<h1>VIEW BOOK</h1>


<a href="profile.php">My Profile</a>
</br>
</br>

<div><b>Book Title</b>:<?= $data->getTitle()?></div>
</br>
<div><b>Book Author</b> <?= $data->getAuthor()?></div>
</br>
<div><b>Description</b> <?= $data->getDescription()?></div>
</br>
<div><b>Genre</b> <?= $data->getGenre()?></div>
</br>
<img src="<?= $data->getImage()?>">