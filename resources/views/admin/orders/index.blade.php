@extends('app')

@section('content')

<div class="container">
	<h3>{{$titulo}}</h3>
  
  <br/> 
  <br/> 

	<table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Total</th>
        <th>Data</th>
        <th>Itens</th>
        <th>Entregador</th>
        <th>Status</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <td>#{{ $order->id }}</td>
        <td>{{ $order->total }}</td>
        <td>{{ $order->created_at }}</td>
        <td>
          <ul>
            @foreach($order->items as $item)
              <li> {{$item->product->name}} </li>
            @endforeach
          </ul>
        </td>
        <td>
            @if($order->deliveryman)
              {{ $order->deliveryman->name }}
            @else
            - -
            @endif
        </td>
        <td>
        <?php
            switch( $order->status ) {
                case 0 : echo 'Pendente'; break;
                case 1:  echo 'A caminho'; break;
                case 2 : echo 'Entregue'; break;
                case 3:   echo 'Cancelado'; break;
            }?>
       </td>

        <td>
          <a href="{{ route('admin.orders.edit', ['id' => $order->id]) }}" class="btn btn-primary btn-sm">Editar</a>
        
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! $orders->render() !!}
</div>

@endsection