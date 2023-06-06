<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
    <title>Document</title>
</head>
<body>
<div class="container">
<div class="row m-5">
  <!-- looping products -->
  <a type="button" class="btn btn btn-outline-danger mb-3" href="<?= base_url('/logout') ?>">Logout</a>
  <button type="button" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Keranjang
  </button>
  <a type="button" class="btn btn btn-outline-dark" href="<?= base_url('cart/input') ?>">Input Barang</a>
  <?php foreach($souvenir as $souvenir) : ?>
            <div class="col-sm-3">
              <div class="card mt-5 shadow">
                <img style="width:100%; height:200px; object-fit: cover;" src="<?=base_url('image/'.$souvenir->namafile);?>">
                
                <div class="d-flex justify-content-around">
                  <h3><?=$souvenir->namabrg?></h3>
                  <p><?=$souvenir->diskon?>%</p>
                </div>
                <div class="d-flex justify-content-around">
                  <p>Harga : <?=$souvenir->harga?></p>
                  <p>Stok : <?=$souvenir->stok?></p>
                </div>
                <form method="post" action="<?= base_url('cart/store') ?>">
                  <?= csrf_field(); ?>
                  <input type="hidden" value="<?=$souvenir->idbrg?>" name="idbrg">
                  <button type="submit" class="btn btn-dark m-3" style="width: 200px;">Pilih</button>
                </form>
              </div>
            </div>
          <?php endforeach; ?>
        <!-- end looping -->
        </div>

                <!-- modals -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Keranjang Belanja</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- tabel mulai -->
      <div class="modal-body">
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
      </div>

      <!-- tabel selesai -->
      <div class="modal-footer d-flex justify-content-between">
        <div class="text-start mr-5">
          Total Belanja : <?=$totalharga?>
        </div>
        <div class="">
          <a type="button" class="btn btn btn-outline-danger" href="<?= base_url('cart/delete') ?>">Hapus Kerangjang</a>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a type="button" class="btn btn btn-outline-dark" href="<?= base_url('/transaksi') ?>">Chekcout</a>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>
</body>
</html>