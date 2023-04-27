<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    use HasFactory;
    public static function buscar($conteudoPesquisa)
    {
        return self::where('tipoContato', 'LIKE', '%'.$conteudoPesquisa.'%')
            ->orWhere('descricaoContato', 'LIKE', '%'.$conteudoPesquisa.'%')
            ->get();
    }
    public static function criarContato($codigoPessoa, $tipoContato, $descricaoContato) {
        $contato = new contatos();
        $contato->codigoPessoa = $codigoPessoa;
        $contato->tipoContato = $tipoContato;
        $contato->descricaoContato = $descricaoContato;
    
        if ($contato->save()) {
            return $contato->id;
        } else {
            return false;
        }
    }
    public static function atualizarContato($id,$codigoPessoa, $tipoContato, $descricaoContato) {
        $contato = Contatos::find($id);
        $contato->codigoPessoa = $codigoPessoa;
        $contato->tipoContato = $tipoContato;
        $contato->descricaoContato = $descricaoContato;
    
        if ($contato->save()) {
            return $contato->id;
        } else {
            return false;
        }
    }
    public function confereDescricao($descricao)
    {
        if($descricao == " " || mb_strlen($descricao) < 11) {
            return [
                false
            ];
        } else {
            return [
                true
            ];
        }
    }
    public function pessoa()
    {
        return $this->belongsTo(Pessoas::class, 'codigoPessoa', 'id');
    }

}
