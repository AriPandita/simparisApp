<?php

namespace App\Livewire\PaymentUser;

use DateTime;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FormCustomer extends Component
{
    public $country = '';
    public $successMessage = '';
    public $name;
    public $email;
    public $phone;
    public $address;
    public $pax;
    public $date;
    public $total;
    public $service_invoice;
    public $validationEmailRule = 'email|required|unique:users,email';
    public $complete = false;
    public function mount($customer)
    {
        if(isset($customer)){
            $this->name = $customer['name'];
            $this->phone = $customer['phone'];
            $this->email = $customer['email'];
            $this->country = $customer['country'];
            $this->address = $customer['address'];
            $this->validationEmailRule = $customer['validationEmailRule'];
        }
    }

    #[On('service-invoice')]
    public function setServiceInvoice($service_invoice)
    {
        $this->service_invoice = $service_invoice;
    }


    #[On('complete')]
    public function complete($complete)
    {
        $this->complete = $complete;
    }

    public function dispatchCountry($country)
    {
        $this->country = $country;
        $this->dispatch('country-updated', $country);
    }

    #[On('total')]
    public function setTotal($total)
    {
        $this->total = $total;
    }

    #[On('date')]
    public function setDate($date)
    {
        // $formattedDate = null;
        // if (!DateTime::createFromFormat('j F, Y. H:i T', $date)) {
        //     $formattedDate = null;
        // } else {
        //     $formattedDate = date('Y-m-d H:i:s', strtotime($date));
        // }
        // $this->date = $formattedDate;
        $this->date = date('Y-m-d H:i:s', strtotime($date));
    }

    public function updatedCountry()
    {
        $this->validate([
            'country' => 'required',
        ], [
        ], [
            'country' => 'Country',
        ]);
        $this->dispatch('country-updated', $this->country);
    }
    public function updatedAddress()
    {
        $this->validate([
            'address' => 'required',
        ], [
        ], [
            'address' => 'Address',
        ]);
        $this->dispatch('address-updated', $this->address);
    }    
    public function updatedPhone()
    {
        $this->validate([
            'phone' => 'required|numeric|min:10',
        ], [
        ], [
            'phone' => 'Phone',
        ]);
        $this->dispatch('phone-updated', $this->phone);
    }
    public function updatedName()
    {
        $this->dispatch('name-updated', $this->name);
        $this->validate([
            'name' => 'required',
        ], [
        ], [
            'name' => 'Name',
        ]);
    }
    public function updatedEmail()
    {
        $this->dispatch('email-updated', $this->email);
        $this->validate([
            'email' => $this->validationEmailRule,
        ], [
        ], [
            'email' => 'Email',
        ]);
    }

    public function setPax($pax)
    {
        $this->dispatch('pax-updated', $pax);
    }

    #[On('pax-updated')]
    public function pax($pax)
    {
        $this->pax = $pax;
    }

    #[On('submit-form')]
    public function validateForm()
    {
        $this->validate([
            'name' => 'required',
            'email' => $this->validationEmailRule,
            'phone' => 'required|numeric|min:10',
            'country' => 'required',
            'address' => 'required',
            'pax' => 'required|numeric|min:1|max:3',

        ],[
            'pax.required' => 'Must choose pax',
        ],[
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'phone',
            'country' => 'Country',
            'address' => 'Address',
            'pax' => 'Pax',
        ]);
        $customer = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'country' => $this->country,
            'address' => $this->address,
            'pax' => $this->pax,
            'date' => $this->date,
            'total' => $this->total,
        ];
        $this->dispatch('save-form', $customer, $this->service_invoice);
    }

    public function render()
    {
        return view('livewire.payment-user.form-customer');
    }
}