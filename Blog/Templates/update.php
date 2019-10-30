<?php /** @var $data \DataDTO\EditPostDTO*/?>
<h1>Update Post</h1>
<?php /** #var $errors|null */ ?>
<?php foreach($errors as $error):?>
    <p style="color: red"><?=$error?></p>
<?php endforeach;?>
<a href="admin.php">Home</a>
<br><br>
<form method="POST" enctype="multipart/form-data">
    <label>
        Category:
        <select name="cat_id">
            <?php foreach($data->getCategories() as $category): /** @var $category \DataDTO\CategoryDTO*/?>
                <option <?=($data->getCatId()==$category->getCatId())?'selected':'';?> value="<?=$category->getCatId();?>"><?=$category->getCatNameEn();?></option>
            <?php endforeach; ?>
        </select>
    </label><br>
    <label>
        Author: <input type="text" name="author" value="<?=$data->getAuthor() ?>"> <br>
    </label>
    <label>
        Title in English: <input type="text" name="title_en" value="<?=$data->getTitleEn() ?>"> <br>
    </label>
    <label>
        Post in English: <textarea  name="content_en"><?=$data->getContentEn()?></textarea><br>
    </label>
    <label>
        Заглавие на Български: <input type="text" name="title_bg" value="<?=$data->getTitleBg() ?>"> <br>
    </label>
    <label>
        Статия на Български: <textarea  name="content_bg"><?=$data->getContentBg()?></textarea><br>
    </label>
    Select Image Files to Upload:
    <input type="file" name="files[]" multiple >
    <input type="submit" name="update" value="Update">

</form>