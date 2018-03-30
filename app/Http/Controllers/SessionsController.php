<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function __construct() {
        $this->middleware('guest',['only'=>['create']]);
    }

    /**
     * @name:create 创建用户
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author:Storm <qhj1989@qq.com>
     */
    public function create() {
        return view('sessions.create');
    }

    /**
     * @name:store
     * @param UserStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @author:Storm <qhj1989@qq.com>
     */
    public function store(UserStoreRequest $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success', '欢迎回来！');
            return redirect()->intended(route('users.show', [Auth::user()]));
        } else {
            session()->flash('danger', '很抱歉。您的邮箱和密码不匹配！');
            return redirect()->back();
        }
    }

    public function destroy() {

        Auth::logout();
        session()->flash('success', '您已经成功退出！');
        return redirect()->route('home');
    }
}
