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
                            <a href="<?=base_url('kontributor/add-berita')?>" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i> Tambah</a><hr>
                            <table class="table table-bordered table-striped table-hover" id="table">
                                <thead>
                                    <tr>

                                        <?php foreach ($columns as $column): ?>
                                          <?php if ($column != 'id_blog'): ?>
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
                                            <?php if ($column != 'id_blog'): ?>
                                              <td>
                                                <?php if ($column == 'id_kategori'): ?>
                                                  <?= $this->Kategori_blog_m->get_row(['id_kategori' => $row[$column]])->nama ?>
                                                  <?php else: ?>
                                                    <?=$row[$column]?>
                                                <?php endif; ?>
                                              </td>
                                            <?php else:?>
                                            <td><?=$i++?></td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <td align="center">
                                            <a href="<?=base_url('kontributor/edit-berita/'.$row['id_blog'])?>" class="btn btn-info waves-effect"><i class="fa fa-edit"></i></a>
                                            <button class="btn btn-danger waves-effect" onclick="delete_blog(<?= $row['id_blog'] ?>)"><i class="glyphicon glyphicon-trash"></i></button>
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
    </div>
</section>

<script type="text/javascript">


        function delete_blog(id_blog) {
            $.ajax({
                url: "<?= base_url('kontributor/berita') ?>",
                type: 'POST',
                data: {
                    id_blog: id_blog,
                    delete: true
                },
                success: function() {
                    window.location = "<?= base_url('kontributor/berita') ?>";
                }
            });
        }
        </script>
