<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    <h1>index (View Products)</h1>
    <div>
        <div>
            @if (session() -> has('success') )
                <div>{{session('success')}}</div>
            @endif
        </div>
        <table border="1">
            <tr>
                <td>ID:</td>
                <td>Name:</td>
                <td>Quantity:</td>
                <td>Price:</td>
                <td>Description;</td>
                <td>Created at:</td>
                <td>Edit:</td>
                <td>Delete:</td>
            </tr>
            @foreach ( $products as $product )
            <tr>
                <td>{{$product -> id}}</td>
                <td>{{$product -> name}}</td>
                <td>{{$product -> qty}}</td>
                <td>{{$product -> price}}</td>
                <td>{{$product -> description}}</td>
                <td>{{$product -> created_at}}</td>
                <td><a href="{{route('product.edit', ['product' => $product])}}">Edit</a></td>
                <td>
                    <form method="POST" action="{{route('product.destroy', $product)}}">
                    @csrf
                    @method('delete')
                    <button type="Submit" onclick="return confirm('are you sure want to delete?')">Delete</button>
                    </form>
                </td> 
            </tr>
            @endforeach
        </table>
        <a href="{{route("product.create")}}">Add New Product</a>
    </div>
</body>
</html>