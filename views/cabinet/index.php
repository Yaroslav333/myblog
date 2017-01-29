<?php include ROOT.'/views/layouts/header.php'; ?>


<section>
        <div class="container">
            <div class="row">
                <h1>Кабинет</h1>
                <h4>Привет <?php echo $user['name']; ?></h4>
                <p><a href="/control" class="button" role="button">Добавить новость</a></p>
                <p><a href="/user/logout" class="button" role="button">Выход</a></p>
            </div>

        </div>



</section>


<?php include ROOT.'/views/layouts/footer.php'; ?>
