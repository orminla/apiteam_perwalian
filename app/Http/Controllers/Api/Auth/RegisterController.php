<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\BaseController;
use App\Models\Mahasiswa;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;

class RegisterController extends BaseController
{
    public function register(Request $request): JsonResponse {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create([
            'id' => $request->id,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if ($request->role == 'Mahasiswa') {
            Mahasiswa::create([
                'nim' => $request->id,
                'nama' => $request->nama,
                'kode_prodi' => $request->kode_prodi,
                'semester' => $request->semester,
                'id_kelas' => $request->id_kelas,
                'nip' => $request->nip,
                'no_hp' => $request->no_hp
            ]);
        }
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }
}
