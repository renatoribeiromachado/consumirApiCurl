<h1>Produtos  - consumindo por api</h1>

@if(@session('success'))
    <p>{{ @session('success') }}</p>
@endif

@if(@session('error'))
    <p>{{ @session('error') }}</p>
@endif

<a href="{{ route('produto.create') }}">Cadastrar Novo</a>
<table>
    <thead>
        <tr>
            <th>Cod..</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Imagem</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
    </thead>
    @foreach($itens->data AS $item)
        <tbody>
            <tr>
                <td>{{ $item->codigo }}</td>
                <td>{{ $item->nome }}</td>
                <td>{{ $item->price }}</td>
                <td><img src="{{ asset('storage/'.$item->imagem) }}" alt="{{ $item->nome }}" style="max-width:79px;"/></td>
                <td><a href="{{ route('produto.edit', $item->id) }}">Editar</a></td>
                <td>
                    <form action="{{ route('produto.destroy', $item->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="Deletar">
                    </form>
                </td>
            </tr>
        </tbody>
    @endforeach
</table>