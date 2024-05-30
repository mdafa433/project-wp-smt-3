<div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="card-title">Daftar Film</h2>
            </div>
            <div class="card-body">
                <a href="<?php echo site_url('film/add'); ?>" class="btn btn-primary mb-3">Tambah Film</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Film</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Studio</th>
                            <th>Poster</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($films as $film): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $film->judul_film; ?></td>
                            <td><?php echo $film->waktu_mulai; ?></td>
                            <td><?php echo $film->waktu_selesai; ?></td>
                            <td><?php echo $film->studio; ?></td>
                            <td>
                                <img src="<?php echo base_url('uploads/' . $film->poster); ?>" alt="<?php echo $film->judul_film; ?>" width="100">
                            </td>
                            <td>
                                <a href="<?php echo site_url('film/edit/' . $film->id); ?>" class="btn btn-warning">Edit</a>
                                <a href="<?php echo site_url('film/delete/' . $film->id); ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>