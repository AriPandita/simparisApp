<?php

namespace App\Livewire\PaymentUser;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    #[On('echo:user-verified,UserVerified')]
    public function handleUserVerified($id)
    {
        // check if $id is the same as the authenticated user
        if ($id == auth()->id()) {
        }
    }

    #[On('refreshNavbar')]
    public function refreshNavbar()
    {
    }

    #[On('setUserId')]
    public function setUserId($id)
    {
    }

    public function render()
    {
        $user = DB::table('users')
        ->join('customer', 'customer.id_users', '=', 'users.id')
        ->where('users.id', Auth::user()->getAuthIdentifier())
        ->get()
        ->value('imgdir');
        return view('livewire.payment-user.navbar')->with('user', $user);
    }
}
