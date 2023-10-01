<?php

namespace App\Http\Livewire;

use App\Models\orders;
use App\Models\TheCart;
use App\Models\User;
use Livewire\Component;

class DeleteUser extends Component
{


     public $user;
     public $carts;
    public $orders;

    public  $userId;





    public function mount(){
        $userId = $this -> user ->id;
        $this ->carts = TheCart::where('user_id', $userId)->get();
        $this ->orders = orders::where('user_id', $userId)->get();
        
    }

    public function deleteUserNew($userId)
    {
        $userId = $this -> user ->id;
        $this -> deleteCart($userId);
        $this -> deleteOrder($userId);
        $this -> deleteAddress($userId);
        $this -> deleteProfile($userId);
        $this -> delete($userId);
        session()->flash('message', 'User Deleted Successfully.');


    }

    public function deleteCart($userId)
    {

        $userId = $this -> user ->id;
        $carts = TheCart::where('user_id', $userId)->get();
        $carts ->each->delete();
        session()->flash('message', 'Cart Deleted Successfully.');
    }

    public function deleteOrder($userId)
    {
        $userId = $this -> user ->id;
        $orders = orders::where('user_id', $userId)->get();
        $orders ->each->delete();
        session()->flash('message', 'Order Deleted Successfully.');
    }
    public function render()
    {
        return view('livewire.delete-user');
    }
}
