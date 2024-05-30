<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit menu</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit menu</h2>
        <form action="<?= site_url('menu/editm/' . $m->id) ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="menu">menu</label>
                <input type="text" class="form-control" id="menu" name="menu" value="<?php echo $m->menu; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
