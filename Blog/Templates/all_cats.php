<?php /**  @var $data|null */ ?>
<a href="admin.php">Home</a>
<br><br>
<table border="2">
    <tr>
        <td>Category in English</td>
        <td>Категория на Български</td>
    </tr>
    <?php foreach($data as $category){
        /** @var $category \DataDTO\CategoryDTO */
    ?>
    <tr>
        <td><?= $category->getCatNameEn(); ?></td>
        <td><?= $category->getCatNameBg(); ?></td>
    </tr>
    <?php } ?>
</table>
