<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class produtoController extends Controller
{
   public function cadastra(){
    return view('cadastraProduto');
   }
}
