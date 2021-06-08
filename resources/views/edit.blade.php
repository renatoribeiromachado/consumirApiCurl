<h1>Editando Produto</h1>
@foreach($itens AS $item)
    <form action="{{ route('produto.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Cod</label><br>
        <input type="text" name="codigo" value="{{ $item->codigo }}"><br>
        <label>Nome</label><br>
        <input type="text" name="nome" value="{{ $item->nome }}"><br>
        <label>Valor</label><br>
        <input type="text" name="price" value="{{ $item->price }}"><br>
        <label>Imagem</label><br>
        <input type="file" name="imagem" value="" placeholder="Insira nova imagem"><br>
        <input type="submit" value="Atualizar">
    </form>
@endforeach