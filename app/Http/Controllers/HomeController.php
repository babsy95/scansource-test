<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    const ADMIN_ID = '1';
    const MANAGER_ID = '2';

    public function viewDashboard() {
        $isAdminOrManager = User::leftJoin('user_groups', 'users.id', '=', 'user_groups.user_id')
                                    ->leftJoin('groups', 'user_groups.group_id', '=', 'groups.id')
                                    ->where('users.id', '=', Auth::id())
                                    ->whereIn('user_groups.group_id', [self::ADMIN_ID, self::MANAGER_ID])
                                    ->exists();
                            
        return view('dashboard', ['isAdminOrManager' => $isAdminOrManager]);
    }
}
