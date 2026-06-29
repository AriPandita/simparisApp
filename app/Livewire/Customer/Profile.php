<?php

namespace App\Livewire\Customer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    public $email;
    public $name;
    public $phone;
    public $address;
    public $country;
    public $image;
    public $imgdir;
    public $popup = false;
    public $password;
    
    public function mount()
    {
        $user = DB::table('users')
        ->join('customer', 'customer.id_users', '=', 'users.id')
        ->where('users.id', Auth::user()->getAuthIdentifier())
        ->get()
        ->first();
        
        $this->email = $user->email;
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->country = $user->country;
        $this->imgdir = $user->imgdir;
        $this->password = $user->password;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:6,15',
            'address' => 'required|string|max:50',
            'country' => 'required|string|max:50',
            'image' => 'image|nullable|max:5120',
        ];
    }

    public function save() {
        $this->validate();
        $customer = DB::table('customer')
        ->where('id_users', Auth::user()->getAuthIdentifier());
        $customer->update([
            'phone' => $this->phone,
            'address' => $this->address,
            'country' => $this->country,
        ]);

        DB::table('users')
        ->where('id', $customer->value('id_users'))
        ->update([
            'name' => $this->name,
        ]);
        if($this->image != null) {
            $filename = 'profilepic' . date('_Ymd_His'). '.webp' ;
            $old = $customer->value('imgdir');
    
            $manager = new ImageManager(Driver::class);
            $img = $manager->read($this->image);
            $img->coverDown(200, 200);
            $encode = $img->toWebp(100);
            $encode->save(storage_path('app/public/img/profilepic/'. $filename));
            Storage::delete('/public/img/profilepic/'. $old);
            $customer->update([
                'imgdir' => $filename,
            ]);
        }
        $this->dispatch('save');
    }

    public function changePassword() {
        $status = Password::sendResetLink(
            ['email' => $this->email]
        );
        $status === Password::RESET_LINK_SENT ? $this->dispatch('success') : $this->dispatch('error');
    }
    
    public function dispatchCountry($country)
    {
        $this->country = $country;
        $this->dispatch('country-updated', $country);
    }

    public function render()
    {
        return view('livewire.customer.profile');
    }
}
