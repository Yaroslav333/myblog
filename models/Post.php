<?php


class Post{


    public static function getPostItemById($id){

        $id = intval($id);
        if ($id){

            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM post WHERE id='.$id);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $postItem = $result->fetch();
            return $postItem;
        }
    }




    public static function getPostList($page = 1){

    $page = intval($page);
    $offset = ($page - 1) * 5;

    $db = Db::getConnection();

    $postList = array();
    $result = $db->query('SELECT id, title, date, short_content, preview, content ' . 'FROM post '
        . 'ORDER BY date DESC ' . 'LIMIT 5 ' . 'OFFSET ' . $offset);

    $i = 0;

    while ($row = $result->fetch()){
        $postList[$i]['id']=$row['id'];
        $postList[$i]['title']=$row['title'];
        $postList[$i]['short_content']=$row['short_content'];
        $i++;
    }
    return $postList;

}

    public static function getPostListAdmin(){



        $db = Db::getConnection();

        $postList = array();
        $result = $db->query('SELECT id, title, date ' . 'FROM post '
            . 'ORDER BY id DESC');

            $i = 0;

        while ($row = $result->fetch()){
            $postList[$i]['id']=$row['id'];
            $postList[$i]['title']=$row['title'];
            $postList[$i]['date']=$row['date'];
            $i++;
        }
        return $postList;

    }


    public static function getPostByCategory($categoryId = false, $page = 1){

        if ($categoryId){

            $page = intval($page);
            $offset = ($page - 1) * 5;

            $db = Db::getConnection();
            $posts = array();
            $result = $db->query("SELECT id, title, short_content, preview, content " . "FROM post "
                . "WHERE category_id = '$categoryId' "
                . "ORDER BY id DESC " . "LIMIT 5 " . "OFFSET " . $offset);

                $i = 0;
            while ($row = $result->fetch()){
                $posts[$i]['id']=$row['id'];
                $posts[$i]['title']=$row['title'];
                $posts[$i]['short_content']=$row['short_content'];
                $i++;
            }
            return $posts;
        }
    }



    //находим количество записей для пагинации в категориях
    public static function getTotalPostsInCategory($categoryId)
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT count(id) AS count FROM post '
            . 'WHERE category_id ="'.$categoryId.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];


    }

    //находим количество записей для пагинации на главной
    public static function getTotalPosts()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT count(id) AS count FROM post');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }



    public static function deletePostById($id)
    {

        $db = Db::getConnection();

        $sql = 'DELETE FROM post WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();

    }


    public static function createPost($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO post '
            . '(title, short_content, content, author_name , preview, category_id)'
            . 'VALUES '
            . '(:title, :short_content, :content, :author_name, :preview, :category_id)';



        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':author_name', $options['author_name'], PDO::PARAM_STR);
        $result->bindParam(':preview', $options['preview'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }


    public static function updatePostById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        $sql = "UPDATE post
                 SET 
                title = :title, 
                short_content = :short_content, 
                content = :content, 
                author_name = :author_name, 
                preview = :preview, 
                category_id = :category_id
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':author_name', $options['author_name'], PDO::PARAM_STR);
        $result->bindParam(':preview', $options['preview'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);

        return $result->execute();

    }


    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';
        // Путь к папке с постами
        $path = '/upload/images/posts/';
        // Путь к изображению поста
        $pathToPostImage = $path . $id . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToPostImage)) {
            // Если изображение для поста существует
            // Возвращаем путь изображения поста
            return $pathToPostImage;
        }
        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }
}