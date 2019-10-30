<?php /** @var $data \DataDTO\ImageEditPostDTO */ $test='';
$getCatName='getCatName'.ucfirst($_GET['lang']);
$getTitle='getTitle'.ucfirst($_GET['lang']);
foreach($data as $post){
    /** @var $post \DataDTO\ImageEditPostDTO */

    if($test!==$post->getCreateDate()){
        $test=$post->getCreateDate();
    }else{
        continue;
    }
    ?>
    <a class="postimage" href="view.php?id=<?=$post->getPostId()?>&lang=<?=$_GET['lang']?>">
        <?php
        if(!$post->getImages()==Null){
            $imageURL="https://vignette.wikia.nocookie.net/sirballsfart/images/f/f4/No-image-found.jpg/revision/latest/scale-to-width-down/220?cb=20190405043300";
        }
        foreach($post->getImages() as $imagetest)
        {
            if(!$imagetest==null) {
                $imageURL = 'Uploads/' . $imagetest->getImageName();
            }
        }
        ?>
        <img src="<?=$imageURL?>"  alt="No image found" />
        <div>
            <p id="imagecat">
            <?php
            foreach($post->getCategories() as $categories){
                /** @var $categories \DataDTO\CategoryDTO */
                echo ($categories->getCatId()==$post->getCatId())? $categories->$getCatName():'';
            }?>
            </p>
        </div>
        <p class="title"><?=$post->$getTitle();?></p>
        <p class="date"><?=date("d F Y",strtotime($post->getCreateDate()));?></p>
    </a>
<?php } ?>

