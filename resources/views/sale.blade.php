@extends('frame')
@section('style')
    <style>
        li.active{
            background: #eee;
        }
    </style>
@endsection
@section('body')
    <h1>Anunciar venda</h1>

    <form action="{{url('/sale').'/'.(!is_null($sale)?'update/'.$sale->id:'create')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="col-sm-4">
                <h3>Passo 1</h3>

                <h6>Escolha um cliente já cadastrado, a venda será anunciada no nome dele</h6>

                <ul class="nav">
                @foreach($sellers as $seller)

                    <li class="{{(!is_null($sale) && $sale->seller_id == $seller->id) ? 'active' : ''}}"><a href="#" class="nav-item"
                           data-references="{{$seller->id}}">{{$seller->name}}</a></li>

                @endforeach
                    <input type="hidden" name="seller_id" value="{{$sale->seller_id or ''}}">
                </ul>

            </div>
            <div class="col-sm-4">
                <h3>Passo 2</h3>
                <h6>Digite as informações sobre o produto</h6>
                <div class="input-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" name="title" maxlength="45" placeholder="Ex: Iphone 7" value="{{$sale->title or ''}}">
                </div>
                <div class="input-group">
                    <label for="price">Preço (em R$)</label>
                    <input type="number" class="form-control" name="price" min="0" placeholder="3000,00" step=".01" value="{{$sale->price or ''}}">
                </div>
                <div class="input-group">
                    <label for="describe">Descrição</label>
                    <textarea name="describe" rows="10">{{$sale->describe or ''}}</textarea>
                </div>
            </div>
            <div class="col-sm-4">
                <h3>Passo 3</h3>
                <h6>Confirmar taxa de comissão da venda</h6>

                <div id="commission">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Legenda</th>
                            <th>Valor</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Taxa fixa:</td>
                            <td id="flat_rate"></td>
                        </tr>
                        <tr>
                            <td>Bruto Venda:</td>
                            <td id="gross"></td>
                        </tr>
                        <tr>
                            <td>Líquido Venda:</td>
                            <td id="liquid"></td>
                        </tr>
                        </tbody>
                    </table>
                    <button id="submit">Confirmar e concluir</button>
                </div>
            </div>
        </div>
    </form>

@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        var update = '{{!is_null($sale)}}';

        $('.nav-item').click(function(){
            var val = $(this).attr('data-references')
            $.each($('.nav').find('li'), function() {
                $(this).removeClass('active');
            });
            $(this).parent().addClass('active');
            $('[name=seller_id]').val(val);
        });
        $('[name=price]').on('change', function(){
            var price = $(this).val();
            $.get('/sale/calc-commission/'+price).done(function(data){
                console.log(data);
                $('#flat_rate').html(data['flat_rate']);
                $('#gross').html(data['gross']);
                $('#liquid').html(data['liquid']);
            });
        });
        $('input').on('keydown', function(e){
            if(e.keyCode == 13){
                e.preventDefault();
                $(this).trigger('change');
            }
        });
        if(update=='1'){
            $('[name=price]').trigger('change');
        }
        $('#submit').click(function(e) {
            if ($('[name=seller_id]').val() == '') {
                e.preventDefault();
                alert('Escolha um autor primeiro!');

            }
            else if ($('[name=title]').val() == '')
            {
                e.preventDefault();
                alert('Digite um título');
            }
            else if ($('[name=price]').val() == '')
            {
                e.preventDefault();
                alert('Defina um preço');
            }
            else if ($('[name=describe]').val() == ''){
                e.preventDefault();
                alert('A descrição é obrigatória!');
            }
        });
    </script>
@endsection