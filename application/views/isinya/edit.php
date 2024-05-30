<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Prodak</h2>
        
        <form action="<?= base_url('belajar/edit/' . $product->kode_produk) ?>" method="post" enctype="multipart/form-data">
        
            <div class="form-group">
                <label for="kode_produk">Kode Produk:</label>
                <input type="text" class="form-control" id="kode_produk" name="kode_produk" value="<?php echo $product->kode_produk; ?>" required>
            </div>
            <div class="form-group">
                <label for="nama_produk">Nama produk:</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $product->nama_produk; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga Produk:</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $product->harga; ?>" required>
            </div>
            <div class="form-group">
            <label for="satuan">Satuan:</label>
            <select  id="satuan" name="satuan">
            <option value="dus" <?= $product->satuan == 'dus' ? 'selected' : 'dus'; ?>>Dus</option>
            <option value="renceng" <?= $product->satuan  == 'renceng' ? 'selected' : 'renceng'; ?>>Renceng</option>
            <option value="saset" <?= $product->satuan  == 'saset' ? 'selected' : ''; ?>>Saset</option>
            <option value="buah" <?= $product->satuan  == 'buah' ? 'selected' : ''; ?>>Buah</option>
         </select><br>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
<style>
     body{
        margin-left: 70vh;
    }
</style>
</html>

