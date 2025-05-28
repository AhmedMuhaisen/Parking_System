<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\CarsType;
use App\Models\MotorType;
use App\Models\ParkingWork;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Unit;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehiclesType;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
class WebsiteController extends Controller
{
    function index()
    {
        $settings = Setting::get()[0];
        $parking_work = ParkingWork::get();
        $testimonials = Testimonial::get();

        return view('website.index', compact('settings', 'parking_work', 'testimonials'));
    }

    function register()
    {
        $building = Building::get();
        $unit = Unit::get();
        $vehicle_type = VehiclesType::get();
        $motor_type = MotorType::get();
        $cars_type = CarsType::get();

        return view('website.register', compact('building', 'unit', 'vehicle_type', 'motor_type', 'cars_type'));
    }


    function register_post(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'vehicle_number'=>'required',
            'date_barth'=>'required| date',
            'image'=>'required|file|image|mimes:jpeg,jpg,png,svg|max:2048',
            'vehicle_type' => ['required', 'exists:vehicles_types,id'],
            'motor_type' => ['required', 'exists:motor_types,id'],
            'car_type' => ['required', 'exists:cars_types,id'],
            'building' => ['required', 'exists:buildings,id'],
            'unit' => ['required', 'exists:units,id'],
            'vehicle_color'=>'required',
     ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name'=>$request->first_name,
            'second_name'=>$request->last_name,
            'phone'=>$request->phone,
            'date_birth'=>$request->date_barth,
            'image'=>$request->image,
            'unit_id'=>$request->unit,
            'building_id'=>$request->building,
            'type'=>'user'
        ]);

   $vehicle=Vehicle::create([
            'vehicle_number' => $request->vehicle_number,
            'vehicle_type_id' => $request->vehicle_type,
            'motor_type_id' => $request->motor_type,
            'car_type_id' => $request->car_type,
                'category_id' => 1,
            'color' => $request->vehicle_color,
            'user_id'=>$user->id
                ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('website'));









        $building = Building::get();
        $unit = Unit::get();
        $vehicle_type = VehiclesType::get();
        $motor_type = MotorType::get();
        $cars_type = CarsType::get();

        return view('website.register', compact('building', 'unit', 'vehicle_type', 'motor_type', 'cars_type'));
    }
}
