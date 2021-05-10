<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //list($nome, $senha) = explode('&',$dados);
        //echo $dados;
        //dd($dados);
        //$result = file_get_contents('https://samarone-serv.herokuapp.com/api/login/',$id);
        //dd($result);
        //return $nome;
        echo "index";
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
        echo "store";
        /*$data = json_decode($request);
        dd($data);
        /*$url = 'https://samarone-serv.herokuapp.com/api/login/';
        //$url .= $id;
        $result = file_posT_contents($url,$id);*/
        echo "store";
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        list($nome, $senha) = explode('&',$id);
        $url = 'https://samarone-serv.herokuapp.com/api/login/';
        $url .= $id;
        $result = file_get_contents($url);
        $data = json_decode($result);
        if($data->Status == 0){
            $dadosUser = [
                'tipo' => $data->Tipo,
                'id' => $data->ID,
                'user' => $data->Nome,
                'token'=> $data->Token
            ];
            return view('inicio', $dadosUser);
        }else{
            return ($data->ERRO);
        }
        
        //return view('inicio',$dadosUser);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        /*$url = 'https://samarone-serv.herokuapp.com/api/login/';
        $url .= $id;
        $result = file_delete_contents($url);*/
        
    }
}
