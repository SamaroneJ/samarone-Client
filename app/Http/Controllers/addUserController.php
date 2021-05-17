<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class addUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       echo "index - Cliente";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            "tipo" => $request->tipo,
            "nome" => $request->Nome,
            "email" => $request->email,
            "senha" => $request->senha
        ];
        $url = 'https://samarone-serv.herokuapp.com/api/addUser';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
        $response = curl_exec($ch);
        curl_close($ch);
        if($response == true){
            return view('welcome');
        }else{
            return response()->json([
                "Status" => 1,
                "ERRO"=> 'Erro no Cadastro'],
                201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $url = 'https://samarone-serv.herokuapp.com/api/addUser/'.$id;
        $result = file_get_contents($url);
        $data = json_decode($result);
        return view('editar_user',['dados'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $data = [
            "tipo" => $request->tipo,
            "nome" => $request->Nome,
            "email" => $request->email,
            "senha" => $request->senha
        ];
        $url = 'https://samarone-serv.herokuapp.com/api/addUser/'.$request->id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
        $response = curl_exec($ch);
        curl_close($ch);
        if($response == true){
            return view('welcome');
        }else{
            return response()->json([
                "Status" => 1,
                "ERRO"=> 'Erro na consulta'],
                201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
