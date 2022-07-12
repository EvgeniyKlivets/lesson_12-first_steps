<?php
namespace APP\Controllers;

/*use APP\Models\Post;
use Core\Controller;*/



class PostControllers extends  Controller

{
    /*protected function index()
    {
    }
    # Get post/ - index
    # Get post/create - create
    # Get post/:id - show
    # Get post/:id/edit-edit
    # Post post/ - store
    # Post post/:id/destroy - delete/destroy(+)*/

    protected function  show (int $id)
    {
        dd(__METHOD__, $id);
    }
}