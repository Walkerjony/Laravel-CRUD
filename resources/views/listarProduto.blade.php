<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listagem') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <table class="table table-bordered">
                <thead class = "table-dark">
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Remover</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                    <tr>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->categorias}}</td>
                    <td>{{$produto->descricao}}</td>
                    <td><img src='{{asset("storage/{$produto->imagem}") }}' alt="{{$produto->imagem}}" style = height=42 width= 50></td>

                    <td><a href="edita/{{$produto['id']}}">
                        <span class='material-icons'> Editar </span>
                        </a>
                    </td>
                    <td><a href="apaga/{{$produto['id']}}" >
                        <span class='material-icons'> Remover </span>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                 </div>
                </div>
             </div>
        </div>
</x-app-layout>
