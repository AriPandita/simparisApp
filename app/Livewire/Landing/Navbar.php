<?php

namespace App\Livewire\Landing;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        if (!Auth::user()) {
            return view('livewire.landing.navbar');
        } else{
            $user = DB::table('users')
            ->join('customer', 'customer.id_users', '=', 'users.id')
            ->where('users.id', Auth::user()->getAuthIdentifier())
            ->get()
            ->value('imgdir');
            return view('livewire.landing.navbar')->with('user', $user);
        }
    }
}
