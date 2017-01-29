<?php include ROOT . '/views/layouts/header_control.php'; ?>

<div class="container" xmlns="http://www.w3.org/1999/html">



    <div class="row">

        <h4>Добавить нового менеджера</h4>

        <div class="col-lg-4">
            <div class="login-form">
                <form action="#" method="post" enctype="multipart/form-data">

                    <p>Имя менеджера</p>
                    <input type="text" name="name" placeholder="" value="">

                    <p>Логин</p>
                    <input type="text" name="login" placeholder="" value="">

                    <p>Пароль</p>
                    <input type="text"  name="password" placeholder="" value="" >

                    <p>email</p>
                    <input type="text"  name="email" placeholder="" value="" >

                    <p>Должность</p>
                    <input type="text"  name="role" placeholder="" value="" >


                    <br/><br/>


                    <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                </form>
            </div>
        </div>


    </div>

</div>