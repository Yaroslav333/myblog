<?php



class PostController
{

    public function actionIndex($page = 1)
    {
        $postList = array();
        $postList = Post::getPostList($page);

        $categoryList = array();
        $categoryList = Category::getCategoriesList();

        //пагинация
        $total = Post::getTotalPosts();
        $pagination = new Pagination($total, $page, 5, 'page-');

        require_once (ROOT . '/views/posts/index.php');

        return true;
}


    public function actionView($id)
    {
        $categoryList = array();
        $categoryList = Category::getCategoriesList();

       if($id){
           $postItem = Post::getPostItemById($id);
           require_once (ROOT . '/views/posts/item.php');
       }

        return true;
    }




}