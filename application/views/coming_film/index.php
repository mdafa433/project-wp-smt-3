<div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="card-title">Segera Hadir</h2>
            </div>
            <div class="card-body">
                <a href="<?php echo site_url('coming_soon/add'); ?>" class="btn btn-primary mb-3">Tambah Film</a>
                <table class="table table-striped">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Film</th>
                            <th>Poster</th>
                            <th>genre</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($films as $film): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $film->judul_film;?></td>
                            <td>
                                <img src="<?php echo base_url('uploads/' . $film->poster); ?>" alt="<?php echo $film->judul_film; ?>" width="100">
                            </td>
                            <td><?php echo $film->genre; ?></td>
                            <td>
                                <a href="<?php echo site_url('coming_soon/edit/' . $film->id); ?>" class="btn btn-warning">Edit</a>
                                <a href="<?php echo site_url('coming_soon/delete/' . $film->id); ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>