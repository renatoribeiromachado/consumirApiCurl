<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuthApi;

class ProdutoController extends Controller
{
    private $token;

    public function __construct(){
        
        $auth = new AuthApi;
        $this->token = $auth->getToken();

    }

    public function index()
    {
        
        $data = new AuthApi;
        $itens = $data->getProducts();
        return view('index', compact('itens'));
        
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        $data = [
            'user_id' => 1,
            'codigo'  => $request->codigo,
            'nome'    => $request->nome,
            'price'   => str_replace(',','.', $request->price),
            'data'    => date('Y-m-d'),
            'imagem'  => new \CURLFile($request->imagem)
        ];

        //dd($data);

        $insert = new AuthApi;
        $insert->insertProduct($data);

        if($insert)
            return redirect()->route('produtos.index')
            ->with(['success' => 'Cadastrado com sucesso!']);

        return redirect()->route('produtos.index')
        ->with(['error' => 'Não foi possivel Cadastrar']);

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = new AuthApi;
        $itens = $data->editProducts($id);

        return view('edit', compact('itens'));
    }

    public function update(Request $request, $id)
    {
        //$img = $request->file('imagem')->isValid();
        $data = [
            'user_id' => 1,
            'codigo'  => $request->codigo,
            'nome'    => $request->nome,
            'price'   => str_replace(',','.', $request->price),
            'data'    => date('Y-m-d'),
            'imagem'  => new \CURLFile($request->iamgem)
        ];

        $update = new AuthApi;
        $update->updateProducts($data, $id);

        if($update)//true ou false
            return redirect()->route('produtos.index')
            ->with(['success' => 'Atualizado com sucesso!']);

        return redirect()->route('produtos.index')
        ->with(['error' => 'Não foi possivel Cadastrar']);

    }

    public function destroy($id)
    {
        $delete = new AuthApi;
        $delete->deleteProduct($id);
        
        if($delete)
            return redirect()->route('produtos.index')
            ->with(['success' => 'Deletado com sucesso!']);

        return redirect()->route('produtos.index')
        ->with(['error' => 'Não foi possivel Deletar']);
    }
}