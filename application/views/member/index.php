<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>


  <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="<?= base_url('assets/img/profile/') . $user['image']  ?>" class="img-fluid rounded-start">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($user['name']); ?></h5>
          <p class="card-text"><?= $user['email']; ?></p>
          <p class="card-text"><small class="text-body-secondary">Member Since <?= date('d F Y', $user['date_created']);  ?></small></p>

        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-5 text-right">
    <a href="<?php echo site_url('user/edit'); ?>" class="btn btn-danger">Edit Profile</a>
  </div>

</div>
</div>