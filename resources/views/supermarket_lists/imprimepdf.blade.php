<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smartpantry</title>
</head>
<body>
    <div>

    <h1>Detalhes da Lista de Compras</h1>
    <p><strong>Nome da Lista:</strong>{{ $supermarketList->list_name }} </p>
    <p><strong>Data de Criação:</strong> {{ $supermarketList->created_at }}</p>

    <h2>Produtos:</h2>
    
        @foreach ($supermarketList->products as $product)
        <div>
            <input style="display:inline-block" type="checkbox" name="check" id="check"> 
            <span style="display:inline-block; width: 200px;">&nbsp;&nbsp;&nbsp;{{ $product->product_name }}</span>
            <span style="display:inline-block">&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp; Quantidade &nbsp;&nbsp; : &nbsp;&nbsp;</span>
            <span style="display:inline-block">{{ $product->product_quantity }}</span>
        </div>    
        @endforeach
    
    </div>
</body>
</html>