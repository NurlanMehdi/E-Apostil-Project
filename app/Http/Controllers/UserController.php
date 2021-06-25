<?php

namespace App\Http\Controllers;

use App\Models\ImzalayanShexs;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function newUserPage()
    {
        $users = User::all();
        $signingUsers = ImzalayanShexs::all()->where('is_deleted','=','0');
        return view('layouts.addNewUser',['users'=>$users,'signingUsers'=>$signingUsers,]);
    }

    public function addNewUserPage($id)
    {
        $userInfo = User::where('id',$id)->first();
        return view('layouts.newUser',['userId'=>$id,'userInfo'=>$userInfo]);
    }

    public function createUser()
    {
        $validator = validator(request()->all(),[
            'name' => 'required|string|max:50',
            'lastname' => 'nullable|string|max:50',
            'fathername' => 'nullable|string|max:50',
            'phoneNumber' => 'nullable|integer',
            'position' => 'nullable|string|max:50',
            'username' => 'required|string|max:50',
            'password' => 'required|string|max:50',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $user = new User();

            $user->name=request()->get('name');
            $user->lastname=request()->get('lastname');
            $user->fathername=request()->get('fathername');
            $user->phoneNumber=request()->get('phoneNumber');
            $user->position=request()->get('position');
            $user->username=request()->get('username');
            $user->password=bcrypt(request()->get('password'));
            $user->save();

            return $this->newUserPage();
        }
    }

    public function editUser($id)
    {
        $validator = validator(request()->all(),[
            'name' => 'required|string|max:50',
            'lastname' => 'nullable|string|max:50',
            'fathername' => 'nullable|string|max:50',
            'phoneNumber' => 'nullable|integer',
            'position' => 'nullable|string|max:50',
            'username' => 'required|string|max:50',
            'password' => 'required|string|max:50',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $user = User::where('id',$id);;

            $user->update([
                'name' => request()->get('name'),
                'lastname' => request()->get('lastname'),
                'fathername' => request()->get('fathername'),
                'phoneNumber' => request()->get('phoneNumber'),
                'position' => request()->get('position'),
                'username' => request()->get('username'),
                'password' => bcrypt(request()->get('password')),
            ]);

            return $this->newUserPage();
        }
    }

    public function removeUser($id)
    {
        $id = json_decode($id, true);

        $user = User::whereIn('id', $id)->delete();

        return response()->json(['data'=>$user]);
    }

}
