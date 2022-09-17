<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nome', 'categorias', 'imagem', 'descricao'];

    public $rules = [
        'nome' => 'required|min:3|max:100',
        'categorias' => 'required',
        'descricao' => 'required|min:10|max:100',
        ];

    public $messages = [
        'nome.required' => 'O campo nome é obrigatório',
        'nome.min' => 'O campo nome deve ter no mínio 3 caracteres',
        'categorias.required' => 'O campo categoria é obrigatório',
        'descricao.required' => 'O campo descrição é obrigatório',
        ];
}
