@extends('layouts.app')

<!-- edita dinamicamente o titulo da pagina -->
@section('title')
Editar Produto  <!-- Titulo da pagina -->
@endsection
<!-- edita dinamicamente o titulo ca pagina -->

@section('content')

@if(isset($product))

<section class="container">
    <form action="/produtos/atualizar" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="idProduct" value="{{$product->id}}" hidden>
        <div class="form-group">
            <label for="nameProduct">Nome do Produto</label>
            <input class="form-control" type="text" name="nameProduct" 
            id="nameProduct" value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label for="descriptionProduct">Descrição do Produto</label>
            <textarea class="form-control" type="text" name="discription" 
            id="discription">{{$product->discription}}</textarea>
        </div>
        <div class="form-group">
            <label for="quantityProduct">Quantidade do Produto</label>
            <input class="form-control" type="number" name="quantity" 
            id="quantity" value="{{$product->quantity}}">
        </div>
        <div class="form-group" >
            <label for="priceProduct">Preço do Produto</label>
            <input class="form-control" type="number" step='.01' name="price" 
            id="price" value="{{$product->price}}">
        </div>
        <div class="form-group">
            <label for="imgProduct">Imagem do Produto</label>
            <input class="form-control" type="file" name="img" id="img"
            >
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Atulizar Produto</button>
        </div>
    </form>
    @elseif(isset($result))
    
    @else
    <h1>O produto não foi encontrado!</h1>
    
    @endif

    <div class="row">
        <div class="col-md-12">
            @if(isset($result))
                @if($result)
                    <h1>Deu certo!!!</h1>
                @else
                    <h1>Não deu certo Idiota!!!</h1>
                @endif
            @endif
        </div>
    </div>

</section>

@endsection