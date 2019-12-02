@extends('layouts.app')
@section('title')
Cadastro Produto
@endsection
@section('content')

<section class="container">
    <form action="/produtos/cadastrar" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nameProduct">Nome do Produto</label>
            <input class="form-control" type="text" name="nameProduct" id="nameProduct">
        </div>
        <div class="form-group">
            <label for="descriptionProduct">Descrição do Produto</label>
            <textarea class="form-control" type="text" name="discription" id="discription"></textarea>
        </div>
        <div class="form-group">
            <label for="quantityProduct">Quantidade do Produto</label>
            <input class="form-control" type="number" name="quantity" id="quantity">
        </div>
        <div class="form-group">
            <label for="priceProduct">Preço do Produto</label>
            <input class="form-control" type="number" step='.01' name="price" id="price">
        </div>
        <div class="form-group">
            <label for="imgProduct">Imagem do Produto</label>
            <input class="form-control" type="file" name="img" id="img">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Cadastrar Produto</button>
        </div>
    </form>

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