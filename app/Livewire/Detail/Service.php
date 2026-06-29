<?php

namespace App\Livewire\Detail;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Service extends Component
{
    public $params;
    public $id;
    public function mount($id)
    {
        $this->params = DB::table('services')
        ->join('image_services', 'services.id', '=', 'image_services.service_id')
        ->select('services.service_name', 'image_services.imgdir', 'services.details', 'services.price')
        ->where('services.id', $id)
        ->get()
        ->first();
        $this->id = $id;
    }
    
    public function render()
    {
        $collection = DB::table('order_services')
        ->join('booking', 'booking.id', '=', 'order_services.id_booking')
        ->join('feedback', 'feedback.id_booking', '=', 'booking.id')
        ->join('rooms', 'rooms.id', '=', 'booking.id_room')
        ->join('customer', 'customer.id', '=', 'booking.id_customer')
        ->join('users', 'users.id', '=', 'customer.id_users')
        ->select('users.name', 'customer.imgdir', 'feedback.updated_at', 'rooms.room_name', 'feedback.rate', 'feedback.message', 'order_services.id_services', 'order_services.id_booking', 'feedback.title')
        ->where('order_services.id_services', $this->id)
        ->get();
        $name = DB::table('order_services')
        ->join('services', 'services.id', '=', 'order_services.id_services')
        ->select(DB::raw('GROUP_CONCAT(services.service_name ORDER BY 
        CASE 
            WHEN services.id = '.$this->id.' THEN 0 
            ELSE 1 
        END, 
        services.service_name 
        SEPARATOR ", ") as selected_services'))
        ->whereIn('order_services.id_booking', $collection->pluck('id_booking'))
        ->groupBy('order_services.id_booking')
        ->get();

        $service = DB::table('services')
        ->join('image_services', 'services.id', '=', 'image_services.service_id')
        ->select('services.*', 'image_services.imgdir')
        ->whereNotIn('services.id', [$this->id])
        ->orderBy('id', 'desc')
        ->get();

        return view('livewire.detail.service', compact('name', 'service', 'collection'));
    }
}
