<form method="POST">
    <?php /** @var errors|null */ ?>
    <?php foreach($errors as $error):?>
        <p style="color: red"><?=$error?></p>
    <?php endforeach;?>
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit" name="login">Login</button>
</form>