<?php

class Category
{

    public static function getCategoriesList(){

        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query('SELECT id, name FROM category WHERE status = 1 ORDER BY sort_order ASC');


        $i = 0;

        while ($row = $result->fetch()){
            $categoryList[$i]['id']=$row['id'];
            $categoryList[$i]['name']=$row['name'];
            $i++;
        }

        return $categoryList;
    }



    public static function deleteCategoryById($id)
    {

        $db = Db::getConnection();

        $sql = 'DELETE FROM category WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();

    }


    public static function createCategory($options){

        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO category '
            . '(name, sort_order, status)'
            . 'VALUES '
            . '(:name, :sort_order, :status)';


        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);


        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;

    }


    public static function updateCategory($id, $options)
    {

        // Соединение с БД
        $db = Db::getConnection();

        $sql = "UPDATE category
                 SET 
                name = :name, 
                sort_order = :sort_order, 
                status = :status 
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        return $result->execute();
    }


    public static function getCategoryById($id){

        $id = intval($id);
        if ($id){

            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM category WHERE id='.$id);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $category = $result->fetch();
            return $category;
        }
    }


    public static function getCategoriesListAdmin(){

        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query('SELECT id, name, status FROM category ORDER BY sort_order ASC');


        $i = 0;

        while ($row = $result->fetch()){
            $categoryList[$i]['id']=$row['id'];
            $categoryList[$i]['name']=$row['name'];
            $categoryList[$i]['status']=$row['status'];
            $i++;
        }

        return $categoryList;
    }
}