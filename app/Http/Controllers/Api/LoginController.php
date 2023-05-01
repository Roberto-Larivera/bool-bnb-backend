<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Exception;

class LoginController extends Controller
{
    public function login()
    {
        if(request()->input('user_id'))
        $userd_id= request()->input('user_id');

        try {
            $userData = User::where('id', $userd_id)->with('user_data')->firstOrFail();
            
            $user= [];
            $user['email']= $userData['email'];
            $user['name']= $userData['user_data']['name'];
            $user['surname']= $userData['user_data']['surname'];

            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'OK',
                'user' => $user
            ];
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response);
    }
}
