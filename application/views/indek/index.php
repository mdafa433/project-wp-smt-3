<!DOCTYPE html>
<html>
<head>
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    
    <?php if ($this->session->flashdata('berhasil')): ?>
        <h1 style="color: green;">
        <?php echo $this->session->flashdata('berhasil'); ?></h1>
    <?php endif; ?>
</head>
<body>
    <table class="table table-striped" >
        <thead>
    <tr>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Satuan</th>
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
        </tr>
        <?php $i++;  ?>
        <?php endforeach; ?>
    </table>
        </br>
    <!-- base_url arah controllers -->
</body>
</br>
</br>
</html>
