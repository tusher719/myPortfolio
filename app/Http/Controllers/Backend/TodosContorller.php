<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Todos;
use Illuminate\Http\Request;

class TodosContorller extends Controller
{
    // views
    public function TodosView(){
        $todos = Todos::orderBy('amount')->get();
        return view('backend.todos.todos',compact('todos'));
    }

    // Todos Store
    public function TodosStore(Request $request){
        $request->validate([
                'name' => 'required|unique:todos',
                'amount' => 'required',
            ], [
                'name.required'=>'Name is Required',
                'name.unique'=>'Todos Already Exists',
                'amount.required'=>'Amount is Required',
            ]);
        $todos = new Todos();
        $todos->name = $request->name;
        $todos->desc = $request->desc;
        $todos->amount = $request->amount;
        $todos->save();
        return response()->json([
            'status'=>'success',
        ]);
    }
}
