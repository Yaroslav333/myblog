<?php



class CategoryController
{
    public function actionIndex($categoryId, $page=1){


        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryList = array();
        $categoryList = Category::getCategoriesList();

        $categoryPosts = array();
        $categoryPosts = Post::getPostByCategory($categoryId, $page);

        //пагинация
        $total = Post::getTotalPostsInCategory($categoryId);
        $pagination = new Pagination($total, $page, 5, 'page-');

        require_once (ROOT . '/views/category/category.php');

        return true;
    }

}