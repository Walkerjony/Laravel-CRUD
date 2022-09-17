<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <form method="POST" action="../atualiza/{{$produto['id']}}" enctype="multipart/form-data">
                    @csrf
                 <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text"  class="form-control" name = "nome" placeholder="Nome: ">
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" name = "categorias">
                    <option>Eletrônico</option>
                    <option>Placa de Vídeo</option>
                    <option>Processador</option>
                    <option>Placa-mãe</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                <div class="custom-file">
                <input type="file" class="custom-file-input" name ="imagem">
                <label class="custom-file-label" for="customFile">Escolher Imagem</label>
                </div>
                </div>
                
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name = "descricao" rows="3"></textarea>
                </div>
                <input class='btn btn-outline-dark' type="submit" name="submit" value="Enviar">
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
'