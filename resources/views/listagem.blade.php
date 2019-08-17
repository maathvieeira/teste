@extends('index')
@section('conteudo')
  <h2>Listagem | </h2>
  <p style="margin: 12px;">A seguir estão todas as pessoas cadastradas com nome, email, descrição e foto.</p>
  <table class="table">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Descrição</th>
        <th>Foto</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($lista as $l)
      <tr>
        <td>{{$l->nome}}</td>
        <td>{{$l->email}}</td>
        <td>{{$l->descricao}}</td>
        <td><img src="storage/img/face/{{$l->id}}.jpg" alt="..." class="img-circle profile_img" style="width: 100px; height: 100px;"></td>
        <td>
          <a href="{{route('editar', $l->id)}}">
            <button type="button" class="btn btn-warning">Editar</button>
          </a>
          <a href="{{route('excluir', $l->id)}}">
            <button type="button" class="btn btn-danger">Exclusão</button>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
