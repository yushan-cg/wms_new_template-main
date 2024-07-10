<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\backend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UsermanagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
        	
    public function UserList(Request $request)
    {
        $list = DB::table('users')->get();
        return view('backend.user.list_user',compact('list'));
    }


public function UserAdd()
{
$all = DB::table('users')->get();
return view('backend.user.create_User',compact('all'));
}

    

//     public function UserInsert(Request $request)
//     {
// $data = array();
// $data['role'] = $request->role;

// $insert = DB::table('users')->insert($data);
       
// if ($insert) 
// {
   
//                 return Redirect()->route('user.index')->with('success','User created successfully!');
                 
//         }
// else
//         {
//         $notification=array
//         (
//         'message'=>'error ',
//         'alert-type'=>'error'
//         );
//         return Redirect()->route('User.index')->with($notification);
//         }
           
// }

      public function UserEdit ($id)
    {
        $edit=DB::table('users')
             ->where('id',$id)
             ->first();
        return view('backend.user.edit_user', compact('edit'));     
    }

    public function UserUpdate(Request $request, $id)
    {
        $data = array();
        $data['role'] = $request->role;
        $data['name'] = $request->name;
    
        $update = DB::table('users')->where('id', $id)->update($data);
    
        if ($update) {
            return redirect()->route('user.index')->with('success', 'User updated successfully!');
        } else {
            return redirect()->route('user.index')->with('error', 'Something went wrong!');
        }
    }

public function UserDelete ($id)
    {
    
        $delete = DB::table('users')->where('id', $id)->delete();
        if ($delete)
                            {
                                return Redirect()->route('user.index')->with('success','User Deleted successfully!');                  
                            }
             else
                  {
                    return Redirect()->route('user.index')->with('error','Somthing is Wrong!');  
                  }

      }
}
