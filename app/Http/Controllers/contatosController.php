<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Pessoas;
use App\Models\Contatos;

class contatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contatos::all();
        $pessoas = Pessoas::all();
        return view('contatos.contatos',array('contatos' => $contatos, 'pessoas' => $pessoas));
    }
    public function buscar(Request $request) {
        $contatos = contatos::where('tipoContato', 'LIKE', '%'.$request->input('conteudoPesquisa').'%')
        ->orWhere('descricaoContato', 'LIKE', '%'.$request->input('conteudoPesquisa').'%')
        ->get();
        return view('contatos.contatos',array('contatos' => $contatos,'busca'=>$request->input('conteudoPesquisa')));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pessoas = Pessoas::all();
        return view('contatos.cadastroContatos',array('pessoas' => $pessoas));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contatos = new contatos();
        $resultadoDescricao = contatos::confereDescricao($request->input('descricao'));
        $contatos->codigoPessoa = $request->input('codP');
        $contatos->tipoContato = $request->input('tipo');
        $contatos->descricaoContato = $request->input('descricao');
        if (in_array(false, $resultadoDescricao)) {
            // Se alguma validação falhar
            Session::flash('mensagem', 'Por favor, informe um cadastro válido!');
            return redirect()->back();
        }
        if($contatos->save()) {
            // Se todas as validações passarem e o objeto for salvo
            Session::flash('mensagem', 'Cadastro salvo!');
            return redirect(url("contatos/"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contatos = contatos::find($id);
        $pessoas = Pessoas::all();
        return view("contatos.editarContatos",array("contatos"=>$contatos,"pessoas"=>$pessoas));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contatos = Contatos::find($id);
        $resultadoDescricao = contatos::confereDescricao($request->input('descricao'));
        $contatos->codigoPessoa = $request->input('codP');
        $contatos->tipoContato = $request->input('tipo');
        $contatos->descricaoContato = $request->input('descricao');
        if (in_array(false, $resultadoDescricao)) {
            // Se alguma validação falhar
            Session::flash('mensagem', 'Por favor, informe um cadastro válido!');
            return redirect()->back();
        }
        if($contatos->save()) {
            // Se todas as validações passarem e o objeto for salvo
            Session::flash('mensagem', 'Cadastro salvo!');
            return redirect(url("contatos/"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contatos = contatos::find($id);
        $contatos -> delete();
        return redirect(url("contatos/"));
    }
}
