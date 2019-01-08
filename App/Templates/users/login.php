<?php /** @var $data */ ?>

<h1>USER LOGIN</h1>

<?php if ($data) echo $data?>
</br>
<form method="post">
    <div>
        Username: <label>
            <input type="text" name="username">
        </label>
    </div>
    <div>
        Password: <label>
            <input type="text" required="required" name="password">
        </label>
    </div>
    <div>
    <div>
        <input type="submit" name="login" value="Login">
    </div>
</form>