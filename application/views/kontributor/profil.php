<section class="content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sunting Profil</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

  					<div class="row">
  						<div class="col-lg-12">
  							<!-- INPUTS -->
  							<div class="panel">
  								<div class="panel-heading">
  									<h3 class="panel-title">Profil</h3>
  								</div>
                  <?=form_open('kontributor/sunting-profil')?>
  								<div class="panel-body">
                    <label for="">Nama</label>
  									<input type="text" class="form-control" placeholder="Masukan judul berita" name="nama" value="<?=$profil->nama?>">
                    <br>
                    <label for="">Jenis Kelamin</label>
  									<select class="form-control" name="id_gender">
                      <option value="<?=$profil->id_gender?>"><?=$this->Gender_m->get_row(['id_gender' => $profil->id_gender])->nama?></option>
                      <?php foreach ($kelamin as $row): ?>
                        <?php if ($row->id_gender != $profil->id_gender): ?>
                        <option value="<?=$row->id_gender?>"><?=$row->nama?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
  									</select>
  									<br>
                    <label for="">Tempat Lahir</label>
  									<input type="text" class="form-control" placeholder="Masukan judul berita" name="tempat_lahir" value="<?=$profil->tempat_lahir?>">
                    <br>
                    <label for="">Tanggal Lahir</label>
  									<input type="text" class="form-control" placeholder="Masukan judul berita" name="tanggal_lahir" value="<?=$profil->tanggal_lahir?>">
                    <br>
                    <label for="">Email</label>
  									<input type="email" class="form-control" placeholder="Masukan judul berita" name="email" value="<?=$profil->email?>">
                    <br>
                    <label for="">Telepon</label>
  									<input type="number" class="form-control" placeholder="Masukan judul berita" name="telepon" value="<?=$profil->telepon?>">
                    <br>
                    <label for="">Pekerjaan</label>
  									<input type="text" class="form-control" placeholder="Masukan judul berita" name="pekerjaan" value="<?=$profil->pekerjaan?>">
                    <br>
                    <label for="">Alamat</label>
  									<textarea id="editor1" class="form-control" placeholder="textarea" name="alamat" rows="4"><?=$profil->alamat?></textarea>
                    <br>
                    <input type="submit" name="edit" value="Simpan">
  								</div>
                  <?=form_close()?>
  							</div>
  							<!-- END INPUTS -->
  						</div>
  					</div>
    </div>
</section>
