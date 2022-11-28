<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Laravel\Fortify\Rules\Password;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// class UserController extends Controller
// {
//     public function register(Request $r)
//     {
//         try {
//             $r->validate([
//                 'name' => ['required', 'string', 'max:255'],
//                 'username' => ['required', 'string', 'max:255', 'unique:users'],
//                 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//                 'nomor' => ['nullable', 'string', 'max:255'],
//                 'alamat' => ['required', 'string', 'max:255'],
//                 'password' => ['required', 'string', new Password],
//             ]);
//             User::create([
//                 'name' => $r->name,
//                 'username' => $r->username,
//                 'email' => $r->email,
//                 'nomor' => $r->nomor,
//                 'alamat' => $r->alamat,
//                 'password' => Hash::make($r->password),
//             ]);

//             $user = User::where('email', $r->email)->first();

//             $hasiltoken = $user->createToken('authToken')->plainTextToken;

//             return ResponseFormatter::success([
//                 'access_token' => $hasiltoken,
//                 'token_type' => 'Bearer',
//                 'user' => $user
//             ], 'Berhasil Registrasi');
//         } catch(Exception $error){
//             return ResponseFormatter::error([
//                 'message' => 'Terjadi Kesalahan',
//                 'error' => $error
//             ], 'Autentikasi Gagal', 500);
//         }
//     }
//     public function login(Request $r)
//     {
//         try {
//             $r->validate([
//                 'email' => 'email|required',
//                 'password' => 'required',
//             ]);

//             $credentials = request(['email', 'password']);
//             if(!Auth::attempt($credentials)){
//                 return ResponseFormatter::error([
//                     'message' => 'Email atau Password Salah'
//                 ], 'Autentikasi Gagal', 500);
//             }

//             $user = User::where('email', $r->email)->first();
//             if(! Hash::check($r->password, $user->password, [])){
//                 throw new \Exception('Password Invalid');
//             }

//             $hasiltoken = $user->createToken('authToken')->plainTextToken;
//             return ResponseFormatter::success([
//                 'access_token' => $hasiltoken,
//                 'token_type' => 'Bearer',
//                 'user' => $user
//             ], 'Terautentikasi');
//         } catch (Exception $error) {
//             return ResponseFormatter::error([
//                 'message' => 'Terjadi Kesalahan',
//                 'error' => $error
//             ], 'Autentikasi Gagal', 500);
//         }
//     }
//     public function fetch(Request $r)
//     {
//         return ResponseFormatter::success($r->user(), 'Berhasil Mendapatkan Data User');
//     }

//     public function updateProfile(Request $r)
//     {
//         $data = $r->all();

//         $user = Auth::user();
//         $user->update($data);

//         return ResponseFormatter::success($user, 'Berhasil Mengupdate Data User');
//     }

//     public function logout(Request $r)
//     {
//         $token = $r->user()->currentAccessToken()->delete();

//         return ResponseFormatter::success($token, 'Token Telah Dicabut');
//     }
// }
class UserController extends Controller
{

    
    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->user(),'Data Profil User Berhasil Diambil');
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ],'Authentication Failed', 500);
            }

            $user = User::where('email', $request->email)->first();
            if ( ! Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ],'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ],'Authentication Failed', 500);
        }
    }

    
    public function register(Request $r)
    {
        try {
            $r->validate([
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'nomor' => ['nullable', 'string', 'max:255'],
                'alamat' => ['nullable', 'string', 'max:255'],
                'password' => ['required', 'string', new Password],
            ]);
            User::create([
                'name' => $r->name,
                'username' => $r->username,
                'email' => $r->email,
                'nomor' => $r->nomor,
                'alamat' => $r->alamat,
                'password' => Hash::make($r->password),
            ]);

            $user = User::where('email', $r->email)->first();

            $hasiltoken = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $hasiltoken,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Berhasil Registrasi');
        } catch(Exception $error){
            return ResponseFormatter::error([
                'message' => 'Terjadi Kesalahan',
                'error' => $error
            ], 'Autentikasi Gagal', 500);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token,'Token Revoked');
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();

        $user = Auth::user();
        
        $user->update($data);
        $user->password = Hash::make($request->password);
        $user->save();
        return ResponseFormatter::success($user,'Profile Updated');
    }
}