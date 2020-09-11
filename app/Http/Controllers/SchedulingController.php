<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scheduling;
use App\Car;
use Auth;
use DB;

class SchedulingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;

        $schedulings = DB::table('schedulings')
        ->join('cars', 'schedulings.id_car', '=', 'cars.id')
        ->where('id_user', $id_user)->get();

        return view('schedulings.index',compact('schedulings'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $car = \App\Car::where('id', $id)->get();

        return view('schedulings.create', compact('car'));
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
            'data'=>'required',
            'hora'=> 'required',
            'id_car' => 'required|numeric',
            'id_user' => 'required|numeric'
        ]);
        $scheduling = Scheduling::create($validatedData);
        
        return redirect('/schedulings')->with('success', 'Agendamento cadastrado com sucesso!!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scheduling = Scheduling::findOrFail($id);
        $scheduling->delete();

        return redirect('/schedulings')->with('success', 'Agendamento cancelado com sucesso!!');
    }
}
