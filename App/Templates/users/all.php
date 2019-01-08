<?php /** @var \App\Data\UserDTO[] $data */ ?>

<h1>ALL USERS</h1>

<table border="1">
    <thead>
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Full name</td>
            <td>Born On</td>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($data as $user):?>
        <tr>
            <td><?=$user->getId() ?></td>
            <td><?=$user->getUsername() ?></td>
            <td><?=$user->getFirstName()." ".$user->getLastName() ?></td>
            <td><?=$user->getBornOn() ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

Go back to <a href="profile.php">Your Profile</a>