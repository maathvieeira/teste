@extends('index')
@section('conteudo')
<div style="text-align:right; width:98%;">
<a href="{{url('lista')}}"><button type="button" class="btn btn-warning" style="float: right;">Listagem</button></a>
</div>
<ul>
@foreach($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach
</ul>
@foreach($edita as $e)
<div class="col-lg-12">
<form action="{{route('atualizar', $e->id)}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" value="{{$e->nome}}">
      @if ($errors->has('nome'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('nome') }}</strong>
          </span>
      @endif
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" name="email" value="{{$e->email}}">
      @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
    </div>
    <div class="form-group">
      <label for="descricao">Descrição:</label>
      <textarea type="text" class="form-control" id="descricao" name="descricao">{{$e->descricao}}</textarea>
      @if ($errors->has('descricao'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('descricao') }}</strong>
          </span>
      @endif
    </div>
      <input type="file" name="foto" id="foto" class="btn btn-primary"  accept="image/png, image/jpeg"/>
      @if ($errors->has('foto'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('foto') }}</strong>
          </span>
      @endif

      <button type="submit" class="btn btn-success" style="float: right;">Enviar</button>
</form>
</div>
@endforeach
@endsection
