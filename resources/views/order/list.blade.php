@extends('layouts.app')

@section('content')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Партнер</th>
            <th scope="col">Стоимость</th>
            <th scope="col">Состав заказа</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order => $item)
            <tr>
                <td>
                    <a title="Редактировать" href="{{ route('edit', [$item['id']]) }}">{{ $item['id'] }}</a>
                </td>
                <td>{{ $item->partner->name }}</td>
                <td>{{ $item->fullPrice() }}</td>
                <td>
                    @foreach($item->productsList() as $i)
                        {{ $i->name }} <span class="text-muted">({{ $i->pivot->quantity }}x{{ $i->price }})</span><br>
                    @endforeach
                </td>
                <td>{{ $item->getStatus() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-12">
            {{ $orders->render() }}
        </div>
    </div>
@endsection