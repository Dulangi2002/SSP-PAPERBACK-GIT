<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    


    public function index(){
        $customerdata =Customer::get();
        //return $customerdata;
        return view('customerpage', compact('customerdata'));


    }

    public function adminHome(){
       
        $totalProducts = product::count();
        $totalAdmin = User::where('admin','1')->count(); 

        $totalUsers = User::where('admin','0')->count();
        return view('adminhome');
    }


   

    public function Home(){
        return view('home');
    }




    public function createUser(){
        return view('addUser');

    }

    public function saveCustomer(Request $request){
     
        $request ->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:customers',
        ]);


        $firstname =$request->firstname;
        $lastname =$request->lastname;
        $email =$request->email;

        $customer = new Customer();
        $customer->firstname =$firstname;
        $customer->lastname =$lastname; 
        $customer->email =$email;
        $customer->save();

        return redirect()->back()->with('success','Customer added successfully');   



    }




    public function editCustomer($id){
        $customerdata = Customer::where('id','=',$id)->first();
       
        return view('editcustomer',compact('customerdata'));

    }


    public function updateCustomer(Request $request){
        $request ->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
        ]);

        $id=$request->id;
        $firstname =$request->firstname;
        $lastname =$request->lastname;
        $email =$request->email;

        Customer::where('id','=',$id)->update([
            'firstname'=>$firstname,
            'lastname'=>$lastname,
            'email'=>$email
        ]);


        return redirect()->back()->with('success','Customer updated successfully');   


    }


    public function deleteCustomer($id){
        Customer::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Customer deleted successfully'); 
    }
}
