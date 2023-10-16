<div class="container mt-5">
   <div class="row">
       <div class="col-md-6 offset-md-3">
           <h2 class="text">Perhitungan Luas Lingkaran</h2>
           <form method="post" action="<?php echo base_url('lingkaran/hitung'); ?>">
               <div class="form-group">
                   <label for="jari_jari">Jari-Jari Lingkaran:</label> <!-- Ubah dari 'Radius' ke 'Jari-Jari' -->
                   <input type="numeric" class="form-control" id="jari_jari" name="jari_jari" required> <!-- Ubah dari 'radius' ke 'jari_jari' -->
               </div>
               <button type="submit" class="btn btn-primary">Hitung</button>
           </form>
       </div>
   </div>
</div>
            