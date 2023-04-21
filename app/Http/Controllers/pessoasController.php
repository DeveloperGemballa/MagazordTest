<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pessoas;
use Session;

class pessoasController extends Controller
{
    public function index(){
        $pessoas = Pessoas::all();

        return view('pessoas.pessoas',array('pessoas' => $pessoas));
    }
    public function buscar(Request $request) {
        $pessoas = Pessoas::where('nomePessoa', 'LIKE', '%'.$request->input('conteudoPesquisa').'%')
        ->orWhere('CPFpessoa', 'LIKE', '%'.$request->input('conteudoPesquisa').'%')
        ->get();
        return view('pessoas.pessoas',array('pessoas' => $pessoas,'busca'=>$request->input('conteudoPesquisa')));
    }
    public function create()
    {
        return view('pessoas.cadastroPessoas');
    }
    public function store(Request $request)
    {
        
        
        $pessoas = new Pessoas();
        $resultadoNome = Pessoas::confereNome($request->input('name'));
        $resultadoCpf = Pessoas::confereCpf($request->input('cpf'));
        $pessoas->nomePessoa = $request->input('name');
        $pessoas->CPFpessoa = $request->input('cpf');
        if (in_array(false, $resultadoNome) || in_array(false, $resultadoCpf)) {
            // Se alguma validação falhar
            Session::flash('mensagem', 'Por favor, informe um cadastro válido!');
            return redirect()->back();
        }
        if($pessoas->save()) {
            // Se todas as validações passarem e o objeto for salvo
            Session::flash('mensagem', 'Cadastro salvo!');
            return redirect(url("pessoas/"));
        }
        
    }
    public function destroy($id)
    {
        $pessoas = Pessoas::find($id);
        $pessoas -> delete();
        return redirect(url("pessoas/"));
    }
    public function edit($id)
    {
        $pessoas = Pessoas::find($id);
        return view("pessoas.editarPessoas",array("pessoas"=>$pessoas));
    }
    public function update(Request $request, $id)
    {
        $pessoas = Pessoas::find($id);
        $resultadoNome = Pessoas::confereNome($request->input('name'));
        $resultadoCpf = Pessoas::confereCpf($request->input('cpf'));
        $pessoas->nomePessoa = $request->input('name');
        $pessoas->CPFpessoa = $request->input('cpf');
        if (in_array(false, $resultadoNome) || in_array(false, $resultadoCpf)) {
            // Se alguma validação falhar
            Session::flash('mensagem', 'Por favor, informe um cadastro válido!');
            return redirect()->back();
        }
        if($pessoas->save()) {
            // Se todas as validações passarem e o objeto for salvo
            Session::flash('mensagem', 'Cadastro salvo!');
            return redirect(url("pessoas/"));
        }
    }
}
