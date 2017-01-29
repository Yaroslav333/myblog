<?php include ROOT . '/views/layouts/header_control.php'; ?>

<div class="container">

    <div class="row">

        <h4>Редактировать категорию #<?php echo $id; ?></h4>

        <div class="col-lg-4">
            <div class="login-form">
                <form action="#" method="post" enctype="multipart/form-data">

                    <p>Название категории</p>
                    <input type="text" name="name" placeholder="" value="<?php echo $category['name']; ?>">

                    <p>sort_order</p>
                    <input type="text" name="sort_order" placeholder="" value="<?php echo $category['sort_order']; ?>">

                    <p>status</p>

                    <input type="text"  name="status" placeholder="" value="<?php echo $category['status']; ?>" >



                    <br/><br/>



                    <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                </form>
            </div>
        </div>


    </div>

</div>