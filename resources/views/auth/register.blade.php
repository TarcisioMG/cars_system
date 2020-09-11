@extends('layout')

@section('content')
<script type="text/javascript">
    function fMasc(objeto,mascara) {
        obj=objeto
        masc=mascara
        setTimeout("fMascEx()",1)
    }
    function fMascEx() {
        obj.value=masc(obj.value)
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastre-se') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" onkeyup="validar(this,'text');" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <br>
                                <input class="form-check-input" type="radio" name="tipo_usuario" id="tipo_usuario" value="comum" checked>
                                <label class="form-check-label" for="tipo_usuario">
                                    Usuário normal
                                </label><br>
                                <input class="form-check-input" type="radio" name="tipo_usuario" id="tipo_usuario" value="adm">
                                <label class="form-check-label" for="tipo_usuario">
                                    Usuário Administrador
                                </label>
                            </div>
                        </div>
        <!--  <input type="hidden" class="form-control" name="tipo_usuario" value="adm" /> -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
