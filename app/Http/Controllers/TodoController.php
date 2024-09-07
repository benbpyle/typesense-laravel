<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Typesense\Client;

class TodoController extends Controller
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index(): View
    {
        $todos = Todo::all();

        Log::debug("TODOS");
        Log::debug($todos);
        /*$array = Todo::search('')->get()->toArray();*/
        /*$todos = [];*/
        /**/
        /*foreach ($array as $todo) {*/
        /*    $t = new Todo;*/
        /*    $t->id = $todo['id'];*/
        /*    $t->name = $todo['name'];*/
        /*    $t->description = $todo['description'];*/
        /*    $t->created_at = $todo['created_at'];*/
        /*    $t->updated_at = $todo['updated_at'];*/
        /*    array_push($todos, $t);*/
        /*}*/

        return view('todo')->with(['todos' => $todos]);;
    }

    public function newTodo(): View
    {
        return view('todo-form');
    }

    public function store(request $request): redirectresponse
    {
        $todo = new todo;
        $todo->id = Uuid::uuid4()->toString();
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->save();
        return redirect('/todos')->with('status', 'todo data has been inserted');
    }

    public function search(request $request): view
    {
        $search = '';
        if ($request->search) {
            $search = $request->search;
        }

        $values = $this->client->collections["todos"]->documents->search(
            [
                'q' => $search,
                'query_by' => 'name,description',
                'sort_by' => 'created_at:desc',
            ]
        );

        $searched = [];

        foreach ($values['hits'] as $todo) {
            $item = $todo['document'];
            $t = new Todo;
            $t->id = $item['id'];
            $t->name = $item['name'];
            $t->description = $item['description'];
            $t->created_at = $item['created_at'];
            $t->updated_at = $item['updated_at'];
            array_push($searched, $t);
        }

        log::debug($searched);
        return view('todo')->with(['todos' => $searched]);
    }
}
