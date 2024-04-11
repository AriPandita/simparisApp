<?php

namespace App\Livewire\PaymentUser;

use Livewire\Component;
use Livewire\Attributes\On;

class VerifyEmail extends Component
{

    public $complete = false;
    public $verified = false;
    public $user_id;
    public function mount()
    {
        if (auth()->check()) {
            $this->verified = auth()->user()->hasVerifiedEmail();
            $this->user_id = auth()->id();
        }
    }
    public function getListeners()
    {
        return [
            "echo:user.{$this->user_id},UserVerified" => 'handleUserVerified',
        ];
    }

    public function handleUserVerified($id)
    {
        // Lakukan sesuatu dengan $id di sini
        $this->verified = true;
    }

    #[On('complete')]
    public function complete($complete)
    {
        $this->complete = $complete;
    }

    public function render()
    {
        return view('livewire.payment-user.verify-email');
    }
}