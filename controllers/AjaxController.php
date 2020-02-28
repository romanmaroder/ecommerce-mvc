<?php


class AjaxController
{
    public function actionIndex($categoryId)
    {
        $ajaxProd = Ajax::getAjaxProducts($categoryId);

        require_once(ROOT . 'views/site/ajax.php');
        return true;
    }
}