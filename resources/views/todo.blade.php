<html>
    <head>
        <title>Todos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <a href='/todos/new'>New Todo</a>

        <form class="form-inline my-2 my-lg-0" method="post" action="{{url('/todos/search')}}">
        @csrf
            <input class="form-control mr-sm-2" id="search" name="search" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <br />

                <table class="table">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created</th>
                        <th scope="col">Updated</th>
                    </tr>

                    @foreach ($todos as $todo)
                        <tr>
                            <td> {{ $todo->uuid }} </td>
                            <td> {{ $todo->name }} </td>
                            <td> {{ $todo->description }} </td>
                            <td> {{ $todo->created_at }} </td>
                            <td> {{ $todo->updated_at }} </td>
                        </tr>
                    @endforeach
                </table>



    </body>
</html>
