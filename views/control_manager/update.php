<?php include ROOT . '/views/layouts/header_control.php'; ?>

<div class="container">

    <div class="row">

        <h4>Редактировать категорию #<?php echo $id; ?></h4>

        <div class="col-lg-4">
            <div class="login-form">
                <form action="#" method="post" enctype="multipart/form-data">

                    <p>Имя менеджера</p>
                    <input type="text" name="name" placeholder="" value="<?php echo $user['name']; ?>">

                    <p>Логин</p>
                    <input type="text" name="login" placeholder="" value="<?php echo $user['login']; ?>">

                    <p>Пароль</p>

                    <input type="text"  name="password" placeholder="" value="<?php echo $user['password']; ?>" >

                    <p>email</p>

                    <input type="text"  name="email" placeholder="" value="<?php echo $user['email']; ?>" >

                    <p>Должность</p>

                    <input type="text"  name="role" placeholder="" value="<?php echo $user['role']; ?>" >


                    <br/><br/>



                    <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                </form>
            </div>
        </div>


    </div>

</div>