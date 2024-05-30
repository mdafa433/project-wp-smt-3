<div class="container mt-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="card-title">Coming Soon</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <?php $i = 1; foreach ($films as $film): ?>
                        <tr>
                            
                            <td>
                                <img src="<?php echo base_url('uploads/' . $film->poster); ?>" alt="<?php echo $film->judul_film; ?>" width="1000">
                            </td>
                            
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>