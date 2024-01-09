<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestUsuario;

class UsuarioController extends Controller
{
    public function __construct(User $user){
        $this->user = $user;
    }
    public function index(Request $request){
        $pesquisar = $request->pesquisar;
        //dd($pesquisar);
        //$findProduto = Produto::all();
        $findUsuario = $this->user->getUsuarioPesquisarIndex( search: $pesquisar ?? '');

        return view('pages.usuarios.paginacao', compact('findUsuario'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $buscarRegistro = User::find($id);
        $buscarRegistro->delete();
        return response()->json(['success'=> true]);
    }

    public function cadastrarUsuario(FormRequestUsuario $request){
        //dd($request);
        if($request->method() == "POST"){
            // criação dos dados

            $data = $request->all();
            User::create($data);
            Toastr::success('Gravado com sucesso');
            return redirect()->route('usuario.index');
        }
        // Amostra dos dados
        return view('pages.usuarios.create');
    }


    public function atualizarUsuario(FormRequestUsuario $request, $id){
        //dd($request);
        if($request->method() == "PUT"){
            // altera os dados

            $data = $request->all();
            $buscarRegistro = User::find($id);
            $buscarRegistro->update($data);
            return redirect()->route('usuario.index');
        }
        // Amostra dos dados
        $findUsuario = User::where('id', '=', $id)->first();
        return view('pages.usuarios.atualiza', compact('findUsuario'));
    }
}
