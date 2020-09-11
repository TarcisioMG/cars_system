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
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>ID</td>
          <td>Fabricante</td>
          <td>Modelo</td>
          <td>Ano</td>
          <td>Status</td>
          <td colspan="2">Opções</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
        <tr>
            <td>{{$car->id}}</td>
            <td>{{$car->fabricante}}</td>
            <td>{{$car->modelo}}</td>
            <td>{{$car->ano}}</td>
            <td>{{$car->status}}</td>
            @if(isset(Auth::user()->tipo_usuario))
              @if (Auth::user()->tipo_usuario != "comum")
              <td><a href="{{ route('cars.edit',$car->id) }}" class="btn btn-primary">Editar</a></td>
              <td>
                <form action="{{ route('cars.destroy', $car->id)}}" method="post">
                  @csrf
                  @method('GET')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>
              </td>
              @else
              <td><a href="{{ route('schedulings.create', $car->id) }}" class="btn btn-success">Quero esse!</a></td>
              @endif
            @else
            <td><a href="{{ route('schedulings.create', $car->id) }}" class="btn btn-primary">Quero esse!</a></td>
            @endif
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection