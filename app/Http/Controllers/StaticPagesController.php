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
    public function home() {
        $feed_items = [];
        if (\Auth::check()) {
            $feed_items = \Auth::user()->feed()->paginate(30);
        }
        return view('static_pages/home', compact('feed_items'));
    }

    /**
     * @name:about
     * @return string
     * @author:Storm <qhj1989@qq.com>
     */
    public function about() {
        return view('static_pages/about');
    }

    /**
     * @name:help
     * @return string
     * @author:Storm <qhj1989@qq.com>
     */
    public function help() {
        return view('static_pages/help');
    }


}
