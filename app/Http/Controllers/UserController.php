<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @name:create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author:Storm <qhj1989@qq.com>
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * @name:show
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author:Storm <qhj1989@qq.com>
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * @name:store
     * @param Request $request
     * @author:Storm <qhj1989@qq.com>
     */
    public function store(UserLoginRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        \Auth::login($user);
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show', [$user]);
    }

}
