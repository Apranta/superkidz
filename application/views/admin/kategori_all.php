<section class="content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Kategori  </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Kategori Berita

                                                    </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <style type="text/css">
                                tr th, tr td {text-align: center;}
                            </style>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#add"><i class="glyphicon glyphicon-plus"></i> Tambah</button><hr>
                            <table class="table table-bordered table-striped table-hover" id="table">
                                <thead>
                                    <tr>

                                        <?php foreach ($columns as $column): ?>
                                          <?php if ($column != 'id_kategori'): ?>
                                            <th><?=ucwords(str_replace("_", " ", $column))?></th>
                                          <?php else: ?>
                                          <th>
                                              No.
                                          </th>
                                          <?php endif; ?>
                                        <?php endforeach; ?>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach ($data as $row): ?>
                                    <tr>
                                        <?php foreach ($columns as $column): ?>
                                            <?php $row = (array)$row; ?>
                                            <?php if ($column != 'id_kategori'): ?>
                                              <td>
                                                <?=$row[$column]?>
                                              </td>
                                            <?php else:?>
                                            <td><?=$i++?></td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <td align="center">
                                            <button class="btn btn-info waves-effect" data-toggle="modal" data-target="#edit" onclick="get_kategori(<?= $row['id_kategori'] ?>)"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger waves-effect" onclick="delete_kategori(<?= $row['id_kategori'] ?>)"><i class="glyphicon glyphicon-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->



        <!-- Add -->
        <div class="modal fade" tabindex="-1" role="dialog" id="add">
          <div class="modal-dialog" role="document">
            <?= form_open("admin/kategori") ?>
           <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Kategori</h4>
              </div>
              <div class="modal-body">
                    <?php foreach ($columns as $column): ?>
                      <?php if ($column != 'id_kategori'): ?>
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label"><?= ucwords(str_replace('_', ' ', $column)) ?></label>
                                <input type="text" id="<?= $column ?>" name="<?= $column ?>" class="form-control" required>
                            </div>
                        </div>
                      <?php endif; ?>
                    <?php endforeach; ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default m-t-15 waves-effect" data-dismiss="modal">Batal</button>
                <input type="submit" name="insert" value="Simpan" class="btn btn-primary m-t-15 waves-effect">
              </div>
              <?= form_close() ?>            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!--/End Add -->


                <!-- Edit -->
        <div class="modal fade" tabindex="-1" role="dialog" id="edit">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <?= form_open("admin/kategori") ?>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Kategori</h4>
              </div>
              <div class="modal-body">
                    <input type="hidden" name="id_kategori" id="edit_id_kategori">
                    <?php foreach ($columns as $column): ?>
                      <?php if ($column != 'id_kategori'): ?>
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label"><?= ucwords(str_replace('_', ' ', $column)) ?></label>
                                <input type="text" id="edit_<?= $column ?>" name="<?= $column ?>" class="form-control" required>
                            </div>
                        </div>
                      <?php endif; ?>
                    <?php endforeach; ?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <input type="submit" name="edit" value="Edit" class="btn btn-primary">
              </div>
              <?= form_close() ?>            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!--/End Edit -->

    </div>
</section>

<script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable({
                responsive: true
            });
            $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
        });

        function get_kategori(id_kategori) {
            $.ajax({
                url: "<?= base_url('admin/kategori') ?>",
                type: 'POST',
                data: {
                    id_kategori: id_kategori,
                    get: true
                },
                success: function(response) {
                    response = JSON.parse(response);
                    <?php foreach ($columns as $column): ?>
                    $('#edit_<?= $column ?>').val(response.<?= $column ?>);
                    <?php endforeach; ?>
                  }
            });
        }


        function delete_kategori(id_kategori) {
            $.ajax({
                url: "<?= base_url('admin/kategori') ?>",
                type: 'POST',
                data: {
                    id_kategori: id_kategori,
                    delete: true
                },
                success: function() {
                    window.location = "<?= base_url('admin/kategori') ?>";
                }
            });
        }
        </script>
