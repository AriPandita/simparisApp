<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Image_service;
use App\Exports\YearlySalesExport;
use Illuminate\Support\Facades\DB;
use App\Events\PaymentStatusUpdated;
use App\Models\image_rooms;
use Intervention\Image\ImageManager;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class StaffController extends Controller
{

    public function chat()
    {
        return view('staff.chat');
    }

    public function dashboard()
    {
        $status = ['BOOKING CONFIRMED' => 0, 'PAYMENT CONFIRMED' => 0, 'RESCHEDULED' => 0, 'IN PROGRESS' => 0, 'TRANSACTION COMPLETE' => 0, 'CANCELLED' => 0, 'BOOKING EXPIRED' => 0];
        $data = Booking::select('booking_status')->get();
        foreach($data as $d){
            if($d->booking_status == 'BOOKING CONFIRMED') {
                $status['BOOKING CONFIRMED'] += 1;
            } else if($d->booking_status == 'PAYMENT CONFIRMED') {
                $status['PAYMENT CONFIRMED'] += 1;
            } else if($d->booking_status == 'RESCHEDULED') {
                $status['RESCHEDULED'] += 1;
            } else if($d->booking_status == 'IN PROGRESS') {
                $status['IN PROGRESS'] += 1;
            } else if($d->booking_status == 'TRANSACTION COMPLETE') {
                $status['TRANSACTION COMPLETE'] += 1;
            }else if($d->booking_status == 'CANCELLED') {
                $status['CANCELLED'] += 1;
            }else if($d->booking_status == 'BOOKING EXPIRED') {
                $status['BOOKING EXPIRED'] += 1;
            }
        }
        // dd($status);
        return view('staff.dashboard')->with('status', $status);
    }

    public function getTransaction()
    {
        $data = DB::table('users')
        ->join('customer', 'users.id', '=', 'customer.id_users')
        ->join('booking', 'customer.id', '=', 'booking.id_customer')
        ->orderBy('booking.created_at', 'desc')
        ->get();

        return view('staff.transaction')->with('data', $data);
    }

    
    public function updateTransaction(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        try {
            // Ambil status baru dari request (jika ada)
            $newStatus = $request->input('status');

            // Logika untuk mengatur status booking berdasarkan status pembayaran
            if ($booking->payment_status == "PAID") {
                $booking->booking_status = 'PAYMENT CONFIRMED';
            } else if ($booking->payment_status == "PENDING") {
                $booking->booking_status = 'BOOKING CONFIRMED';
            }
            
            // Perbarui status booking jika status baru disediakan
            if ($newStatus && $newStatus !== $booking->booking_status) {
                $booking->booking_status = $newStatus;
            }

            // Simpan perubahan status booking
            $booking->save();

            event(new PaymentStatusUpdated($booking));
            
            return redirect('/staff/transaction')->with('success', 'Data change successfully');
        } catch (\Throwable $th) {
            $error = $th->getMessage();
            return redirect('/staff/transaction')->withErrors(['error'=> $error]);
        }
    }

    public function getService(Request $request)
    {
        $search = $request->search;
        if(strlen($search)) {
            $data = DB::table('services')
            ->join('image_services', 'services.id', '=', 'image_services.service_id')
            ->select('services.*', 'image_services.imgdir')
            ->where('service_name', 'like', "%$search%")
            ->orWhere('details', 'like', "%$search%")
            ->paginate(4);
            
        } else{
            $data = DB::table('services')
            ->join('image_services', 'services.id', '=', 'image_services.service_id')
            ->select('services.*', 'image_services.imgdir')
            ->orderBy('id', 'desc')
            ->paginate(4);
        }
        return view('staff.service')->with('data', $data);
    }

    public function addService(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'price' => 'required|integer',
            'details' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'type' => 'required|string|max:20',
            'service_duration' => 'required|integer',
        ]);

        try {
            $img = str_replace(' ', '', strtolower($request->service_name)) . date('_Ymd_His') .'.webp';
            // database transaction to insert data into two tables at once
            DB::beginTransaction();
            // insert data into users table
            $data = Service::create([
                'service_name' => $request->service_name,
                'type' => $request->type,
                'price' => $request->price,
                'service_duration' => $request->service_duration,
                'details' => $request->details,
            ]);
            // insert data into staff table
            Image_service::create([
                'imgdir' => $img,
                'service_id' => $data->id,
            ]);
            $manager = new ImageManager(Driver::class);
            $image = $manager->read($request->image)->scale(width:1080);
            $encode = $image->toWebp(100);
            $encode->save(storage_path('app/public/img/service/'.$img));

            // commit transaction
            DB::commit();

        } catch (\Throwable $th) {
            // rollback transaction if error
            DB::rollBack();
            $error = $th->getMessage();
            return redirect('/staff/service')->withErrors(['error'=> $error]);
        }
        return redirect('/staff/service')->with('success', 'New service added sucessfully!');

    }

    public function deleteService($id)
    {
        $image = Image_service::where('service_id', $id);
        $service = Service::where('id', $id);
        $filename = $image->value('imgdir');
        
        try {
            DB::beginTransaction();
            $image->delete();
            $service->delete();
            DB::commit();
            Storage::delete('public/img/service/'. $filename);
        } catch (\Throwable $th) {
            DB::rollBack();
            $error = $th->getMessage();
            return redirect('/staff/service')->withErrors(['error'=> $error]);
        }

        return redirect('/staff/service')->with('success', 'data deleted successfully');
    }

    public function updateService(Request $request, $id) 
    {
        $service = Service::where('id', $id);
        
        $request->validate([
            'service_name' => 'string|max:255',
            'price' => 'integer',
            'details' => 'string',
            'type' => 'string|max:20',
            'service_duration' => 'integer',
            'image' => 'image|mimes:jpeg,png,jpg,webp',
        ]);

        
        if($request->has('image')) {
            try {
                DB::beginTransaction();
                
                $filename = str_replace(' ', '', strtolower($request->service_name)) . date('_Ymd_His'). '.webp' ;
                $img = Image_service::where('service_id', $id);
                $old = $img->value('imgdir');
                
                $img->update([
                    'imgdir' => $filename,
                ]);
                
                $service->update([
                    'service_name' => $request->service_name,
                    'type' => $request->type,
                    'service_duration' => $request->service_duration,
                    'price' => $request->price,
                    'details' => $request->details,
                ]);
                
                $manager = new ImageManager(Driver::class);
                $image = $manager->read($request->image);
                $image->scale(width:1080);
                $encode = $image->toWebp(100);
                $encode->save(storage_path('app/public/img/service/'. $filename));
                Storage::delete('/public/img/service/'. $old);
                
                DB::commit();
                
                return redirect('/staff/service')->with('success', 'Data change successfully');
            } catch (\Throwable $th) {
                DB::rollBack();
                Storage::delete('public/img/service/'. $filename);
                $error = $th->getMessage();
                return redirect('/staff/service')->withErrors(['error'=> $error]);
            }

        } else {
            try {
                DB::beginTransaction();

                $service->update([
                    'service_name' => $request->service_name,
                    'price' => $request->price,
                    'details' => $request->details,
                ]);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $error = $th->getMessage();
                return redirect('/staff/service')->withErrors(['error'=> $error]);
            }
            return redirect('/staff/service')->with('success', 'successfully updated data.');
        }

    }

    public function getRoom(Request $request)
    {
        $data = DB::table('rooms')->paginate(10);

        if($request->search){
            $data = Room::query();
            $data->when($request->search, function ($query) use ($request){
                return $query->where('room_name', 'like', '%'.$request->search.'%');
            }); 
            $data = $data->paginate(10);
        }

        return view('staff.room', ['data' => $data]);
    }

    public function addRoom(Request $request)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'description'=> 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        try {
            $img = str_replace(' ', '', strtolower($request->room_name)) . date('_Ymd_His') .'.webp';

            DB::beginTransaction();
            $data = Room::create([
                'room_name' => $request->room_name,
                'capacity' => $request->capacity,
                'category' => 'Max '.$request->capacity.' Pax',
                'description' => $request->description,
            ]);

            image_rooms::create([
                'imgdir' => $img,
                'id_room' => $data->id,
            ]);
            $manager = new ImageManager(Driver::class);
            $image = $manager->read($request->image)->scale(width:1080);
            $encode = $image->toWebp(100);
            $encode->save(storage_path('app/public/img/room/'.$img));

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $error = $th->getMessage();
            return redirect('/staff/room')->withErrors(['error'=> $error]);
        }
        return redirect('/staff/room')->with('success', 'New room added successfully!');
    }

    public function updateRoom(Request $request, $id)
    {
        $room = Room::where('id', $id);
        $request->validate([
            'room_name' => 'string|max:255',
            'capacity' => 'integer',
            'description'=> 'string',
            'image' => 'image|mimes:jpeg,png,jpg,webp',
        ]);

        if($request->has('image')) {
            try {
                DB::beginTransaction();
                
                $filename = str_replace(' ', '', strtolower($request->room_name)) . date('_Ymd_His'). '.webp' ;
                $img = image_rooms::where('id_room', $id);
                $old = $img->value('imgdir');
                
                $img->update([
                    'imgdir' => $filename,
                ]);

                $room->update([
                    'room_name' => $request->room_name,
                    'capacity' => $request->capacity,
                    'category' => 'Max '.$request->capacity.' Pax',
                    'description' => $request->description
                ]);
                
                $manager = new ImageManager(Driver::class);
                $image = $manager->read($request->image);
                $image->scale(width:1080);
                $encode = $image->toWebp(100);
                $encode->save(storage_path('app/public/img/room/'. $filename));
                Storage::delete('/public/img/room/'. $old);
                
                DB::commit();
                
                return redirect('/staff/room')->with('success', 'Data change successfully');
            } catch (\Throwable $th) {
                DB::rollBack();
                Storage::delete('public/img/room/'. $filename);
                $error = $th->getMessage();
                return redirect('/staff/room')->withErrors(['error'=> $error]);
            }

        } else {
            try {
                DB::beginTransaction();

                $room->update([
                    'room_name' => $request->room_name,
                    'capacity' => $request->capacity,
                    'category' => $request->category,
                    'description' => $request->description
                ]);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $error = $th->getMessage();
                return redirect('/staff/room')->withErrors(['error'=> $error]);
            }
            return redirect('/staff/room')->with('success', 'successfully updated data.');
        }
    }

    public function deleteRoom($id)
    {
        $image = image_rooms::where('service_id', $id);
        $room = room::where('id', $id);
        $filename = $image->value('imgdir');
        
        try {
            DB::beginTransaction();
            $image->delete();
            $room->delete();
            DB::commit();
            Storage::delete('public/img/room/'. $filename);
        } catch (\Throwable $th) {
            DB::rollBack();
            $error = $th->getMessage();
            return redirect('/staff/room')->withErrors(['error'=> $error]);
        }
    
        return redirect('/staff/room')->with('success', 'data deleted successfully');
    }

    

    public function getReport(Request $request){
        // Mendapatkan tahun dari request, jika tidak ada default ke tahun ini
        $year = $request->input('year', date('Y'));

        // Mengambil data total penjualan per bulan untuk tahun tertentu
        $data = DB::table('booking')
            ->select(DB::raw('MONTH(date) as month, SUM(total) as total_sales'))
            ->whereYear('date', $year)
            ->groupBy(DB::raw('MONTH(date)'))
            ->get();

        return view('staff.report', compact('data', 'year'));
    }

    public function exportReport(Request $request)
    {
        $year = $request->input('year', date('Y'));

        return Excel::download(new YearlySalesExport($year), 'yearly_sales_' . $year . '.xlsx');
    }
}
