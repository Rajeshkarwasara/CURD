<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;

            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        table {
            width: 85%;
            margin: auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .student {
            width: 85%;
            margin: auto;
            height: 15vh;
            margin-top: 35px;
        }

        a#student {
            padding: 10px;
            background: #565689;
            border-radius: 5px;
        }

        td#action {
            display: flex;
        }

        .mt-4 {
            width: 80% !important;
            margin: auto;
            margin-bottom: 10px;
        }

        td#action {
            border: none;
            margin-top: 12px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .main {
            display: flex;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        button#edit {
            border-radius: 5px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        img#studentimg {
            width: 80px;
            height: 80px;
            border-radius: 50px;
        }

        h5#staticBackdropLabel {
            color: black;
        }

        button#deletebtn {
            height: 38px;
            color: red;
            border-radius: 5px
        }

        tr:hover {
            background-color: #ddd;
        }

        caption {
            font-size: 1.5em;
            margin: 10px 0;
        }

        @media (max-width: 768px) {
            table {
                width: 100%;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <table>
        <div class="student">
            <a id="student" href="{{route('user.create')}}">create student</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>profile</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>

                    <td>{{$item->number}}</td>
                    <td><img id="studentimg" src="{{asset('profiles/'.$item->profile)}}" alt="" style=>
                    </td>
                    <td id="action"><button id="edit"><a href="{{route('user.edit',$item->id)}}">Edite</a></button>&nbsp;&nbsp;&nbsp;&nbsp;

                        <form action="{{route('user.destroy',$item->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                            <button id="deletebtn">Delete</button>
                        </form>
                        &nbsp;&nbsp;&nbsp;&nbsp;

                    </td>
                </tr>

            @endforeach



        </tbody>

    </table>
    <div class="student">
        {{$user->links()}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>