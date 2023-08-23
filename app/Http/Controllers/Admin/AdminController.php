<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord']=User::getAdmin();
        $data['header_title']='Admin List';
        return view('admin.admin.list',$data);
    }

    public function add()
    {
        $data['header_title']='Admin Add';
        return view('admin.admin.add',$data);
    }

    public function store(Request $request)
    {

        request()->validate([
        'email'=>'required|email|unique:users',
        'password'=>'required|min:6|max:10',
        'name'=>'required'
        ]);
        $admin= new User();
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=Hash::make($request->password);
        $admin->user_type=1;
        $admin->save();
        return back();
    }

    public function edit($id)
    {
        $data['getRecord']=User::getSingle($id);
        if (!empty($data['getRecord']))
        {
          $data['header_title']='Admin Edit';
        return view('admin.admin.edit',$data);
        }
      else
      {
       abort(404);
      }
    }

    public function update(Request $request,$id)
    {
        request()->validate([

            'email' => 'required|email|unique:users,email,'.$id

            ]);

        $user=User::getSingle($id);
        $user->name=$request->name;
        $user->email=$request->email;
        if (!empty($request->password))
        {
            $user->password=Hash::make($request->password);
        }
        $user->save();
        return redirect('admin/admin/list');
    }

    public function delete($id)
    {
        $user=User::getSingle($id);
        $user->is_delete=1;
        $user->save();
        return redirect('admin/admin/list');
    }
}
