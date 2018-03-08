<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    //
    /**
     * @name:home
     * @return string
     * @author:Storm <qhj1989@qq.com>
     */
    public function home()
    {
        return view('static_pages/home');
    }

    /**
     * @name:about
     * @return string
     * @author:Storm <qhj1989@qq.com>
     */
    public function about()
    {
        return view('static_pages/about');
    }

    /**
     * @name:help
     * @return string
     * @author:Storm <qhj1989@qq.com>
     */
    public function help()
    {
        return view('static_pages/help');
    }


}
