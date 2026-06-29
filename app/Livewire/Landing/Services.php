<?php

namespace App\Livewire\Landing;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Services extends Component
{

    public function render()
    {

        $rating = DB::table('feedback')
        ->rightJoin('booking', 'feedback.id_booking', '=', 'booking.id')
        ->rightJoin('order_services', 'order_services.id_booking', '=', 'booking.id')
        ->rightJoin('services', 'services.id', '=', 'order_services.id_services')
        ->leftjoin('image_services', 'services.id', '=', 'image_services.service_id')
        ->select('services.id', 'services.service_name', 'image_services.imgdir', 'services.service_duration', 'services.price', 'services.type', 'services.details', 'order_services.id_services', DB::raw('ROUND(AVG(rate),1) as rating'))
        ->groupBy('services.id', 'services.service_name', 'image_services.imgdir', 'services.service_duration', 'services.price', 'services.type', 'services.details', 'order_services.id_services')
        ->orderBy('services.id', 'desc')
        ->get();
        return view('livewire.landing.services', compact('rating'));
    }
}
