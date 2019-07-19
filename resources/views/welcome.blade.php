<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="" action="{{route('store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Enter Title"> <br/><br/><br/><br/>
        <input type="file" name="image"> <br><br/><br/><br/>
        <input type="submit" value="Upload Image">
    </form>

    <div class="card">
        <div class="card card-body">
            <table>
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach($images as $image)
                    <tr>
                        <td>{{$image->title}}</td>
                        <td>
                            <img src="{{ Storage::url($image->image)}}" alt="" width="100px">
                        </td>
                        <td>
                            <a href="">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</body>
</html>
