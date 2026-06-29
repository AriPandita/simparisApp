<?php

namespace App\Livewire\Landing;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Testimonial extends Component
{
    public function render()
    {
        $data = DB::table('booking')
        ->join('feedback', 'feedback.id_booking', '=', 'booking.id')
        ->join('customer', 'customer.id', '=', 'booking.id_customer')
        ->join('users', 'users.id', '=', 'customer.id_users')
        ->join('rooms', 'rooms.id', '=', 'booking.id_room')
        ->join('order_services', 'order_services.id_booking', '=', 'booking.id')
        ->join('services', 'services.id', '=', 'order_services.id_services')
        ->select('feedback.id', 'feedback.updated_at', 'customer.imgdir', 'feedback.rate', 'feedback.message', 'feedback.title', 'users.name', 'rooms.room_name', 'booking.id', DB::raw('GROUP_CONCAT(services.service_name ORDER BY services.service_name SEPARATOR ", ") as selected_services'))
        ->groupBy('feedback.id', 'feedback.updated_at', 'customer.imgdir', 'feedback.rate', 'feedback.message', 'feedback.title', 'users.name', 'rooms.room_name', 'booking.id')
        ->orderBy('feedback.id', 'desc')
        ->get();
        
        return view('livewire.landing.testimonial', compact('data'));
    }
}
