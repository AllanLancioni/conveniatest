<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title or 'Convênia test'}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        h1{
            text-align: center;
            font-size: 50px;
            font-weight: 200;
        }
        h2{
            text-align: center;
            font-size: 30px;
            font-weight: 200;
        }
        :not(html)::-webkit-scrollbar-track, :not(body)::-webkit-scrollbar-track {
            background-color: #eee;
        }
        :not(html)::-webkit-scrollbar, :not(body)::-webkit-scrollbar {
            width: 8px;
            background: #eee;
        }
        :not(html)::-webkit-scrollbar-thumb, :not(body)::-webkit-scrollbar-thumb {
            background: #ccc;
        }
        h3{
            text-align: center;
            font-size: 22px;
            font-weight: 200;
            border-bottom: 1px solid #ddd;
            margin: 10px 30px 20px;
            padding: 5px;
        }
        .input-group{
            width: calc(100% - 20px);
            margin: 10px;
        }
        .input-group input, textarea{
            border-radius: 4px !important;
        }
        textarea{
            border: 1px solid #ccc;
            display: block;
            width: 100%;
        }
        h6{
            text-transform: uppercase;
            text-align: center;
        }
        button, .button{
            background-color: #fff;
            border: 2px solid #ddd;
            border-radius: 20px;
            font-weight: 600;
            padding: 10px 30px;
            margin: 30px auto;
            display: block;
            transition: 1s;
            color: #777;
        }
        button:hover, .button:hover{
            background: #eee;
            text-decoration: none;
        }
        .button.left, .button.right{
            position: absolute;
            margin: 0 50px;
            top: 30px;
        }
        .button.left{
            left: 0;
        }
        .button.right{
            right: 0;
        }
        .row{
            height: 80vh;
            margin: 0 auto;
            overflow: hidden;
        }
        .col-sm-4{
            min-height: 70vh;
        }
        .col-sm-4:not(:last-child){
            border-right: 1px solid #ddd;
            height: 100%;
            overflow: auto;
        }
    </style>
    @yield('style')

</head>
<body>
    @yield('body')
</body>
@yield('script')
</html>