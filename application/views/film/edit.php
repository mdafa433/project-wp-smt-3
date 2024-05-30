<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Film</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Film</h2>
        <form action="<?= site_url('film/edit/' . $film->id) ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul_film">Judul Film</label>
                <input type="text" class="form-control" id="judul_film" name="judul_film" value="<?php echo $film->judul_film; ?>" required>
            </div>
            <div class="form-group">
                <label for="waktu_mulai">Waktu Mulai</label>
                <input type="datetime-local" class="form-control" id="waktu_mulai" name="waktu_mulai" value="<?php echo date('Y-m-d\TH:i:s', strtotime($film->waktu_mulai)); ?>" required>
            </div>
            <div class="form-group">
                <label for="waktu_selesai">Waktu Selesai</label>
                <input type="datetime-local" class="form-control" id="waktu_selesai" name="waktu_selesai" value="<?php echo date('Y-m-d\TH:i:s', strtotime($film->waktu_selesai)); ?>" required>
            </div>
            <div class="form-group">
                <label for="studio">Studio</label>
                <input type="text" class="form-control" id="studio" name="studio" value="<?php echo $film->studio; ?>" required>
            </div>
            <div class="form-group">
                <label for="new_poster">Poster Film Baru</label>
                <input type="file" class="form-control-file" id="new_poster" name="new_poster" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
