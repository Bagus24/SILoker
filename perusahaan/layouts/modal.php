<!-- EDIT MODAL -->
<div class="modal fade" id="editModal<?php echo $data['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Informasi Admin</h5>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Username</h5>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $data['username'] ?>" readonly required>
                    </div>
                    <div class="form-group">
                        <h5>Nama Lengkap</h5>
                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $data['nama_lengkap'] ?>" required>
                    </div>

                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                     <button type="submit" class="btn btn-primary" name="submit_edit">Simpan</button>
                </div>
            </form>
         </div>
     </div>
</div>


<!-- RESET MODAL -->
<div class="modal fade" id="resetModal<?php echo $data['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reset Password Admin</h5>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Username</h5>
                        <input type="text" class="form-control" name="username" value="<?php echo $data['username'] ?>" readonly required>
                    </div>
                    <div class="form-group">
                        <h5>Password Baru</h5>
                        <input type="password" class="form-control" name="password" placeholder="Password baru" required>
                    </div>

                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                     <button type="submit" class="btn btn-primary" name="submit_reset">Simpan</button>
                </div>
            </form>
         </div>
     </div>
</div>

<!-- LOOK VACAN MODAL -->
<div class="modal fade" id="lookVacanModal<?php echo $data['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lihat Informasi Pekerjaan</h5>
            </div>
                <div class="modal-body">

                    <div class="form-group">
                        <h5>Posisi</h5>
                        <?php echo $data['nama_posisi'] ?>
                    </div>
                    <div class="form-group">
                        <h5>Bidang</h5>
                        <?php echo $data['nama_bidang'] ?>
                    </div>
                    <div class="form-group">
                        <h5>Deskripsi singkat</h5>
                        <?php echo $data['highlight_posisi'] ?>
                    </div>
                    <div class="form-group">
                        <h5>Persyaratan</h5>
                        <?php echo $data['desc_posisi'] ?>
                    </div>

                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
         </div>
     </div>
</div>

<!-- LOOK APPLICANTS -->
<div class="modal fade" id="lookApplyModal<?php echo $data['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lihat Informasi Pelamar</h5>
            </div>
                <div class="modal-body">

                    <div class="form-group">
                        <h5>Nama           : <?php echo $data['nama_lengkap'] ?></h5>
                        
                    </div>
                    <div class="form-group">
                        <h5>Email : <?php echo $data['email'] ?></h5>
                        
                    </div>
                    <div class="form-group">
                        <h5>No. Handphone : <?php echo $data['no_hp'] ?></h5>
                        
                    </div>
                    <div class="form-group">
                        <h5>Posisi : <?php echo $data['posisi'] ?> </h5>
                        
                    </div>
                    <div class="form-group">
                        <h5>Bidang : <?php echo $data['bidang'] ?></h5>
                        
                    </div>
                    <div class="form-group">
                        <h5>Resume file : <a href="<?php echo $home.'/assets/resume/'.$data['resume_file'].'' ?>" target="_blank">Lihat file</a></h5>
                        
                    </div>
                    <div class="form-group">
                        <h5>Tanggal daftar : <?php echo $data['created_at'] ?></h5>
                        
                    </div>

                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
         </div>
     </div>
</div>
