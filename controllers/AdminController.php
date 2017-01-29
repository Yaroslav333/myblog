<?php


class AdminController extends AdminBase
{

    public function actionIndex()
    {


        //проверям права доступа
        self::checkAdmin();



        require_once(ROOT . '/views/admin/index.php');
        return true;
    }




}