@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td><h4>Agendamentos</h4></td>
          <td></td>
        </tr>
    </thead>
    <tbody>
      @foreach($schedulings as $scheduling)
        <tr>
          <td>Data</td>
          <td>{{$scheduling->data}}</td>
          <td></td>
        </tr>
          <td>Hora</td>
          <td>{{$scheduling->hora}}</td>
          <td></td>
        </tr>
        <tr>
          <td>Carro</td>
          <td>{{$scheduling->fabricante }} {{ $scheduling->modelo }} {{ $scheduling->ano }}</td>
          <td></td>
        </tr>
        <tr>
          <td><br><br></td>
          <td></td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection