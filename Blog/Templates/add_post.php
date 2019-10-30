<?php /** @var DataDTO\CategoryDTO $data */?>
<h1>Add Post</h1>
<a href="admin.php">Home</a>
<?php /** #var $errors|null */ ?>
<?php foreach($errors as $error):?>
    <p style="color: red"><?=$error?></p>
<?php endforeach;?>
<br><br>
<form method="post">
    Category:
    <select name="cat_id">
        <option></option>
        <?php foreach($data as $category): /** @var DataDTO\CategoryDTO $category */?>
            <option value="<?=$category->getCatId();?>"><?=$category->getCatNameEn();?></option>
        <?php endforeach; ?>
    </select>
    Autor:<input type="text" name="author"><br>
    <div>
        Post Title:<input type="text" name="title_en">
        Post Content:<textarea name="content_en"></textarea>
    </div>
    <div>
        Име на статията:<input type="text" name="title_bg">
        Съдържание на статията:<textarea name="content_bg"></textarea>
    </div>
    <button type="submit" name="create">Create</button>
</form>