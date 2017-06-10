@extends('frame')
@section('style')
    <style>
        html, body {
            display: flex;
            justify-content: center;
            position: relative;
            align-items: center;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 84px;

        }
        .subtitle {
            color: #636b6f;
            font-size: 14px;
            font-weight: 300;
            letter-spacing: .1rem;
            padding: 30px 80px;
            border-bottom: 1px solid #ddd;
        }

        .options > a{
            font-size: 22px;
            display: inline-block;
            margin: 30px;
            text-decoration: none;
            color: #63819b;
            text-shadow: 0 0 white;
            transition: 1s;
        }
        .options > a:hover{
            text-shadow: 0 2px 3px #555;
        }
    </style>
@endsection
@section('body')
        <div class="content">
            <div class="title">
                Convênia
            </div>
            <div class="subtitle">
                Teste prático - DEV PHP JR - Allan Lancioni
            </div>
            <div class="options">
                <a href="{{url('/list/sellers')}}">Listar vendedores</a>
                <a href="{{url('/list/sales')}}">Listar anúncios</a>
                <a href="{{url('/sale')}}">Anunciar</a>
            </div>
        </div>
@endsection