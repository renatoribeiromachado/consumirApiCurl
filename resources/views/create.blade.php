<h1>Cadastro de Produtos</h1>
<form action="{{ route('produto.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Cod</label><br>
    <input type="text" name="codigo" value="" placeholder="Insira um codigo"><br>
    <label>Nome</label><br>
    <input type="text" name="nome" value="" placeholder="Insira um nome"><br>
    <label>Valor</label><br>
    <input type="text" name="price" value="" placeholder="Insira um preço"><br>
    <label>Imagem</label><br>
    <input type="file" name="imagem" value="" placeholder="Insira uma imagem"><br>
    <input type="submit" value="Enviar">
</form>