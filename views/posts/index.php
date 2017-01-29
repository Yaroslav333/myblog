<?php include ROOT.'/views/layouts/header.php'; ?>

<!-- Content -->
    <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-8">DIV1

             <?php foreach ($postList as $postItem):?>
                <div class="thumbnail">
                            <img src= "<?php echo Post::getImage($postItem['id']); ?>" alt="" />
                            <div class="caption">
                                <h3><?php echo $postItem['title'];?></h3>
                                <p><?php echo $postItem['short_content'];?></p>
                                <p><a href="/post/<?php echo $postItem['id'];?>" class="button" role="button">Подробнее</a></p>
                            </div>
                </div>
             <?php endforeach;?>

            <?php echo $pagination->get(); ?>

        </div>



            <div class="col-sm-12 col-md-4 col-lg-4">DIV2
                        <h1>Рубрики</h1>
                <?php foreach ($categoryList as $categoryItem):?>
                    <ul>
                        <h2><a href="/category/<?php echo $categoryItem['id'];?>"
                               class="<?php if ($categoryId == $categoryItem['id']) echo 'active'; ?>"
                            > <?php echo $categoryItem['name'];?></a></h2>
                    </ul>
                <?php endforeach;?>
            </div>
    </div>

<!-- Footer -->
<?php include ROOT.'/views/layouts/footer.php'; ?>

</body>
</html>