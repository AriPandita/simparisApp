<?php

namespace App\Livewire\Landing;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Recommendation extends Component
{
    public function render()
    {
        $dataPack = DB::table('serviceS')
        ->join('image_services', 'services.id', '=', 'image_services.service_id')
        ->select('services.*', 'image_services.imgdir')
        ->orderBy('id', 'asc')
        ->get();
        return view('livewire.landing.recommendation')->with('dataPack', $dataPack);
    }
}
