<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\ResponseServices;
use App\Models\User;

class UserController extends Controller
{
    public function index(ResponseServices $response){
        try{
            $users=User::all();
            return $response->success('',$users);
        }
        catch(\Exception $e){
            return $response->serverError('Server Error');
        }
    }

    public function userDetail(Request $request,ResponseServices $response){
        try{
            $user=User::find($request->id);
            return $response->success('',$user);
        }
        catch(\Exception $e){
            return $response->serverError('Server Error');
        }
    }

    public function saveUser(Request $request,ResponseServices $response){
        try{
            $res=User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password
            ]);
            return $response->success('user saved successfully',$res);
        }
        catch(\Exception $e){
            return $response->serverError('Server Error');
        }
    }

    public function updateUser(Request $request,ResponseServices $response){
        try{
            $res=User::where('id',$request->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
            return $response->success('user updated successfully',User::find($request->id));
        }
        catch(\Exception $e){
            return $response->serverError('Server Error');
        }
    }

    public function deleteUser(Request $request,ResponseServices $response){
        try{
            $res=User::where('id',$request->id)->delete();
            return $response->success('user deleted successfully');
        }
        catch(\Exception $e){
            return $response->serverError('Server Error');
        }
    }
}
