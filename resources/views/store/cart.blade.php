@extends('store.template')

@section('content')
    <div class="container text-center">
        <div class="page-header"><br><br>
            <h1><i class="fa fa-shopping-cart"></i>Carrito de compras</h1><hr>
        </div>

        <div class="table-cart">
            @if(count($cart))
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Quitar</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($cart as $item)
                        <tr>
                            <td><img src="{{ $item->foto }}"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price,2) }}</td>
                            <td>
                                <input 
                                type="number"
                                min="1"
                                max="100"
                                value="{{ $item->quantity }}"
                                id="product_{{ $item->id }}">
                                <a 
                                   href="#" 
                                   class="btn btn-warning btn-update-item"
                                   data-href="{{ route('cart-update', $item->slug) }}"
                                   data-id="{{ $item->id }}">
                                    <i class="fa fa-refresh"></i>
                                </a>
                            </td>
                            <td>{{ number_format($item->price * $item->quantity,2) }}</td>
                            <td>
                                <a href="{{ route('cart-delete', $item->slug) }}" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <h3> <span class="badge badge-success">Total: ${{ number_format($total,2) }}</span></h3>
        </div>
                <p>
                <a href="{{route('home')}}" class="btn  btn-primary"><i class="fa fa-chevron-circle-left"></i> Regresar</a>
                <a href="{{route('cart-trash')}}" class="btn  btn-danger" disable><i class="fa fa-trash"></i> Vaciar carrito</a>
                @auth
                <a href="{{route('order-detail')}}" class="btn  btn-primary">Continuar <i class="fa fa-chevron-circle-right"></i> </a>
                @endauth
            </p>
            </div>
            @else
                <h3>
                    <span class="label label-warning">No hay productos en el carrito</span>
                </h3><hr>
                <p>
                <a href="{{route('home')}}" class="btn  btn-primary"><i class="fa fa-chevron-circle-left"></i> Regresar</a>
                <a href="{{route('cart-trash')}}" class="btn  btn-danger disabled" disable><i class="fa fa-trash"></i> Vaciar carrito</a>
                @auth
                <a href="{{route('order-detail')}}" class="btn  btn-primary disabled">Continuar <i class="fa fa-chevron-circle-right"></i> </a>
                @endauth
            </p>
            @endif
        </div>
            
            <hr>
    </div>
@stop