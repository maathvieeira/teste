<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class FormularioController extends Controller
{
    public function index(){
      $lista = DB::table('dados')
        ->select('id', 'nome', 'email', 'descricao')
        ->where('excluido', 0)
        ->get();

        return view('/listagem', compact('lista'));
    }
    //Validação das informações e envia para a base de dados.
    protected function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:80',
            'email' => 'required|string|email|max:100',
            'descricao' => 'required|string|min:10|max:1000',
            'foto' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }

        DB::table('dados')->insert([
            ['nome' => $request->nome, 'email' => $request->email, 'descricao' => $request->descricao, 'excluido' => 0]
        ]);

        $last = DB::table('dados')
          ->select('id')
          ->orderByRaw('id DESC')
          ->first();

        $foto = $request->file('foto');
        $ext = ['jpg', 'png', 'jpeg'];
        if($foto->isValid() and in_array($foto->extension(), $ext)){
  			  $foto->storeAs('public/img/face', $last->id.'.jpg');
  			  return redirect()->route('listagem');
  			}

        return redirect()->route('listagem');
    }

    public function messages(){
      return [
          'nome.required' => 'A title is required',
          'email.required'  => 'A message is required',
          'descricao.required'  => 'A message is required',
          'foto.required'  => 'A message is required',
      ];
    }
    //Função de delete lógico.
    public function logicDelete($id){
      DB::table('dados')
            ->where('id', $id)
            ->update(['excluido' => 1]);

      return redirect()->route('listagem');
    }
    //Função para pagina de edição, lista as infomrações com o id selecionado.
    public function edit($id){
      $edita = DB::table('dados')
            ->select('dados.*')
            ->where('id', $id)
            ->get();

      return view('/editar', compact('edita'));
    }
    //Faz alterações das informações.
    public function update(Request $request, $id){
      //valida se oram preenchidas todas as informações.
      $validator = Validator::make($request->all(), [
          'nome' => 'required|string|max:80',
          'email' => 'required|string|email|max:100',
          'descricao' => 'required|string|min:10|max:1000',
          'foto' => 'required'
      ]);

      if ($validator->fails()) {
          return redirect('/editar/'.$id)
                      ->withErrors($validator)
                      ->withInput();
      }
      //request dos updates dos dados.
      DB::table('dados')
            ->where('id', $id)
            ->update(['nome' => $request->nome, 'email' => $request->email, 'descricao' => $request->descricao]);

      //Request no arquivo.
      $foto = $request->file('foto');
      $ext = ['jpg', 'png', 'jpeg'];
      //Verifica se o arquivo e valido.
      if($foto->isValid() and in_array($foto->extension(), $ext)){
        //Se o arquivo é valido exclui a foto.
        $fotoVeri = 'public/img/face'.$id.'.jpg';
        if (file_exists($fotoVeri)) {
            !unlink($fotoVeri);
        }
        //Grava o arquivo novo com o mesmo id e redireciona.
			  $foto->storeAs('public/img/face', $id.'.jpg');
			  return redirect()->route('listagem');
			}
      
      return redirect()->route('listagem');
    }
}
