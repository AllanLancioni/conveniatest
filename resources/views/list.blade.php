
@extends('frame')

@section('style')
    <style>

        table th{
            text-transform: capitalize;
            margin-bottom: 4px;
            text-align: left;
        }
        table td, table th {
            padding: 2px 5px;
            margin: 0;
            border: 0;
        }
        table tr:hover{
            background: #fafafa;
        }
        .content > *{
            margin: 40px auto;
            max-width: 80vw;
        }
        .nowrap{
            white-space: nowrap;
        }
    </style>
@endsection
@section('body')

    <h1>Listando {{$name or ''}}</h1>

    @if(!is_null($message))
        <div class="alert alert-success" style="margin: 0 100px">
            {{$message}}
        </div>
    @endif

    <a class="button left" href="{{url('/')}}">Home</a>
    <a class="button right" href="{{url('/sale')}}">Vender</a>

    <div class="content">

    @if(false)

    @endif
        {{session(['success'])}}
    @if(isset($collection))

        @if(count($collection) == 0)
            <h2>Nenhum {{substr($name, 0, -1)}} cadastrado</h2>
        @else

        <h4 align="right">Mostrando {{count($collection)}} registros</h4>

        <table class="table">

            <thead>
                <tr>
                @foreach($collection[0]->getAttributes() as $key=>$value)

                    <th>{{$key}}</th>
                @endforeach
                    <th>Options</th>
                </tr>
            </thead>

            <tbody>
            @foreach($collection as $item)
                <tr>
                @foreach($item->getAttributes() as $key=>$value)
                    <td class="{{($key=='title' || $key == 'name') ? 'nowrap':''}}">{{$value}}</td>
                @endforeach
                    <td class="nowrap">
                    @if($type==2)
                        <a class="btn btn-primary" href="{{url('/details/'.$item->id)}}">Detalhes</a>
                        <?php $typeName = 'sale' ?>
                        <a class="btn btn-primary" href="{{url('update/'.$typeName.'/'.$item['id'])}}">Alterar</a>
                    @else
                        <?php $typeName = 'seller' ?>
                    @endif
                        <a class="btn btn-danger"  href="{{url('delete/'.$typeName.'/'.$item['id'])}}">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @endif
    @endif

    </div>
@endsection