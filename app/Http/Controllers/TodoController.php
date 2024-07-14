<?php
namespace App\Http\Controllers;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Log;
class TodoController extends Controller
{
    public function index(): View
    {
        $array = Todo::search('')->get()->toArray();
        $todos = [];

        foreach ($array as $todo) {
            $t = new Todo;
            $t->id = $todo['id'];
            $t->name = $todo['name'];
            $t->description = $todo['description'];
            $t->created_at = $todo['created_at'];
            $t->updated_at = $todo['updated_at'];
            array_push($todos, $t);
        }

        return view('todo')->with( ['todos' => $todos] );;
    }

    public function newTodo(): View
    {
        return view('todo-form');
    }

    public function store(Request $request): RedirectResponse
    {
        $todo = new Todo;
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->save();
        return redirect('/todos')->with('status', 'Todo Data Has Been inserted');
    }

    public function search(Request $request): View
    {
        Log::debug("SEARCHING");
        $search = '';
        if ($request->search) {
            $search = $request->search;
        }

        Log::debug($search);
        $array = Todo::search($search)->get()->toArray();
        Log::debug($array);
        $searched = [];

        foreach ($array as $todo) {
            $t = new Todo;
            $t->id = $todo['id'];
            $t->name = $todo['name'];
            $t->description = $todo['description'];
            $t->created_at = $todo['created_at'];
            $t->updated_at = $todo['updated_at'];
            array_push($searched, $t);
        }

        Log::debug($searched);
        return view('todo')->with( ['todos' => $searched ]);
    }

}
