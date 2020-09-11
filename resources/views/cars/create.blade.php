@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<script type="text/javascript">
    function fMasc(objeto,mascara) {
        obj=objeto
        masc=mascara
        setTimeout("fMascEx()",1)
    }
    function fMascEx() {
        obj.value=masc(obj.value)
    }
    function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";
        }
    }
    function mask(e, id, mask){
        var tecla=(window.event)?event.keyCode:e.which;   
        if((tecla>47 && tecla<58)){
            mascara(id, mask);
            return true;
        } 
        else{
            if (tecla==11 || tecla==0){
                mascara(id, mask);
                return true;
            } 
            else  return false;
        }
    }
    function mascara(id, mask){
        var i = id.value.length;
        var carac = mask.substring(i, i+1);
        var prox_char = mask.substring(i+1, i+2);
        if(i == 0 && carac != '#'){
            insereCaracter(id, carac);
            if(prox_char != '#')insereCaracter(id, prox_char);
        }
        else if(carac != '#'){
            insereCaracter(id, carac);
            if(prox_char != '#')insereCaracter(id, prox_char);
        }
        function insereCaracter(id, char){
            id.value += char;
        }
    }

    function validar(dom,tipo){
        switch(tipo){
            case'num':var regex=/[A-Za-z]/g;break;
            case'text':var regex=/\d/g;break;
        }
        dom.value=dom.value.replace(regex,'');
    }
</script>
<div class="card uper">
  <div class="card-header">
    Cadastrar carro
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
      <form method="post" action="{{ route('cars.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Fabricante:</label>
              <input type="text" class="form-control" name="fabricante" onkeyup="validar(this,'text');" />
          </div>
          <div class="form-group">
              <label for="price">Modelo :</label>
              <input type="text" class="form-control" name="modelo"/>
          </div>
          <div class="form-group">
              <label for="quantity">Ano:</label>
              <input type="text" class="form-control" name="ano" onkeyup="somenteNumeros(this)" maxlength="10" />
          </div>
          <input type="hidden" class="form-control" name="foto" value="Indisponivel" />
          <input type="hidden" class="form-control" name="id_adm" value="<?php echo(Auth::user()->id) ?>" />
          <input type="hidden" class="form-control" name="status" value="Disponivel" />
          <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
  </div>
</div>
@endsection