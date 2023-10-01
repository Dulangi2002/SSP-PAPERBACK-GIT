<?php

namespace App\Http\Livewire;

use App\Models\orders;
use Livewire\Component;

class Revenue extends Component
{


   
    public $thisMonthRevenue ;

    public $previousMonthRevenue;

    public $roundedPercentageDifference;


   
    public function mount()
    {
        $this->thisMonthRevenue = $this->getThisMonthRevenue();
        $this->previousMonthRevenue = $this->getPreviousMonthRevenue();
        $this->roundedPercentageDifference = $this->calculateDifference();


    }



    public function getThisMonthRevenue()
    {
        $thisMonthRevenue = orders::whereMonth('created_at', date('m'))
        ->sum('total_price');

    return $thisMonthRevenue;
    dd($thisMonthRevenue);
    }

    public function getPreviousMonthRevenue()
    {

        $previousMonth = date('Y-m', strtotime('-1 month'));
        $previousMonthRevenue = orders::where('created_at', $previousMonth)->sum('total_price');

      
    }

    public function calculateDifference(){
        $difference = $this->thisMonthRevenue - $this->previousMonthRevenue;
        if( $this->previousMonthRevenue == 0){
            $this -> previousMonthRevenue = 1;
             
        }
        $percentageDifference = ($difference / $this->previousMonthRevenue) * 100  ;
        $roundedPercentageDifference = round($percentageDifference, 2);
        return $roundedPercentageDifference;
    }



    public function render()
    {
        return view('livewire.revenue');
    }
}
