<?php


class AjaxController
{
    public function actionPost($categoryId)
    {
        $post = Ajax::getPost($categoryId);

        echo $post;

        return true;
    }
}