<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
</head>
<body>
    <h1>Edit a product</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="POST" action="{{route("product.update", ['product' =>$product])}}">
        @csrf
        @method('put')
        <div>
            <label>Insert Name:</label>
            <input type="text" name="name" placeholder="name" value="{{$product -> name}}"/>
        </div>
        <br>
        <div>
            <label>Insert Quantity:</label>
            <input type="text" name="qty" placeholder="Quantity" value="{{$product -> qty}}"/>
        </div>
        <br>
        <div>
            <label>Insert Price:</label>
            <input type="text" name="price" placeholder="Price" value="{{$product -> price}}"/>
        </div>
        <br>
        <div>
            <label>Insert Description:</label>
            <input type="text" name="description" placeholder="Description" value="{{$product -> description}}"/>
        </div>
        <div>
            <input type="submit" value="Update"/>
        </div>
    </form>
</body>
</html>