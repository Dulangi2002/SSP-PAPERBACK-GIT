<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\customer_details;

class SaveAddress extends Component

{


    public $ContactNumber;
    public $houseNumber;
    public $streetAddress;
    public $city;

    public $customer_details;

    public $showButton = true; 

    public $showUpdateButton = false;

    protected $listeners = ['updateAddress'];




    public function mount()
    {

        $user = auth()->user();
        $customer_details = customer_details::where('user_id', $user->id)->first();
        if($customer_details){
        $this->fetchAddress();
        }
    }
   

    public function saveAddress()
    {
        $customer_details = customer_details::where('user_id', auth()->user()->id)->first();
        if($customer_details) {
            $this->showButton = false;
            $this->showUpdateButton = true;

        } else {

            $user = auth()->user();

            $this->validate([
                'ContactNumber' => 'required',
                'houseNumber' => 'required',
                'streetAddress' => 'required',
                'city' => 'required',
            ]);
    
    
            customer_details::create([
                'user_id' => $user->id,
                'ContactNumber' => $this->ContactNumber,
                'houseNumber' => $this->houseNumber,
                'streetAddress' => $this->streetAddress,
                'city' => $this->city,
            ]);

            $this->reset();
            $this->showButton = false;
            $this->showUpdateButton = true;

            $this->emit('addressSaved');

    
        }

        //$this->emit('addressSaved');
        $this->emit('ContactDetails', 'Address added successfully');


    }


    public function fetchAddress(){

        $customer_details = customer_details::where('user_id', auth()->user()->id)->first();
        if($customer_details) {

            $this->ContactNumber = $customer_details->ContactNumber;
            $this->houseNumber = $customer_details->houseNumber;
            $this->streetAddress = $customer_details->streetAddress;
            $this->city = $customer_details->city;
            $this->showButton = false;
            $this->showUpdateButton = true;
        }
    }


    public function updateAddress()
    {

        $customer_details = customer_details::where('user_id', auth()->user()->id)->first();
        $user = auth()->user();

        $this->validate([
            'ContactNumber' => 'required',
            'houseNumber' => 'required',
            'streetAddress' => 'required',
            'city' => 'required',
        ]);

        $customer_details->update([
            'user_id' => $user->id,
            'ContactNumber' => $this->ContactNumber,
            'houseNumber' => $this->houseNumber,
            'streetAddress' => $this->streetAddress,
            'city' => $this->city,
        ]);

        $customer_details->save();
        $this -> showUpdateButton = true;
        $this->emit('ContactDetails', 'Address updated successfully');
     
    
    }



    
    public function render()
    {
        return view('livewire.save-address');
    }



}
