<html>
    <head>
        <title>Todos</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>

            @foreach ($todos as $todo)

            <tr>
                <td> {{ $todo->id }} </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            @endforeach
        </table>



    </body>
</html>
