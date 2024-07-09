<?php

namespace App\Livewire\Customer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Transaction extends Component
{
    public function render()
    {
        $id = DB::table('customer')
        ->where('id_users', Auth::user()->getAuthIdentifier())
        ->get()
        ->first()->id;

        $data = DB::table('booking')
        ->join('rooms', 'rooms.id', '=', 'booking.id_room')
        ->select('booking.*', 'rooms.room_name')
        ->where('id_customer', $id)
        ->get();
        
        $collection = DB::table('order_services')
        ->join('services', 'services.id', '=', 'order_services.id_services')
        ->join('image_services', 'image_services.service_id', '=', 'services.id')
        ->whereIn('order_services.id_booking', $data->pluck('id'))
        ->get();

        return view('livewire.customer.transaction', compact('data', 'collection'));
    }
}