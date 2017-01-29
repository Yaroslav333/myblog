<?php


class UserController
{

    public function actionLogin()
    {

        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            // Валидация полей
            if (User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);

                $user = User::getUserById($userId);
                // Перенаправляем пользователя в закрытую часть - кабинет
                if ($user['role'] == 'admin')
                {
                    header("Location: /admin/");
                }else
                    {
                    header("Location: /cabinet/");
                }

            }
        }
        require_once(ROOT . '/views/user/login.php');
        return true;
    }


    public function actionLogout()
    {

        unset($_SESSION["user"]);
        header("Location: /");
    }


}