<?php /** @var $data \DataDTO\ImageEditPostDTO */?>
<p>Post ID:<?=$data->getPostId()?></p>
<p>Category:<?php foreach($data->getCategories() as $categories){
    /** @var $categories \DataDTO\CategoryDTO */
        echo ($categories->getCatId()==$data->getCatId())? $categories->getCatNameEn():'';
    }?></p>
<p>Created On:<?=$data->getCreateDate()?></p>
<p style="visibility: <?php if(isset($_GET['lang'])){if($_GET['lang']=='bg'){echo 'visible';}else{echo 'hidden';}}else{echo 'visible';}?>">Заглавие:<?=$data->getTitleBg()?></p>
<p style="visibility: <?php if(isset($_GET['lang'])){if($_GET['lang']=='bg'){echo 'visible';}else{echo 'hidden';}}else{echo 'visible';}?>">Статия:<?=$data->getContentBg()?></p>
<p style="visibility: <?php if(isset($_GET['lang'])){if($_GET['lang']=='en'){echo 'visible';}else{echo 'hidden';}}else{echo 'visible';}?>">Title:<?=$data->getTitleEn()?></p>
<p style="visibility: <?php if(isset($_GET['lang'])){if($_GET['lang']=='en'){echo 'visible';}else{echo 'hidden';}}else{echo 'visible';}?>">Post:<?=$data->getContentEn()?></p>
<?php foreach($data->getImages() as $images){
    /** @var $images \DataDTO\ImageDTO */
    $imageURL = 'Uploads/'.$images->getImageName();?>
    <img src="<?=$imageURL?>" width="150" height="150" alt="" />
    <?php } ?>

