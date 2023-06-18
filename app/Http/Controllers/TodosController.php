<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    /**
     * index muestra todas tas tareas
     * store guardar tareas
     * update actualizae tareas
     * destroy eliminar tarea
     * edit muestra formulario de edición de tarea
     * 
     */
    public function index(){
        //method, show all notes saved, return array in result
        $todos = Todo::all();
        return view('todos.index', ['todos' => $todos] );
    }

     public function store(Request $request){
        //validate field
        $request->validate([
            'title'=> 'required|min:3|max:45'
        ]);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();

        //redirect and send message
        return redirect()->route('todos')->with('success','Tarea creada correctamente');

     }

     public function show($id){
        //method, show one note saved, return array with result
        $todo = Todo::find($id);
        return view('todos.show', ['todo' => $todo] );
     }

     public function update(Request $request, $id){
        //method, show one note saved, return array with result
        $todo = Todo::find($id);

        //update
        $todo->title = $request->title;
        $todo->save();

       // dd($todo); //console.log
        //dd($request);//console.log
        $todos = Todo::all();
        //return view('todos.index', ['success'=>'Tarea creada correctamente actualizada'] );
        return redirect()->route('todos')->with('success','Tarea correctamente actualizada');

     }

     public function destroy($id){
       $todo = Todo::find($id);
       $todo->delete();
       return redirect()->route('todos')->with('success','Tarea '.$id. ' eliminada');
 
     }
}
