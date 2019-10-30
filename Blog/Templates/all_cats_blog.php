    <table>
        <tr>
            <?php /** @var $data \DataDTO\CategoryDTO */
            $getCatName='getCatName'.ucfirst($_GET['lang']);
                foreach ($data as $category){
            /** @var $category \DataDTO\CategoryDTO */ ?>

            <td><a href="blog.php?lang=<?=$_GET['lang']?>&cat=<?=$category->getCatId()?>"><?=$category->$getCatName()?></a></td>
            <?php } ?>
        </tr>
    </table>

