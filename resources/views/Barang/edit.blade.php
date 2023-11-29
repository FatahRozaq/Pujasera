<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <!-- Add Bootstrap CSS Link -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">Edit Barang</h1>

        <form action="/barangs/{{ $barang->KodeBarang }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="NamaBarang">Nama Barang:</label>
                <input type="text" class="form-control" name="NamaBarang" value="{{ $barang->NamaBarang }}" required>
            </div>

            <div class="form-group">
                <label for="Satuan">Satuan:</label>
                <input type="text" class="form-control" name="Satuan" value="{{ $barang->Satuan }}" required>
            </div>

            <div class="form-group">
                <label for="HargaSatuan">Harga Satuan:</label>
                <input type="number" class="form-control" name="HargaSatuan" value="{{ $barang->HargaSatuan }}" required>
            </div>

            <div class="form-group">
                <label for="Stok">Stok:</label>
                <input type="number" class="form-control" name="Stok" value="{{ $barang->Stok }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Barang</button>
        </form>
    </div>

    <!-- Add Bootstrap JS and Popper.js Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
