<?php

namespace App\Controllers\Admin;

use App\Helpers\SessionHelper;
use Core\Controller;

class BaseController extends Controller
{
    public function before (string $action):bool
    {
    if (!SessionHelper:: isUserLoggedIn()){
        redirect('login');
    }
    return true;
}
}
