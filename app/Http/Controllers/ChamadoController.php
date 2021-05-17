<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'dentro do index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo 'dentro do create';
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
            'idusuario' =>$request->iduser,
            'idprefeitura' =>$request->cidade,
            'tipo' =>$request->tipo,
            'status' =>$request->status,
            'rua'=>$request->rua,
            'bairro'=>$request->bairro,
            'cidade'=>$request->cidade
        ];
        $url = 'https://samarone-serv.herokuapp.com/api/chamado';
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
        //echo 'show';
        //$url = 'https://samarone-serv.herokuapp.com/api/chamado/'.$id;
        $url = 'http://127.0.0.1:9000/api/chamado/'.$id.'&22';
        //dd($url);
        $result = file_get_contents($url);
        $data = json_decode($result);
        return view('editar_chamado',['dados'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 'dentro do edit';
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
            "obervacao" => $request->observacao
        ];
        //dd($data);
        $url = 'https://samarone-serv.herokuapp.com/api/chamado/'.$id;
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
        echo 'dentro do destroy';
    }
}
