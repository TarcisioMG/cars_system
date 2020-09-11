@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Confira os dados do carro selecionado, e se estiver tudo certo agende o dia e horário para visitar a loja e finalizar a compra
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <td>Fabricante</td>
          <td>Modelo</td>
          <td>Ano</td>
          <td>Status</td>
        </tr>
      </thead>
      <tbody>
        @foreach($car as $car_details)
        <tr>
          <td>{{$car_details->fabricante}}</td>
          <td>{{$car_details->modelo}}</td>
          <td>{{$car_details->ano}}</td>
          <td>{{$car_details->status}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('schedulings.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Data:</label>
              <input type="date" class="form-control" name="data" />
          </div>
          <div class="form-group">
              <label for="price">Hora :</label>
              <input type="time" class="form-control" name="hora" onkeypress="valida_horas(this)" />
          </div>
          <input type="hidden" class="form-control" name="id_car" value="<?php echo($car_details->id) ?>" />
          <input type="hidden" class="form-control" name="id_user" value="<?php echo(Auth::user()->id) ?>" />
          <button type="submit" class="btn btn-primary">Cadastrar</button>
          <a href="{{ route('cars.index') }}" class="btn btn-danger">Cancelar</a>
      </form>
  </div>
</div>
@endsection