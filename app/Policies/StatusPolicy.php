<?php

namespace App\Policies;

use App\Models\Status;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * @name:destroy 只允许管理员或者作者本人删除微博
     * @author:Storm <qhj1989@qq.com>
     */
    public function destroy(User $user, Status $status) {
        return  $user->id === $status->user_id;
    }
}
