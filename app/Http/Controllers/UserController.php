<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SaveUserByAdmin;
use App\Models\Category;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){

        $totalproducts = product::count();
        $totaladmins = User::where('admin','1')->count();
        $totalregisteredusers = User::where('admin','0')->count();
          
        $role = Auth::user()->admin;  
        if($role == '1'){
            
            return view('adminhome',compact('totalproducts','totaladmins','totalregisteredusers'));
            
        }else if($role == '0'){
     
            $data = Product::all();
            return view('home'); 
        }else{
            return redirect('test');   
        }


    }


    public function test(){
        return view('login');
    }
    
    public function middleHome(){
        return view('home');
    }

    public function backpage(){
        return redirect ('index');
    }


  




    public function adminList(){
        $data = User::where('admin','1')->get();
        return view('users.adminlist', compact('data'));    
     
    }


    public function createAdmin(){
        return view('users.createadmin');
    }


    public function editAdmin($id){
        $data = User::where('id','=',$id)->first();
        return view('users.editadmin',compact('data'));

    }   


    public function updateAdmin(Request $request){
        $request ->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $input = $request->all();
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');    
        $data = User::where('id','=',$id)->first();
        $data->name = $name;
        $data->email = $email;
  
  
        $data->save();
        return redirect('admin-list')->with('success','Admin Updated Successfully');
    }


    public function register(){
        return view('auth.register');
    }
    
    public function RegisterUser(RegisterRequest $request){ 
        $validated = $request->validated();
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->admin = '0';
        $user->save();
        
        Auth::login($user); 

        return redirect('Homepage')->with('success','User Registered Successfully');

        
    }
    



    public function list(){
       // $data = User::all();
       $data = User::where('admin','0')->get();

        return view('userslist', compact('data')); 
    }   

    public function deleteUser($id){
       
        User::where('id','=',$id)->delete();
        return redirect('user-list')->with('success','User Deleted Successfully');
    }

    public function deleteAdmin($id){
       
        User::where('id','=',$id)->delete();
        return redirect('admin-list')->with('success','Admin Deleted Successfully');
    }




    public function AddUser(){
        return view('createuser');
    }


    public function SaveUser(SaveUserByAdmin $request): RedirectResponse{

        $validated = $request->validated();
        $user = new User();
        $validated['name'] = $request->name;
        $validated['admin'] = '0';
        $validated['email'] = $request->email;
        $validated['password'] = bcrypt($request->password);
        $user->fill($validated);
        $user->save();
        
        
        return redirect('user-list')->with('success','User Added Successfully');
    }



    public function EditUser($id){
        $data = User::where('id','=',$id)->first();
        return view('edituser',compact('data'));


    }

    public function UpdateUser(Request $request){
        $request ->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $input = $request->all();
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');    
        $data = User::where('id','=',$id)->first();
        $data->name = $name;
        $data->email = $email;
  
  
        $data->save();
        return redirect('user-list')->with('success','User Updated Successfully');
    }   


    public function viewCategory(){
        $categories = Category::all();
        return view('categories.show', compact('categories'));
    }

}
