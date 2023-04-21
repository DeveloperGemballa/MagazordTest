<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    use HasFactory;
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
