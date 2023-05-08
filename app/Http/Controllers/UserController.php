<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\carbon;

class UserController extends Controller
{
    const ADMIN_ID = 1;
    const MANAGER_ID = 2;

    public function view() {
        return view('users');
    }

    /**
     * create user page
     * 
     */
    public function createUsers() {
        $isAdminOrManager = User::leftJoin('user_groups', 'users.id', '=', 'user_groups.user_id')
                                        ->leftJoin('groups', 'user_groups.group_id', '=', 'groups.id')
                                        ->where('users.id', '=', Auth::id())
                                        ->whereIn('user_groups.group_id', [self::ADMIN_ID, self::MANAGER_ID])
                                        ->exists();
        if ($isAdminOrManager) {
            return view('create-user');
        } else {
            redirect()->route('list-users'); 
        }       
    }

    /**
     * store a user
     * 
     */
    public function storeUsers(Request $request ) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'created_by' => Auth::id(),
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()  
        ]);

        return  redirect()->route('list-users'); 
    }

    /**
     * List all users
     * 
     */
    public function listAllUsers() { 
        
        $isAdminOrManager = User::leftJoin('user_groups', 'users.id', '=', 'user_groups.user_id')
                                    ->leftJoin('groups', 'user_groups.group_id', '=', 'groups.id')
                                    ->where('users.id', '=', Auth::id())
                                    ->whereIn('user_groups.group_id', [self::ADMIN_ID, self::MANAGER_ID])
                                    ->exists();
                                    //print_r($isAdminOrManager); die();

        $users = DB::table('users')
            ->select('users.id', 'users.name', 'users.email', 'users.phone', 'users.created_at', DB::raw('GROUP_CONCAT(groups.name SEPARATOR ", ") AS roles'))
            ->leftJoin('user_groups', 'users.id', '=', 'user_groups.user_id')
            ->leftJoin('groups', 'user_groups.group_id', '=', 'groups.id')
            ->groupBy('users.id', 'users.name', 'users.email', 'users.phone', 'users.created_at')
            ->get();
   
        return view('all-users', ['users' => $users, 'isAdminOrManager' => $isAdminOrManager]);
    }

    /**
     * load edit user page.
     * 
     */
    public function editUsers($id) {
        $isAdminOrManager = User::leftJoin('user_groups', 'users.id', '=', 'user_groups.user_id')
                            ->leftJoin('groups', 'user_groups.group_id', '=', 'groups.id')
                            ->where('users.id', '=', Auth::id())
                            ->whereIn('user_groups.group_id', [self::ADMIN_ID, self::MANAGER_ID])
                            ->exists();
        if ($isAdminOrManager) {
            $groups =  DB::table('groups')->get();    
            $user = DB::table('users')
                        ->select('id','name', 'phone', 'email')
                        ->find($id);
            $assignedGroups = DB::table('user_groups')->where('user_id', $id)->get()->toArray();
            $assignedGroups = array_column($assignedGroups, 'group_id');

            return view('edit-user', ['user' => $user, 'groups' => $groups, 'assignedGroups' => $assignedGroups]);
        } else {
            return  redirect()->route('list-users'); 
        }
        
    }

    /**
     * update user data
     * add/remove roles
     */
    public function updateUser(Request $request) {
        $input = $request->all();     
        $input['groups'] = $request->input('groups');

        if (! empty($request->input('groups'))) {
            foreach($input['groups'] as $groupId) {
                DB::table('user_groups')->updateOrInsert(
                    [
                    'user_id' => $input['user_id'],
                    'group_id' => $groupId,           
                    ],
                    ['created_at' => carbon::now(),'updated_at' => carbon::now()]
                );
            }

            DB::table('user_groups')->where('user_id', $input['user_id'])
                                    ->whereNotIn('group_id', $request->input('groups'))
                                    ->delete();
        } else {
            DB::table('user_groups')->where('user_id', $input['user_id'])
                                    ->delete();
        }     

        $user = DB::table('users')->where('id', $input['user_id'])
                                    ->update([
                                        'name' => $input['name'],
                                        'email' => $input['email'],
                                        'phone' => $input['phone'],
                                        'updated_at' => carbon::now()                                     
                                    ]);  

        return  redirect()->route('list-users'); 
    }

    /**
     * delete
     * 
     */
    public function userDelete($id) {
        User::findOrFail($id)->delete();

        return redirect()->route('list-users')->with('success', 'User deleted successfully.');
    }


}
