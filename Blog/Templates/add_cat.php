<form method="post">
    <?php /** @var errors|null */ ?>
    <?php foreach($errors as $error):?>
        <p style="color: red"><?=$error?></p>
    <?php endforeach;?>
    Category in English: <input type="text" name="cat_name_en"><br>
    Категория на Български: <input type="text" name="cat_name_bg"><br>
    <button type="submit" name="insert">Insert</button>
</form>