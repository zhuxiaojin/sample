<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @name:create
     * @author:Storm <qhj1989@qq.com>
     */
    public function create()
    {
        return view('users.create');
    }
}
