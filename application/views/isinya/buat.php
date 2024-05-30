<!DOCTYPE html>
<html>
<head>
    <title>Input Produk Baru</title>
</head>
<body>
    <h1>Input Produk Baru</h1>
    <table>
    <tr>
        <td>
            <!-- base_url arah controllers -->
            <form method="post" action="<?= base_url('belajar/create'); ?>">
                <label  for="kode_produk">Kode Produk :</label>
                <input type="text" name="kode_produk" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" name="nama_produk" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="harga">Harga Produk:</label>
                <input type="number" name="harga" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="satuan">Satuan:</label>
                <select name="satuan" required>
                    <option value="dus">Dus</option>
                    <option value="renceng">Renceng</option>
                    <option value="saset">Saset</option>
                    <option value="buah">Buah</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button><a href="<?= base_url('belajar')?>"class="btn btn-danger">Kembali</a></button>
            </form>
        </td>
    </tr>
</table>

</body>
<style>
     body{
        margin-left: 70vh;
    }
</style>
</html>
