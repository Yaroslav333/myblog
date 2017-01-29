<?php



    //совершаем CRUD операции с постами
class ControlController
{


    public function actionIndex()
    {

        $userId = User::checkLogged();


            $postList = array();
            $postList = Post::getPostListAdmin();



        require_once (ROOT . '/views/control_post/index.php');
        return true;
    }




    public function actionCreate()
    {
        $userId = User::checkLogged();

        $categoryList = Category::getCategoriesList();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['title'] = $_POST['title'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];
            $options['author_name'] = $_POST['author_name'];
            $options['preview'] = $_POST['preview'];
            $options['category_id'] = $_POST['category_id'];

            // Флаг ошибок в форме
            $errors = false;
            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }

                $id = Post::createPost($options);

            // Если запись добавлена
            if ($id) {
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/posts/{$id}.jpg");
                }
            };


            // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /control");

        }
        require_once (ROOT . '/views/control_post/create.php');
        return true;


    }


    public function actionUpdate($id)
    {
        $userId = User::checkLogged();

        $categoryList = Category::getCategoriesList();

        $post = Post::getPostItemById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['title'] = $_POST['title'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];
            $options['author_name'] = $_POST['author_name'];
            $options['preview'] = $_POST['preview'];
            $options['category_id'] = $_POST['category_id'];

            // Сохраняем изменения
            if (Post::updatePostById($id, $options)) {
                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                }
            }


            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /control");

        }

        require_once (ROOT . '/views/control_post/update.php');
        return true;
    }


    public function actionDelete($id)
    {

        $userId = User::checkLogged();

        if(isset($_POST['submit'])) {

            Post::deletePostById($id);


            header("Location: /control/");
        }

        require_once (ROOT . '/views/control_post/delete.php');
        return true;

    }


}