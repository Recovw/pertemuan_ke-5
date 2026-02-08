<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Item Management</title>
</head>
<body class='bg-light'>
    <nav class='navbar navbar-dark bg-primary mb-4'>
        <div class='container'>
            <a href="/" class='navbar-brand'>Item Management</a>
        </div>
    </nav>

    <div class='container'>
        <div class='card shadow-sm'>
            <div class='card-header bg-white d-flex justify-content-between py-3'>
                <h4 class=mb-0>Item List</h4>
                <a href="{{route('showCreate')}}" class='btn btn-primary'>Add New Item</a>
            </div>
            <div class='card-body'>
                <table class='table table-striped table-bordered'>
                    <thead class='dark'>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($itemList as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->stock}}</td>
                            </tr>
                            <a href="{{route('showUpdate', $item->id)}}" class='btn btn-warning'>Edit</a>
                            <form action="{{route('delete', $item->id)}}" method='POST'>
                                @csrf
                                @method('DELETE')
                                <button class='btn btn-danger'>Delete</button>
                            </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>