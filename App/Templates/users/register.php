<h1>USER REGISTER</h1>

<div style="color:red;"><?php if ($data) echo $data?></div>

<form method="post">
    <div>
    Username: <label>
            <input type="text" name="username">
        </label>
    </div>
    <div>
        Password: <label>
            <input type="text" name="password">
        </label>
    </div>
    <div>
       Confirm Password: <label>
            <input type="text" name="password_confirm">
        </label>
    </div>
    <div>
        Full name: <label>
            <input type="text" name="fullName">
        </label>
    </div>
        Born on: <label>
            <input type="date" name="bornOn">
        </label>
    </div>
    <div>
        <input type="submit" name="register" value="Register">
    </div>
</form>