

        
        

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $user['name']  ?></h1>
                    <?php if ($this->session->flashdata('berhasil')): ?>
        <p style="color: green;">
        <?php echo $this->session->flashdata('berhasil'); ?></p>
    <?php endif; ?>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           