<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>

<body>
    <div class="container mt-5">
    <?= form_error('menu_id', '<div class="alert alert-danger" role="alert">', '</div>') ?>
        <h2>Edit Sub Menu</h2>
        <form action="<?= site_url('menu/editsub/' . $sm->id) ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label >
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $sm->title; ?>" required>
            </div>
            <div class="form-group">
            <label for="title">SubMenu:</label >
            <select name="menu_id" id="menu_id" class="form-control" >
              <?php foreach ($menu as $m) :?>
                <option value="<?php echo $m['id']?>"><?= $m['menu']?></option>
              <?php endforeach ?>

            </select>
          </div>
            <div class="form-group">
                <label for="url">Url:</label>
                <input type="text" class="form-control" id="url" name="url" value="<?php echo $sm->url; ?>" required>
            </div>
            <div class="form-group">
                <label for="icon">Icon:</label>
                <input type="text" class="form-control" id="icon" name="icon" value="<?php echo $sm->icon; ?>" required>
            </div>
            <div class="form-group">
                <label for="is_active">Is Active 1 or 2</label>
                <input type="number" min="1" max="2" class="form-control" id="is_active" name="is_active" value="<?php echo $sm->is_active; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('menu/subMenu/')?>"class="btn btn-success btn-xs">Kembali</a>
        </form>
    </div>
</body>

</html>