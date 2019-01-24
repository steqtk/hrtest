@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="text-center">
        <h2>Редактирование заказа №{{ $order->id }}</h2>
    </div>


    <form class="form-horizontal" method="post" action="{{ route('update', $order->id) }}">
        {!! csrf_field() !!}
        {{ method_field('POST') }}
        <input type="hidden" name="id" value={{$order->id}}>
        <div class="form-group">
            <label for="client_email" class="control-label col-xs-2">Email клиента</label>
            <div class="col-xs-9">
                <input type="text" name="client_email" class="form-control" value={{$order->client_email}}>
            </div>
        </div>

        <div class="form-group">
            <label for="partner" class="control-label col-xs-2">Партнер</label>
            <div class="col-xs-9">
                <select class="form-control" name="partner_id">
                    @foreach($partners as $partner)
                        @if ($partner->id  == $order->partner->id)
                            <option value="{{ $partner->id }}" selected>{{ $partner->name }}</option>
                        @else
                            <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-2">Продукты</label>
            <div class="col-xs-9">
                @foreach($order->products as $product)
                    <div>{{$product->name}} x {{$product->pivot->quantity}}</div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword" class="control-label col-xs-2">Статус заказа</label>
            <div class="col-xs-9">
                <select class="form-control" name="status">
                    @foreach($order::STATUSES as $code => $status)
                        @if ($order->status  == $code)
                            <option value="{{ $code }}" selected>{{ $status }}</option>
                        @else
                            <option value="{{ $code }}">{{ $status }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-2">Стоимость заказа</label>
            <div class="col-xs-9">
                <p class="form-control-static">{{ $order->fullPrice() }}</p>
            </div>
        </div>

        <div class="form-group text-center">
            <div class="col-xs-42 btn-row">
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <span><a class="btn btn-default btn-close" href="{{ route('list') }}">Отмена</a></span>
            </div>
        </div>
    </form>


@endsection