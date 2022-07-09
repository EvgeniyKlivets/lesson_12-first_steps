<?php
$router->add('', ['controller' => \App\Controllers\HomeController::class, 'action' => 'index', 'method' => 'GET']);
$router->add('login', ['controller' => \App\Controllers\AuthController::class, 'action' => 'login', 'method' => 'GET']);
$router->add('login', ['controller' => \App\Controllers\AuthController::class, 'action' => 'login', 'method' => 'GET']);
$router->add('logout', ['controller' => \App\Controllers\AuthController::class, 'action' => 'logout', 'method' => 'GET']);
$router->add('registration', ['controller' => \App\Controllers\AuthController::class, 'action' => 'register', 'method' => 'GET']);
$router->add('registration', ['controller' => \App\Controllers\AuthController::class, 'action' => 'register', 'method' => 'GET']);
$router->add('auth/verify', ['controller' => \App\Controllers\AuthController::class, 'action' => 'verify', 'method' => 'POST']);
$router->add('auth/verify', ['controller' => \App\Controllers\AuthController::class, 'action' => 'verify', 'method' => 'POST']);
$router->add('auth/users/store', ['controller' => \App\Controllers\AuthController::class, 'action' => 'store', 'method' => 'POST']);
$router->add('users/store', ['controller' => \App\Controllers\UsersController::class, 'action' => 'store', 'method' => 'POST']);

/**
 * CREATE READ UPDATE DELETE (CRUD)
Verb	    URI	                        Action
--------------------------------------------------------------------------------
GET	        /posts	                    index   => all records
GET	        /posts/create	            create  => form for creating new post
POST	    /posts/store                store	=> save after create
GET	        /posts/{id:\d+}	            show	=> display specific record
GET 	    /posts/{id:\d+}/edit	    edit	=> form for updating
POST	    /posts/{id:\d+}/update      update	=> save after update
POST	    /posts/{id:\d+}/destroy	    destroy	=> remove record
 */
$router->add('admin/dashboard', ['controller' => \App\Controllers\Admin\DashboardController::class, 'action' => 'index', 'method' => 'GET']);
$router->add('admin/posts', ['controller' => \App\Controllers\Admin\PostsController::class, 'action' => 'index', 'method' => 'GET']);
$router->add('admin/posts/create', ['controller' => \App\Controllers\Admin\PostsController::class, 'action' => 'create', 'method' => 'GET']);
$router->add('admin/posts/store', ['controller' => \App\Controllers\Admin\PostsController::class, 'action' => 'store', 'method' => 'POST']);
$router->add('admin/posts/{id:\d+}', ['controller' => \App\Controllers\Admin\PostsController::class, 'action' => 'show', 'method' => 'GET']);
$router->add('admin/posts/{id:\d+}/edit', ['controller' => \App\Controllers\Admin\PostsController::class, 'action' => 'edit', 'method' => 'GET']);
$router->add('admin/posts/{id:\d+}/update', ['controller' => \App\Controllers\Admin\PostsController::class, 'action' => 'update', 'method' => 'POST']);
$router->add('admin/posts/{id:\d+}/destroy', ['controller' => \App\Controllers\Admin\PostsController::class, 'action' => 'destroy', 'method' => 'POST']);

$router->add('admin/categories', ['controller' => \App\Controllers\Admin\CategoriesController::class, 'action' => 'index', 'method' => 'GET']);
$router->add('admin/categories/create', ['controller' => \App\Controllers\Admin\CategoriesController::class, 'action' => 'create', 'method' => 'GET']);
$router->add('admin/categories/store', ['controller' => \App\Controllers\Admin\CategoriesController::class, 'action' => 'store', 'method' => 'POST']);
$router->add('admin/categories/{id:\d+}', ['controller' => \App\Controllers\Admin\CategoriesController::class, 'action' => 'show', 'method' => 'GET']);
$router->add('admin/categories/{id:\d+}/edit', ['controller' => \App\Controllers\Admin\CategoriesController::class, 'action' => 'edit', 'method' => 'GET']);
$router->add('admin/categories/{id:\d+}/update', ['controller' => \App\Controllers\Admin\CategoriesController::class, 'action' => 'update', 'method' => 'POST']);
$router->add('admin/categories/{id:\d+}/destroy', ['controller' => \App\Controllers\Admin\CategoriesController::class, 'action' => 'destroy', 'method' => 'POST']);
