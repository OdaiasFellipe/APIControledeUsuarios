<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        
        $user = User::find(auth()->user()->id);
        
      
        $user->name = $request->input('name');
        $user->save();

       
        return response()->json([
            'message' => 'User atualizado com sucesso!'
        ]);
    }
}