<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Exports\TransactionExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Auth\Events\Registered;

class AdminController extends Controller
{
    public function index()
    {
        return redirect('/admin-account');
    }

    // =========== ADMIN ===========

    // get all admin account data
    public function getAdmin()
    {
        $data = User::where('level', 'admin')->get();
        return view('admin.account.admin', compact('data'));
    }

    // add new admin account
    public function addAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        try {
            $password = "password123";
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'level' => 'admin',
                'password' => bcrypt($password),
            ]);

            // send an email to the email entered
            event(new Registered($data));
        } catch (\Throwable $th) {
            $error = $th->getMessage();
            return redirect('/admin-account')->with('error', $error);
        }

        return redirect('/admin-account')->with('success', 'successfully added data, the default password is "password123" please change it later.');
    }

    // update admin data
    public function updateAdmin(Request $request, $id)
    {
        $data = User::find($id);
        if ($data->level == 'admin' && $request->level == 'customer') {
            try {
                DB::beginTransaction();

                $user = User::find($id);

                $user->update([
                    'name' => $request->name,
                    'level' => $request->level,
                ]);

                Customer::create([
                    'id_users' => $id,
                ]);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $error = $th->getMessage();
                return redirect('/admin-account')->with('error', $error);
            }
        } elseif ($data->level == 'admin' && $request->level == 'staff') {
            try {
                DB::beginTransaction();

                $user = User::find($id);

                $user->update([
                    'name' => $request->name,
                    'level' => $request->level,
                ]);

                Staff::create([
                    'id_users' => $id,
                ]);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $error = $th->getMessage();
                return redirect('/admin-account')->with('error', $error);
            }
        } elseif ($data->level == 'admin' && $request->level == 'admin') {
            try {
                DB::beginTransaction();

                $user = User::find($id);

                $user->update([
                    'name' => $request->name,
                    'level' => $request->level,
                ]);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $error = $th->getMessage();
                return redirect('/admin-account')->with('error', $error);
            }
        }
        return redirect('/admin-account')->with('success', 'successfully updated data.');
    }

    // delete admin account
    public function deleteAdmin($id)
    {
        $data = User::find($id);

        try {
            $data->delete();
        } catch (\Throwable $th) {
            $error = $th->getMessage();
            return redirect('/admin-account')->with('error', $error);
        }

        return redirect('/admin-account')->with('success', 'successfully deleted data.');
    }

    // =========== STAFF ===========

    // get all staff account data
    public function getStaff()
    {
        $data = DB::table('users')
            ->join('staff', 'users.id', '=', 'staff.id_users')
            ->select('users.*', 'staff.*')
            ->where('users.level', 'staff')
            ->get();
        return view('admin.account.staff', compact('data'));
    }

    //add new staff account
    public function addStaff(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|max:15',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        try {
            // set default password
            $password = "password123";
            // database transaction to insert data into two tables at once
            DB::beginTransaction();
            // insert data into users table
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'level' => 'staff',
                'password' => bcrypt($password),
            ]);
            // insert data into staff table
            Staff::create([
                'phone' => $request->phone,
                'id_users' => $data->id,
            ]);
            // commit transaction
            DB::commit();

            // send an email to the email entered
            event(new Registered($data));
        } catch (\Throwable $th) {
            // rollback transaction if error
            DB::rollBack();
            $error = $th->getMessage();
            return redirect('/staff-account')->with('error', $error);
        }
        return redirect('/staff-account')->with('success', 'successfully added data, the default password is "password123" please change it later.');
    }

    // update staff account data
    public function updateStaff(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'phone' => 'max:16',
        ]);

        $data = Staff::find($id);
        $user = User::find($data->id_users);
        if ($user->level == 'staff' && $request->level == 'admin') {
            try {
                DB::beginTransaction();

                Staff::where('id', $id)->delete();

                $user->update([
                    'name' => $request->name,
                    'level' => $request->level,
                ]);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $error = $th->getMessage();
                return redirect('/staff-account')->with('error', $error);
            }
        } elseif ($user->level == 'staff' && $request->level == 'customer') {
            try {
                DB::beginTransaction();

                $user->update([
                    'name' => $request->name,
                    'level' => $request->level,
                ]);

                Staff::where('id', $id)->delete();

                Customer::create([
                    'phone' => $request->phone,
                    'id_users' => $user->id,
                ]);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $error = $th->getMessage();
                return redirect('/staff-account')->with('error', $error);
            }
        } else {
            try {
                DB::beginTransaction();

                $user->update([
                    'name' => $request->name,
                ]);

                $data->update([
                    'phone' => $request->phone
                ]);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $error = $th->getMessage();
                return redirect('/staff-account')->with('error', $error);
            }
        }
        return redirect('/staff-account')->with('success', 'successfully updated data.');
    }

    public function deleteStaff($id)
    {
        $staff = Staff::find($id);
        $user = User::find($staff->id_users);
        try {
            DB::beginTransaction();
            $staff->delete();
            $user->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $error = $th->getMessage();
            return redirect('/staff-account')->with('error', $error);
        }

        return redirect('/staff-account')->with('success', 'successfully deleted data.');
    }

    // =========== CUSTOMER ===========
    public function getCustomer()
    {
        $data = DB::table('users')
            ->join('customer', 'users.id', '=', 'customer.id_users')
            ->select('users.*', 'customer.*')
            ->where('users.level', 'customer')
            ->get();
        return view('admin.account.customer', compact('data'));
    }

    public function addCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|max:15',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        try {
            // set default password
            $password = "password123";
            // database transaction to insert data into two tables at once
            DB::beginTransaction();
            // insert data into users table
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'level' => 'customer',
                'password' => bcrypt($password),
            ]);
            // insert data into customer table
            Customer::create([
                'phone' => $request->phone,
                'address' => $request->address,
                'country' => $request->country,
                'id_users' => $data->id,
            ]);
            // commit transaction
            DB::commit();

            // send an email to the email entered
            event(new Registered($data));
        } catch (\Throwable $th) {
            // rollback transaction if error
            DB::rollBack();
            $error = $th->getMessage();
            return redirect('/customer-account')->with('error', $error);
        }
        return redirect('/customer-account')->with('success', 'successfully added data, the default password is "password123" please change it later.');
    }

    public function updateCustomer(Request $request, $id)
    {
        $customer = Customer::find($id);
        $user = User::find($customer->id_users);

        if ($user->level == 'customer' && $request->level == 'admin') {
            try {
                DB::beginTransaction();

                Customer::where('id', $id)->delete();

                $user->update([
                    'name' => $request->name,
                    'level' => $request->level,
                ]);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $error = $th->getMessage();
                return redirect('/customer-account')->with('error', $error);
            }
        } elseif ($user->level == 'customer' && $request->level == 'staff') {
            try {
                DB::beginTransaction();

                Customer::where('id', $id)->delete();

                $user->update([
                    'name' => $request->name,
                    'level' => $request->level,
                ]);

                Staff::create([
                    'phone' => $request->phone,
                    'id_users' => $user->id,
                ]);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $error = $th->getMessage();
                return redirect('/customer-account')->with('error', $error);
            }
        } else {
            $request->validate([
                'name' => 'string|max:255',
                'address' => 'string|max:51',
                'country' => 'string|max:51',
                'phone' => 'max:16',
            ]);

            try {
                DB::beginTransaction();

                $user->update([
                    'name' => $request->name,
                ]);

                $customer->update([
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'country' => $request->country,
                ]);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $error = $th->getMessage();
                return redirect('/customer-account')->with('error', $error);
            }
        }

        return redirect('/customer-account')->with('success', 'successfully updated data.');
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::find($id);
        $user = User::find($customer->id_users);
        try {
            DB::beginTransaction();
            $customer->delete();
            $user->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $error = $th->getMessage();
            return redirect('/customer-account')->with('error', $error);
        }

        return redirect('/customer-account')->with('success', 'successfully deleted data.');
    }

    public function getServiceTransaction(Request $request)
    {
        $query = DB::table('order_services')
        ->join('booking', 'order_services.id_booking', '=', 'booking.id')
        ->join('services', 'order_services.id_services', '=', 'services.id')
        ->select('services.service_name', 'booking.date', 'booking.pax', 'services.price');

        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            $query->whereBetween('booking.date', [$start_date, $end_date]);
        }

        $data = $query->get();

        return view('admin.report.service-order', compact('data'));
    }

    public function exportServiceTransaction(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        return Excel::download(new TransactionExport($startDate, $endDate), 'service_transactions.xlsx');
    }

    public function getCashFlow()
    {
        $serviceData = DB::table('order_services')
            ->join('booking', 'order_services.id_booking', '=', 'booking.id')
            ->join('services', 'order_services.id_services', '=', 'services.id')
            ->select('order_services.*', 'booking.date', 'services.service_name', 'services.price', 'booking.pax')
            ->get();

        foreach ($serviceData as $item) {
            $timestamp = strtotime($item->date);
            $month = date('m', $timestamp);
            $item->month = $month;
        }

        // Gabungkan kedua data
        $data = [
            'services' => $serviceData,
        ];

        return view('admin.report.cash-flow', compact('data'));
    }

    public function dashboard()
    {
        $data = DB::table('order')
            ->join('booking', 'order.id_booking', '=', 'booking.id')
            ->join('services', 'order.id_services', '=', 'services.id')
            ->get();

        foreach ($data as $item) {
            $timestamp = strtotime($item->date);

            $month = date('n', $timestamp);
            $item->month = $month;
        }
        $reports = [];
        for ($i = 1; $i <= 12; $i++) {
            $reports[$i - 1] = 0;
        }
        foreach ($data as $item) {
            for ($i = 1; $i <= 12; $i++) {
                if ($item->month == $i) {
                    $reports[$i - 1] = $reports[$i - 1] + $item->price * $item->pax;
                }
            }
        }
        return view('admin.index', compact('reports'));
    }
}
