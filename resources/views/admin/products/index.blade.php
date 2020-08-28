@extends('layouts.app')

@section('content')

<a href="{{route('admin.products.create')}}" class="btn btn-lg btn-success">Criar Produto</a>

<div class="table-responsive">

    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Loja</th>
                <th>Ações</th>
            </tr>
        <tbody>
            @foreach($products as $product)

            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>R$ {{number_format($product->price, 2, ',', '.')}}</td>
                <td>{{$product->store->name}}</td>
                <td>

                    <div class="btn-group">

                        <a href="{{route('admin.products.edit', ['product' => $product->id])}}"
                            class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{route('admin.products.destroy', ['product' => $product->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>

                    </div>


                </td>
            </tr>

            @endforeach
        </tbody>
        </thead>
    </table>

    {{$products->links()}}

</div>


@endsection