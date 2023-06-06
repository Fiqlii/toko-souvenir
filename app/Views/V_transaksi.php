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
        <table border=2 width="50%" class="table table-bordered  table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah Jual</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Harga Setelah Diskon</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ( $cart == null ) : ?>
                        Keranjang Anda Kosong
                    <?php else : ?>
                        <?php foreach($cart as $index=>$cart) : ?>
                            <tr class="bg-light">
                                <td><?php echo $cart['nama'] ?></td>
                                <td><?php echo $cart['jumlahjual'] ?></td>
                                <td><?php echo $cart['harga']  ?></td>
                                <td><?php echo $cart['diskon'] ?></td>
                                <td><?php echo ($cart['harga'] - ($cart['harga']*$cart['diskon']/100)) ?></td>
                                <td><?php echo ((($cart['harga'] - ($cart['harga']*$cart['diskon']/100)) * $cart['jumlahjual'])) ?></td>
                            </tr>

                        <?php endforeach ?>
                        <?php endif; ?>
                    </tbody>
                </table>

                <form method="post" action="<?= base_url('transaksi/store') ?>">
                <div class="card p-5">
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="hp">No Telepon</label>
                        <input type="text" class="form-control" id="hp" name="hp" value="<?= old('hp'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= old('kecamatan'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input type="text" class="form-control" id="kota" name="kota" value="<?= old('kota'); ?>">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Simpan" class="mt-2" />
                    </div>
                </div>
                </form>

                </div>
</body>
</html>