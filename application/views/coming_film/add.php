<div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="card-title"><?= $title;  ?></h2>
            </div>
            <div class="card-body">
            <?= form_open_multipart('coming_soon/add'); ?>
                    <div class="form-group">
                        <label for="judul_film">Judul Film</label>
                        <input type="text" class="form-control" id="judul_film" name="judul_film"  required>
                    </div>
                    <div class="form-group">
                        <label for="poster">Poster</label>
                        <input type="file" class="form-control-file" id="poster" name="poster" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="genre">genre</label>
                        <input type="text" class="form-control" id="genre" name="genre"  required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a  href="<?php echo site_url('coming_soon'); ?>" class="btn btn-primary">Lihat Daftar Film</a>
              
            </div>
        </div>
    </div>