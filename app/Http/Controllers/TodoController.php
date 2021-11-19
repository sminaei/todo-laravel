<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::latest()->paginate(3);
        return view('todos.index', compact('todos'));
    }
    public function show(Todo $todo){
      return view('todos.show', compact('todo'));
    }
    public function create()
    {
        return view('todos.create');
    }
    public function store(Request $request){
      $request->validate([
          'title' => 'required',
          'description' => 'required',
      ]);
      Todo::create([
          'title' => $request->title,
          'description' => $request->description
      ]);
        alert()->success('task با موفقیت ایجاد شد.', 'با تشکر');
      return redirect()->route('todos.index');
    }
    public function edit(Todo $todo){
        return view('todos.edit', compact('todo'));
    }
    public function update(Request $request,Todo $todo)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
       $todo->update([
            'title' => $request->title,
            'description' => $request->description
        ]);
        alert()->success('task با موفقیت ویرایش شد.', 'با تشکر');
        return redirect()->route('todos.index');
    }
public function delete(Todo $todo){
$todo->delete();
    alert()->error('task با موفقیت حذف شد.', 'دقت کنید ');
    return redirect()->route('todos.index');
}
    public function complete(Todo $todo){
        $todo->update([
            'completed' => 1
        ]);
        alert()->success('task مورد نظر به وضعیت انجام شد تغییر کرد.', 'باتشکر ');
        return redirect()->route('todos.index');
    }
}
