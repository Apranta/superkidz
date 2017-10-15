<section class="content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Berita</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

  					<div class="row">
  						<div class="col-lg-12">
  							<!-- INPUTS -->
  							<div class="panel">
  								<div class="panel-heading">
  									<h3 class="panel-title">Berita</h3>
  								</div>
                  <?=form_open('kontributor/berita')?>
  								<div class="panel-body">
                    <label for="">Judul Berita</label>
  									<input type="text" class="form-control" placeholder="Masukan judul berita" name="header" value="<?=$berita->header?>">
                    <br>
                    <label for="">Kategori</label>
  									<select class="form-control" name="id_kategori">
                      <?php foreach ($kategori as $row): ?>
                        <option value="<?=$row->id_kategori?>"><?=$row->nama?></option>
                      <?php endforeach; ?>
  									</select>
  									<br>
                    <label for="">Isi Berita</label>
  									<textarea id="editor1" class="form-control" placeholder="textarea" name="isi" rows="4"><?=$berita->isi?></textarea>
                    <br>
                    <input type="hidden" name="id_blog" value="<?=$berita->id_blog?>">
                    <input type="submit" name="edit" value="Simpan">
  								</div>
                  <?=form_close()?>
  							</div>
  							<!-- END INPUTS -->
  						</div>
  					</div>
    </div>
</section>
<!-- CK Editor -->
<script src="<?=base_url('assets/plugin/ckeditor/ckeditor.js')?>"></script>
<script>
  $(function () {
    CKEDITOR.replace('editor1')
  })
</script>
