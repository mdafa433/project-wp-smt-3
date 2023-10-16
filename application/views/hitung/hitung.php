<?php if (isset($luas)) { ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3>Hasil Perhitungan:</h3>
                <p>Luas Lingkaran: <?php echo $luas; ?></p>
                <a href="<?php echo base_url('lingkaran'); ?>" class="btn btn-primary">Hitung Ulang</a> <!-- Tambahkan tautan untuk mengulang perhitungan -->
            </div>
        </div>
    </div>
<?php } ?>
        