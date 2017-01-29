<?php


class AdminCategoryController extends AdminBase
{
        public function actionIndex()
        {

            self::checkAdmin();

            $categoryList = array();
            $categoryList = Category::getCategoriesListAdmin();

            require_once (ROOT . '/views/control_category/index.php');
            return true;

        }


        public function actionCreate(){



            $categoryList = Category::getCategoriesListAdmin();
            // Обработка формы
            if (isset($_POST['submit'])) {
                // Если форма отправлена
                // Получаем данные из формы
                $options['name'] = $_POST['name'];
                $options['sort_order'] = $_POST['sort_order'];
                $options['status'] = $_POST['status'];

                // Флаг ошибок в форме
                $errors = false;
                // При необходимости можно валидировать значения нужным образом
                if (!isset($options['name']) || empty($options['name'])) {
                    $errors[] = 'Заполните поля';
                }

                $id = Category::createCategory($options);


                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admincategory");



            }

            require_once (ROOT . '/views/control_category/create.php');
            return true;

        }


        public function actionUpdate($id){

            self::checkAdmin();
          //$categoryList = Category::getCategoriesList();

            $category = Category::getCategoryById($id);

            // Обработка формы
            if (isset($_POST['submit'])) {
                // Если форма отправлена
                // Получаем данные из формы
                $options['name'] = $_POST['name'];
                $options['sort_order'] = $_POST['sort_order'];
                $options['status'] = $_POST['status'];


                // Сохраняем изменения
                if (Category::updateCategory($id, $options)) {
                    // Если запись сохранена
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    }
                }


                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admincategory");

            }

            require_once (ROOT . '/views/control_category/update.php');
            return true;
        }


        public function actionDelete($id){

            self::checkAdmin();


            if(isset($_POST['submit'])) {

                Category::deleteCategoryById($id);


                header("Location: /admincategory/");
            }

            require_once (ROOT . '/views/control_category/delete.php');
            return true;

        }
}

