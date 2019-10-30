<?php /** @var $data|null */ ?>
<table border="2">
    <tr>
        <td>ID</td>
        <td>Title/View</td>
        <td>Update</td>
        <td>Delete</td>
    </tr>
    <?php foreach($data as $post){
        /** @var $post \DataDTO\PostDTO */
    ?>
    <tr>
        <td><?=$post->getPostId()?></td>
        <td><a href="view.php?id=<?=$post->getPostId()?>"><?=$post->getTitleEn()?></a> </td>
        <td><a href="update.php?id=<?=$post->getPostId()?>">Update</a></td>
        <td><a href="delete.php?id=<?=$post->getPostId()?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>