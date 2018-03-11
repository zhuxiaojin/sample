<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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
    public function store(UserRequest $request)
    {
        $user = User::create(
            $request->all()
        );

        return redirect()->route('users.show', [$user]);
    }

}
