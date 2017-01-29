<?php include ROOT.'/views/layouts/header.php'; ?>


<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-8">DIV1
        <div class="thumbnail">
                <img src="<?php echo Post::getImage($postItem['id']); ?>" alt="" />
                <div class="caption">
                    <h3><?php echo $postItem['title'];?></h3>
                    <p><?php echo $postItem['content'];?></p>
                    <p><a href="/" class="button" role="button">Назад</a></p>
                </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4">DIV2
        <h1>Рубрики</h1>
        <?php foreach ($categoryList as $categoryItem):?>
            <ul>
                <h2><a href="/category/<?php echo $categoryItem['id'];?>"> <?php echo $categoryItem['name'];?></a></h2>
            </ul>
        <?php endforeach;?>
    </div>
</div>

<!-- Footer -->
<?php include ROOT.'/views/layouts/footer.php'; ?>

</body>
</html>