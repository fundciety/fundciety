<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth;


class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'phone' => 'required|string|unique:users,phone',

        ]);

        $user = User::create([
            'name' => $fields['name'],
            
            'email' => $fields['email'],
            'phone' => $fields['phone'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->accessToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad credential'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->accessToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        // xagan miyaad kasoo jiidan rabtaa?
        // ma ogi meel aan ka soo jiito ee hlkee ayaan ka soo 
        // maxaad ku fali rabtaa horta ?
        // userka ayaan rabaa dee .... dawataa daatagiisa // jhayee

        // uu iga fogyahay moobilkuye heee?
        // tokenka inaan ku soo jiito weeye 
        // asagaa automatically u garan marka aad Authorization headerka siisid
        return [
            'message' => 'Logged out'
        ];
    }

    public function user()
    {
        return Auth::user();
    }
}


/*
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $validation = Validator::make($request->all(),[
            'name' => 'requierd',
            'email' => 'requierd|email',
            'password' => 'requierd',
            'confirm_password' => 'requierd|same:password',
        ]);
        if($validation->fails()){
            return response()->json($validation->errors(), 202);
        }
        $allData =$request->all();
        $allData['password'] = bcrypt($allData['password'])
        $user =User::create($allData);
        $resArr = [];
        $resArr['token']= $user->createToken('fundciety-toke')->accessToken;
        $resArr['name']= $user->name;
        return response()->json($resArr , 200);

    }
    public function login(Request $request){
        if (Auth::attempt([
            'email'=>$request->email,
            'password' => $request->password
        ])){
            $user = Auth::user();
            $resArr = [];
            $resArr['token']= $user->createToken('fundciety-toke')->accessToken;
            $resArr['name']= $user->name;
            return response()->json($resArr , 200);

        }else{
            return response()->json(['error'=> 'unautherized access' ], 203);
        }
    }
}

*/