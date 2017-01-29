<?php include ROOT . '/views/layouts/header_control.php'; ?>

<div class="container" xmlns="http://www.w3.org/1999/html">

    <div class="row">

        <h4>Добавить новую категорию</h4>

        <div class="col-lg-4">
            <div class="login-form">
                <form action="#" method="post" enctype="multipart/form-data">

                    <p>Название категории</p>
                    <input type="text" name="name" placeholder="" value="">

                    <p>sort_order</p>
                    <input type="text" name="sort_order" placeholder="" value="">

                    <p>status</p>
                    <input type="text"  name="status" placeholder="" value="" >



                    <br/><br/>


                    <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                </form>
            </div>
        </div>


    </div>

</div>