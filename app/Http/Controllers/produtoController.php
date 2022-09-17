<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use Storage;

class produtoController extends Controller
{
    public function cadastra(){
        $categorias = Produto::all();
        return view('cadastraProduto', compact('categorias'));
    }

    public function listar(){
        $produtos = Produto::all();
        return view('listarProduto', compact('produtos'));
    }

    public function insere(Request $request){
        $dados = $request->except('_token', 'submit');
        $produto = new Produto();
        $this->validate($request, $produto->rules, $produto->messages); // aplica regras de validação da model

        if ($request->hasFile('imagem')){ // testa se foi enviado um imagem no formulário
            $novoNome = $request->file('imagem')->store('Imagens', 'public');
            $dados['imagem'] = $novoNome;
        }
        $insert = Produto::create($dados);
        if($insert)
            // Passa uma session flash success (sessão temporária)
            return redirect()->route('dashboard')->with('success', 'Produto inserido com sucesso!');
        else // Redireciona para a rota de cadstro com uma mensagem de erro
            return redirect()->route('cadastraProduto')->with(['error'=> 'Falha ao inserir produto']);
    }

    public function edita($id){
        $produto = Produto::find($id);
        return view('editaProduto', compact('produto'));
    }

    public function atualiza(Request $request, $id){
        $dados = $request->except('_token', 'submit');
        $produto = Produto::find($id);
        $this->validate($request, $produto->rules, $produto->messages); // aplica regras de validação da model

        if ($request->hasFile('imagem')){ // testa se foi enviado um imagem no formulário
            if($produto->getAttributes()['imagem'] !=NULL) // testa se tinha um nome de arquivo no banco
                Storage::disk('public')->delete($produto->getAttributes()['imagem']); // apaga a imagem anterior
            $novoNome = $request->file('imagem')->store('Imagens', 'public');
            $dados['imagem'] = $novoNome;
        }
        else    
            unset($dados['imagem']); // apaga a entrada imagem do array, para não inserir nada na coluna do banco
        $update = $produto->update($dados);
        if($update)
            return redirect()->route('dashboard')->with('success', 'Produto atualizado com sucesso!');
        else
            return redirect()->route('editaProduto', $id)->with(['erros'=> 'Falha ao editar']);
    }


    public function apaga($id){
        $produto = Produto::find($id);
        if($produto->getAttributes()['imagem'] !=NULL)
            Storage::disk('public')->delete($produto->getAttributes()['imagem']);
        $delete = $produto->delete();

        if($delete)
            return redirect()->route('dashboard')->with('success', 'Produto removido com sucesso!');
        else
            return redirect()->route('home', $id)->with(['erros'=> 'Falha ao remover produto']);
    }

}
