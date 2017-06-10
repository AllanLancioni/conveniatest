@extends('frame')
@section('style')
    <style>
        h1{
            margin-bottom: 10vh;
        }
        p.describe{
            font-size: 16px;
            margin: 20px auto;
        }
        .content{
        }
    </style>
@endsection
@section('body')

<div>
    <h1>{{$sale->title}}</h1>

    <a class="button left" href="{{url('/')}}">Home</a>
    <a class="button right" href="{{url('/sale')}}">Vender</a>
    <div class="content">
        <div class="col-sm-4">
            <h2>Preço</h2>
            <h2>R$ {{$commission['gross']}}</h2>
            <h3>- R$ {{ $commission['discount'] }} <small>(taxa {{$commission['flat_rate_percent']}})</small></h3>
            <h2 style="font-size:40px">R$ {{$commission['liquid']}}</h2>
        </div>
        <div class="col-sm-4">
            <h2>Descrição</h2>
            <p class="describe">
                {{$sale->describe}}
            </p>
        </div>
        <div class="col-sm-4">
            <h2>Dados do Vendedor</h2>
            <table>
                <tbody>
                <tr>
                    <td>Nome: </td>
                    <td>{{$seller->name}}</td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>{{$seller->email}}</td>
                </tr>
                <tr>
                    <td>País: </td>
                    <td>{{$seller->country}}</td>
                </tr>
                <tr>
                    <td>Idade: </td>
                    <td>{{$seller->age}} anos</td>
                </tr>
                <tr>
                    <td>Id: </td>
                    <td>{{$seller->id}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection