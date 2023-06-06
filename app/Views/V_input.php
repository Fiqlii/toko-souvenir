<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form method="post" action="<?= base_url('souvenir/store') ?>" enctype="multipart/form-data"">
                <div class="card p-5">
                    <div class="form-group">
                        <label for="namabrg">Nama Barang</label>
                        <input type="text" class="form-control" id="namabrg" name="namabrg" value="<?= old('namabrg'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= old('harga'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="<?= old('stok'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="diskon">diskon</label>
                        <input type="number" class="form-control" id="diskon" name="diskon" value="<?= old('diskon'); ?>">
                    </div>


                    <div class="form-group">
                        <label for="namafile">namafile</label>
                        <input type="file" class="form-control" id="namafile" name="namafile" value="<?= old('namafile'); ?>">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Simpan" class="mt-2" />
                    </div>
                </div>
                </form>
    </div>
</body>
</html>