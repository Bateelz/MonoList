<?php

 namespace  App\Traits;

trait ApiResponse
{

    public function errorResponse($msg,$code=422){
        return response()->json([
            "data"=>null,
            "error"=>true,
            "message"=>$msg
        ],$code);
    }


    public function successResponse($data,$msg=null,$code=200){
        return response()->json([
            "data"=>$data,
            "error"=>false,
            "message"=>$msg
        ],$code);
    }
}
