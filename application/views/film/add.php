<div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="card-title"><?= $title;  ?></h2>
            </div>
            <div class="card-body">
            <?= form_open_multipart('film/add'); ?>
                    <div class="form-group">
                        <label for="judul_film">Judul Film</label>
                        <input type="text" class="form-control" id="judul_film" name="judul_film"  required>
                    </div>
                    <div class="form-group">
                        <label for="waktu_mulai">Waktu Mulai</label>
                        <input type="datetime-local" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu_selesai">Waktu Selesai</label>
                        <input type="datetime-local" class="form-control" id="waktu_selesai" name="waktu_selesai" required>
                    </div>
                    <div class="form-group">
                        <label for="studio">Studio</label>
                        <input type="text" class="form-control" id="studio" name="studio" required>
                    </div>
                    <div class="form-group">
                        <label for="poster">Poster Film</label>
                        <input type="file" class="form-control-file" id="poster" name="poster" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a  href="<?php echo site_url('film'); ?>" class="btn btn-primary">Lihat Daftar Film</a>
              
            </div>
        </div>
    </div>