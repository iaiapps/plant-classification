<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use App\Models\Classification;
use Illuminate\Support\Facades\Storage;

class PlantController extends Controller
{
    //auth
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('plant.index', [
            'plants' => Plant::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validatedPlant = $request->validate([
            'img' => 'image|file|max:512',
            'name' => 'required',
            'description' => 'required',
            'benefit' => 'required',
        ]);

        //persiapan awal, ganti FILESYSTEM_DISK di env ke "public"
        //kemudian "php artisan storage:link"
        //tangani image masukkan ke folder 'img-plant'
        //masukkan ke validatedPlant

        //jika ada gambar maka masukkan, jika tidak ada biarkan null
        if ($request->file('img')) {
            $validatedPlant['img'] = $request->file('img')->store('img-plant');
        }

        $validatedClassification = $request->validate([
            'kingdom' => 'required',
            'division' => 'required',
            'class' => 'required',
            'order' => 'required',
            'family' => 'required',
            'genus' => 'required',
            'species' => 'required',
        ]);

        //metode mass assigment ke database

        //untuk mendapat id dari masukan awal
        $id = Plant::create($validatedPlant)->id;

        //memasukkan plant_id
        $validatedClassification['plant_id'] = $id;
        Classification::create($validatedClassification);

        return redirect('/plant')->with('success', 'Data telah ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function show(Plant $plant)
    {

        // dd($plant);
        return view('plant.show', [
            'plant' => $plant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function edit(Plant $plant)
    {
        return view('plant.edit', compact('plant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plant $plant, Classification $classification)
    {

        // dd($plant->img);
        $validatedPlant = $request->validate([
            'img' => 'image|file|max:512',
            'name' => 'required',
            'description' => 'required',
            'benefit' => 'required',
        ]);


        //jika ada gambar maka masukkan, jika tidak ada biarkan null
        if ($request->hasFile('img')) {
            Storage::delete($plant->img);
            $validatedPlant['img'] = $request->file('img')->store('img-plant');
        }

        $validatedClassification = $request->validate([
            'kingdom' => 'required',
            'division' => 'required',
            'class' => 'required',
            'order' => 'required',
            'family' => 'required',
            'genus' => 'required',
            'species' => 'required',
        ]);


        // Plant::where('id', $plant->id)->update($validatedPlant);
        $plant->update($validatedPlant);


        // Classification::where('id', $plant->classification->id)->update($validatedClassification);
        $classification->where('id', $plant->classification->id)->update($validatedClassification);

        return redirect('/plant')->with('success', 'Data telah ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plant $plant)
    {
        //hapus file image dari folder
        Storage::delete($plant->img);

        // Plant::destroy($plant->id);
        // atau
        $plant->delete();
        return redirect('/plant')->with('success', "post telah dihapus");
    }
}
