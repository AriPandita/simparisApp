<?php

namespace App\Livewire\Customer;

use App\Models\Feedback;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Validate;
use PHPUnit\Framework\Constraint\IsEmpty;

class Transaction extends Component
{

    public array $payment_status;

    #[Validate('string|nullable|max:255')] 
    public $feedbacktitle = null;
    #[Validate('string|nullable')] 
    public $feedbackmessage = null;
    #[Validate('required|integer|between:1,5')] 
    public $rating = 0;

    public String $id_booking = '';
    public $review = false;
    public $popup = false;
    public $reschedule = false;
    public $selecteddate = '';
    public $time = '';

    public function feedback()
    {
        $this->validate();
        DB::table('feedback')->updateOrInsert(
        ['id_booking' => $this->id_booking],[
            'rate' => $this->rating,
            'title' => $this->feedbacktitle,
            'message' => $this->feedbackmessage,
        ] );

        $this->reset();
        $this->review = false;
        $this->dispatch('resetFeedback', 0);
    }

    public function cancel() {
        try {
            $booking = DB::table('booking')->where('external_id', $this->id_booking);
            $id = substr($booking->get()->first()->payment_url, 38);

            $xendit = new \App\Http\Controllers\xendit;
            if ($booking->get()->first()->payment_status === 'PENDING') {
                $response = $xendit->expire($id);
                // $response = Http::timeout(10)->get(URL::to('/api/xendit/expire/' . $id));
                if ($response->status() !== 200) {
                    throw new Exception('Failed to cancel booking');
                }
                $return = "Booking has been cancelled, Your refund will be processed soon";
            }
            $booking->update([
                'booking_status' => 'CANCELLED',
                'updated_at' => now(),
            ]);
            $return = "Booking has been cancelled";
        } catch (Exception $e) {
            DB::rollBack();
            $return = $e->getMessage();
        }
        $this->dispatch('success', $return);
        $this->popup = true;
    }

    public function openReschedule() {
        $this->popup = false;
        $this->reschedule = true;
    }
    #[On('date')]
    public function update($date) {
        $this->selecteddate = $date;
        $this->popup = false;
        $this->reschedule = true;
    }

    public function rescheduled() {
        $this->reschedule = false;

        DB::beginTransaction();
        
        DB::table('booking')->where('external_id', $this->id_booking)->update([
            'date' => date('Y-m-d H:i:s', strtotime($this->selecteddate)),
            'booking_status' => 'RESCHEDULED',
            'updated_at' => now(),
        ]);
        DB::commit();
        $this->dispatch('success', 'Your booking has been rescheduled!');
        $this->popup = true;
    }
    
    public function openfeedback($id) 
    {
        $this->id_booking = DB::table('booking')->where('external_id', $id)->get()->first()->id;
        $feedback = Feedback::where('id_booking', $this->id_booking)->get()->first();
        if($feedback) {
            $this->dispatch('resetFeedback', $feedback->rate);
            $this->rating = $feedback->rate;
            $this->feedbacktitle = $feedback->title;
            $this->feedbackmessage = $feedback->message;
        } else {
            $this->reset();
            $this->dispatch('resetFeedback', 0);
        }
        $this->review = true;
    }
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
        ->orderBy('booking.id', 'desc')
        ->get();

        $name = DB::table('order_services')
        ->join('services', 'services.id', '=', 'order_services.id_services')
        ->select(DB::raw('GROUP_CONCAT(services.service_name ORDER BY services.service_name SEPARATOR ", ") as selected_service'))
        ->whereIn('order_services.id_booking', $data->pluck('id'))
        ->groupBy('order_services.id_booking')
        ->orderBy('order_services.id_booking', 'desc')
        ->get();
        
        $image = DB::table('order_services')
        ->join('services', 'services.id', '=', 'order_services.id_services')
        ->join('image_services', 'services.id', '=', 'image_services.service_id')
        ->select('image_services.imgdir', 'order_services.id_booking')
        ->whereIn('order_services.id_booking', $data->pluck('id'))
        ->get();

        return view('livewire.customer.transaction', compact('data', 'image', 'name'));
    }

}
