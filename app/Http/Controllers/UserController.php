<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index']
        ]);
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function index() {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * @name:create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author:Storm <qhj1989@qq.com>
     */
    public function create() {
        return view('users.create');
    }

    /**
     * @name:show
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author:Storm <qhj1989@qq.com>
     */
    public function show(User $user) {
        return view('users.show', compact('user'));
    }

    /**
     * @name:store
     * @param Request $request
     * @author:Storm <qhj1989@qq.com>
     */
    public function store(UserLoginRequest $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        \Auth::login($user);
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show', [$user]);
    }

    /**
     * @name:edit
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author:Storm <qhj1989@qq.com>
     */
    public function edit(User $user) {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    /**
     * @name:update
     * @param User $user
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @author:Storm <qhj1989@qq.com>
     */
    public function update(User $user, UserUpdateRequest $request) {
        $this->authorize('update', $user);
        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        session()->flash('success', "个人资料更新成功");
        return redirect()->route('users.show', $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }
}
