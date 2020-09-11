<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fabricante'=>'required',
            'modelo'=> 'required',
            'ano' => 'required|numeric',
            'foto' => 'required',
            'status' => 'required',
            'id_adm' => 'required'

        ]);
        $car = Car::create($validatedData);
        
        return redirect('/cars')->with('success', 'Carro cadastrado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);

        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fabricante'=>'required',
            'modelo'=> 'required',
            'ano' => 'required|numeric',
            'foto' => 'required'
        ]);
        Car::whereId($id)->update($validatedData);

        $car = Car::find($id);
        $car->fabricante = $request->get('fabricante');
        $car->modelo = $request->get('modelo');
        $car->ano = $request->get('ano');
        $car->foto = $request->get('foto');
        $car->save();

        return redirect('/cars')->with('success', 'Dados atualizados com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect('/cars')->with('success', 'Carro excluído com sucesso!!');
    }
}
