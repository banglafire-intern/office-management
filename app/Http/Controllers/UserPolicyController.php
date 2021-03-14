<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserPolicyController extends Controller
{
    public function getAllUserPolicies() {
        $allUserPolicies = DB::table('users')
            ->join('policies', 'users.policy_id', '=', 'policies.policy_id')
            ->where('users.policy_id', '<>', 'null')
            ->select('id as user_id', 'users.name as username', 'policies.name as policy_name', 'policies.policy_id')
            ->get();
        // var_dump($allUserPolicies);
        return response()
            ->json($allUserPolicies)
            ->header('Content-Type', 'application/json');
        
    }
    public function updateOneUserPolicy(Request $request, $user_id = null) {
        if($user_id == null) {
            return response('please pass user_id as parameter', 401);
        }
        $user = User::find($user_id);
        if($user) {
            $data = $request->validate([
                'policy_id' => 'required'
            ]);
            $user->policy_id = $data['policy_id'];
            $user->save();
            return $user;
        } else {
            return response("user id not found", 404);
        }
        
    }
}
