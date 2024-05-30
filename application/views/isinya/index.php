<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    
    <?php if ($this->session->flashdata('berhasil')): ?>
        <h1 style="color: green;">
        <?php echo $this->session->flashdata('berhasil'); ?></h1>
    <?php endif; ?>
</head>
<body>
    <h1>Daftar Produk pada Toko Klontong</h1>
    <table class="table" border="1" cellpading="2" cellspacing="0" >
        <thead>
    <tr>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Satuan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <?php  $i = 1; ?>
        <?php foreach ($products as $product) : ?>
        <tr>
            <th scope="row"><?= $i;  ?></th>
            <td><?= $product['kode_produk']; ?></td>
            <td><?= $product['nama_produk']; ?></td>
            <td><?= $product['harga']; ?></td>
            <td><?= $product['satuan']; ?></td>
            <td>
            <button><a href="<?= base_url('belajar/delete/') . $product['kode_produk']; ?>"class="btn btn-danger">Hapus</a></button>
            <button><a href="<?= base_url('belajar/edit/') . $product['kode_produk']; ?>"class="btn btn-danger">Edit</a></button>
            </td>
        </tr>
        <?php $i++;  ?>
        <?php endforeach; ?>
    </table>
        </br>
    <!-- base_url arah controllers -->
    <button> <a href="<?= base_url('belajar/create'); ?>">Tambah Produk Baru</a></button>
</body>
</br>
</br>
<button> <a href="<?= base_url('admin'); ?>">logout</a></button>

</html>
