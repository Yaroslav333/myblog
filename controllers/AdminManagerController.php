<?php


class AdminManagerController extends AdminBase
{

    public function actionIndex()
    {

        self::checkAdmin();

        $managerList = array();
        $managerList = User::getManagerList();


        require_once (ROOT . '/views/control_manager/index.php');
        return true;

    }


    public function actionCreate()
    {
        self::checkAdmin();



        $managerList = User::getManagerList();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name'] = $_POST['name'];
            $options['login'] = $_POST['login'];
            $options['password'] = $_POST['password'];
            $options['email'] = $_POST['email'];
            $options['role'] = $_POST['role'];

            // Флаг ошибок в форме
            $errors = false;

            $email = $_POST['email'];
            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false){
                 User::createManager($options);
            }



            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /adminmanager");



        }

        require_once (ROOT . '/views/control_manager/create.php');
        return true;


    }


    public function actionUpdate($id)
    {
        self::checkAdmin();
        //$categoryList = Category::getCategoriesList();

        $user = User::getUserById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name'] = $_POST['name'];
            $options['login'] = $_POST['login'];
            $options['password'] = $_POST['password'];
            $options['email'] = $_POST['email'];
            $options['role'] = $_POST['role'];


            // Сохраняем изменения
           User::updateManager($id, $options);



            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /adminmanager");

        }

        require_once (ROOT . '/views/control_manager/update.php');
        return true;


    }


    public function actionDelete($id)
    {
        self::checkAdmin();

        if(isset($_POST['submit'])) {

            User::deleteManager($id);


            header("Location: /adminmanager/");
        }


        require_once (ROOT . '/views/control_manager/delete.php');
        return true;

    }



}