<section class="content">
    <div class="container-fluid">
<!-- Bordered Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h2>
                            Detail kontributor                        </h2>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tbody>
                                <?php foreach ($columns as $column): ?>
                                    <tr>
                                        <td><?= ($column == 'id_gender') ? 'Jenis Kelamin' : ucwords(str_replace("_", " ", $column)) ?></td>
                                        <td>
                                            <?php $data = (array)$data; ?>
                                            <?php
                                                if ($column == 'id_gender')
                                                    echo $this->Gender_m->get_row(['id_gender' => $data[$column]])->nama;
                                                else
                                                    echo $data[$column];
                                                ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Bordered Table -->
    </div>
</section>