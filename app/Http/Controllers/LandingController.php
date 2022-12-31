<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Setting;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.home');
    }
    public function plantlist()
    {
        //get all plants data
        $plant = Plant::latest();

        //get search request form 
        $search = request('search');

        // jika ada pencarian jalankan search
        if ($search) {
            $plant->where('name', 'like', '%' . $search . '%');
        }

        //jika tidak ada maka get data
        $plants = $plant->get();

        return view('landing.plant', compact('plants'));
        // return view('landing.plant', [
        //     'plants' => $plants->get()
        // ]);
    }

    public function showPlantlist(Plant $plant)
    {
        return view('landing.detail', compact('plant'));
    }


    public function about()
    {
        $setting = Setting::get();
        return view('landing.about', compact('setting'));
    }
}
