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
        $$pessoas = Pessoas::buscar($request->input('conteudoPesquisa'));
        return view('pessoas.pessoas',array('pessoas' => $pessoas,'busca'=>$request->input('conteudoPesquisa')));
    }
    public function create(){
        return view('pessoas.cadastroPessoas');
    }
    public function store(Request $request)
    {
        $resultadoNome = Pessoas::confereNome($request->input('name'));
        $resultadoCpf = Pessoas::confereCpf($request->input('cpf'));

        if (in_array(false, $resultadoNome) || in_array(false, $resultadoCpf)) {
            // Se alguma validação falhar
            Session::flash('mensagem', 'Por favor, informe um cadastro válido!');
            return redirect()->back();
        }

        $id = Pessoas::salvarPessoa($request->input('name'), $request->input('cpf'));
        if ($id) {
            // Se todas as validações passarem e o objeto for salvo
            Session::flash('mensagem', 'Cadastro salvo!');
            return redirect(url("pessoas/"));
        }

        return redirect()->back()->withInput();
    }

    public function destroy($id)
    {
        if (Pessoas::excluirPessoa($id)) {
            Session::flash('mensagem', 'Cadastro excluído!');
        } else {
            Session::flash('mensagem', 'Não foi possível excluir o cadastro!');
        }
        return redirect(url("pessoas/"));
    }
    public function edit($id)
    {
        $pessoas = Pessoas::find($id);
        return view("pessoas.editarPessoas",array("pessoas"=>$pessoas));
    }
    public function update(Request $request, $id)
    {
        $resultadoNome = Pessoas::confereNome($request->input('name'));
        $resultadoCpf = Pessoas::confereCpf($request->input('cpf'));

        if (in_array(false, $resultadoNome) || in_array(false, $resultadoCpf)) {
            // Se alguma validação falhar
            Session::flash('mensagem', 'Por favor, informe um cadastro válido!');
            return redirect()->back();
        }

        $id = Pessoas::atualizarPessoa($id,$request->input('name'), $request->input('cpf'));
        if ($id) {
            // Se todas as validações passarem e o objeto for salvo
            Session::flash('mensagem', 'Cadastro salvo!');
            return redirect(url("pessoas/"));
        }

        return redirect()->back()->withInput();
    }
}
