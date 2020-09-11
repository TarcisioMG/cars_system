@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar Dados do Carro
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('cars.update', $car->id) }}">
        @method('GET')
        @csrf
        <div class="form-group">
          @csrf
          <label for="name">Fabricante:</label>
          <input type="text" class="form-control" name="fabricante" value={{ $car->fabricante }} />
        </div>
        <div class="form-group">
          <label for="price">Modelo :</label>
          <input type="text" class="form-control" name="modelo" value={{ $car->modelo }} />
        </div>
        <div class="form-group">
          <label for="quantity">Ano:</label>
          <input type="text" class="form-control" name="ano" value={{ $car->ano }} />
        </div>
        <input type="hidden" class="form-control" name="foto" value="Indisponivel" />
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
</div>
@endsection