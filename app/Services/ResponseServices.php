<?php
namespace App\Services;

class ResponseServices
{
    public function success($message,$data=[]){
        return response()->json([
            'code'=>200,
            'status'=>'success',
            'message'=>$message,
            'data'=>$data
        ]);
    }

    public function error($message,$data=[]){
        return response()->json([
            'code'=>200,
            'status'=>'error',
            'message'=>$message,
            'data'=>$data
        ]);
    }

    public function serverError($message,$data=[]){
        return response()->json([
            'code'=>500,
            'status'=>'error',
            'message'=>$message,
            'data'=>$data
        ]);
    }
}
