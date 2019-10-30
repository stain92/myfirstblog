<?php
require_once 'includes.php';
if(!isset($_SESSION['user_id'])){
    header('Location: blog.php');
}
?>
<a href="add_cat.php">Add Category</a>
<a href="add_post.php">Add Post</a>
<a href="all_cats.php">All Categories</a>
<br><br>
<?php $post->getAllPosts();?>