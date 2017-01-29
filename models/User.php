<?php


class User
{

    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();
        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }
        return false;
    }


    /**
     * Запоминаем пользователя
     * @param $userId
     * @internal param string $email
     * @internal param string $password
     */
    public static function auth($userId)
    {

        $_SESSION['user'] = $userId;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     * @param $email
     * @return bool
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }


    public static function checkLogged()
    {

        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
      header("Location: /user/login");
    }





    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM users WHERE id = :id';
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            return $result->fetch();
        }
    }


    public static function getManagerList()
    {
        $db = Db::getConnection();

        $managerList = array();
        $result = $db->query('SELECT id, name, login, password, email, role ' . 'FROM users '
            . 'ORDER BY id DESC');

        $i = 0;

        while ($row = $result->fetch()){
            $managerList[$i]['id']=$row['id'];
            $managerList[$i]['name']=$row['name'];
            $managerList[$i]['login']=$row['login'];
            $managerList[$i]['password']=$row['password'];
            $managerList[$i]['email']=$row['email'];
            $managerList[$i]['role']=$row['role'];
            $i++;
        }
        return $managerList;


    }

    public static function createManager($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO users '
            . '(name, login, password, email, role)'
            . 'VALUES '
            . '(:name, :login, :password, :email, :role)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':login', $options['login'], PDO::PARAM_STR);
        $result->bindParam(':password', $options['password'], PDO::PARAM_STR);
        $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
        $result->bindParam(':role', $options['role'], PDO::PARAM_STR);


        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }


    public static function deleteManager($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM users WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();

    }


    public static function updateManager($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        $sql = "UPDATE users
                 SET 
                name = :name, 
                login = :login, 
                password = :password,
                email = :email,
                role = :role      
               WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':login', $options['login'], PDO::PARAM_STR);
        $result->bindParam(':password', $options['password'], PDO::PARAM_STR);
        $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
        $result->bindParam(':role', $options['role'], PDO::PARAM_STR);

        return $result->execute();


    }


}