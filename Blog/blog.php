<?php require_once 'includes.php';
if($_GET['lang']){
    $lang = $_GET['lang'];
    $Lang = ucfirst($lang);
}else{
    header("Location: blog.php?lang=bg");
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<a href="blog.php?lang=bg"><img  src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Flag_of_Bulgaria.svg/400px-Flag_of_Bulgaria.svg.png" height="10px"></a>
<a href="blog.php?lang=en"><img  src="https://upload.wikimedia.org/wikipedia/commons/f/f2/Flag_of_Great_Britain_%281707%E2%80%931800%29.svg" height="10px"></a>
<p class="blog"><?=($_GET['lang']=='en')?'Blog':'Блог';?></p>
<div id="classes">
    <div class="allclasses">
        <?php $category->all_categories_blog(); ?>
    </div>
</div>
<div id="posts">
    <div class="postgenerator">
        <?php $post->all_posts_blog(); ?>
    </div>
</div>
</body>
</html>