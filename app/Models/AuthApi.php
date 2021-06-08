<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AuthApi extends Model

{
    private $token;

    public function __construct()
    {
    
        $email      = 'renato@acessohost.com.br';
        $password   = 'adm!@#';
        
        $curl = curl_init();
        
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST   => 'POST',
            CURLOPT_POSTFIELDS      => [
                'email' => $email,
                'password' => $password,
            ],
            CURLOPT_URL             => 'http://127.0.0.1:8000/api/auth'        
        ]);
        $this->token = json_decode(curl_exec($curl));
        curl_close($curl);

    }

    public function getToken()
    {
        return $this->token;
    }

    public function getProducts ()
    {

        $token = $this->token;
        $curl = curl_init();
    
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST   => 'GET',
            CURLOPT_URL             => 'http://127.0.0.1:8000/api/produtos',
            CURLOPT_HTTPHEADER      => [
                "Authorization: Bearer" .$token->token
            ]
        ]);
        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        return $response = $response->data;

    }

    public function insertProduct ($data)
    {

        $token = $this->token;
        $curl = curl_init();
    
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST   => 'POST',
            CURLOPT_URL             => 'http://127.0.0.1:8000/api/produtos',
            CURLOPT_POSTFIELDS      => $data,
            CURLOPT_HTTPHEADER      => [
                "Authorization: Bearer" .$token->token
            ]
        ]);

        $response = curl_exec($curl);

        curl_close($curl);
    }

    public function editProducts($id)
    {
        
        $token = $this->token;
        $curl = curl_init();
    
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_URL             => 'http://127.0.0.1:8000/api/produtos/'.$id,
            CURLOPT_HTTPHEADER      => [
                "Authorization: Bearer" .$token->token
            ]
        ]);

        return $response = json_decode(curl_exec($curl));
        curl_close($curl);

    }

    public function updateProducts($data, $id){

        $token  = $this->token;
        $curl   = curl_init();

        $file = fopen($filename, 'r');
        $size = filesize($filename);
        $filecontent = fread($file, $size);
        
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => 'PUT',
            CURLOPT_URL            => 'http://127.0.0.1:8000/api/produtos/'.$id,
            //CURLOPT_POSTFIELDS      => "codigo=" . $request->codigo . "&nome=" . $request->nome . "&price=" .$request->price. "&imagem" .json_encode($imagem),
            CURLOPT_POSTFIELDS     => http_build_query($data),
            CURLOPT_HTTPHEADER     => [
                "Authorization: Bearer" .$token->token
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

    }

    public function deleteProduct($id)
    {

        $token = $this->token;
        $curl = curl_init();
    
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_URL             => 'http://127.0.0.1:8000/api/produtos/'.$id,
            CURLOPT_HTTPHEADER      => [
                "Authorization: Bearer" .$token->token
            ]
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

    }

}

