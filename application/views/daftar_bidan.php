<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Caribidan | Register</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatables/css/dataTables.bootstrap.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootply.css')?>">
</head>
<body>
    <?php $this->load->view('layout/admin_menu')?>
    <div class="container">
        <h3><span style="color:#1E90FF">DAFTAR</span> BIDAN</h3>
        <hr>
        <div class="row">
            <?php if ($this->session->flashdata('pesan') <> '') { ?>
                <center>
                    <?php echo $this->session->flashdata('pesan'); ?>
                </center>
            <?php } ?>
            <table id="tabelBidan" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>ID KTP</th>
                        <th>Nama</th>
                        <th>Tempat</th>
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th>No. HP</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Ijazah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_bidan as $bidan) : ?>
                        <tr>
                            <td>
                            <center>
                                <?=
                                img([
                                    'src' => 'assets/uploads/thumb/' . $bidan->foto,
                                    'style' => 'max-width: 100%; max-height: 100%; border: 1px;'
                                ])
                                ?>
                            </center>
                            </td>
                            <td><?php echo $bidan->id_ktp ?></td>
                            <td><?php echo $bidan->nama ?></td>
                            <td><?php echo $bidan->tempat ?></td>
                            <td><?php echo $bidan->alamat ?></td>
                            <td><?php echo $bidan->agama ?></td>
                            <td><?php echo $bidan->no_hp ?></td>
                            <td><?php echo $bidan->jenis_kelamin ?></td>
                            <td><?php echo $bidan->email ?></td>
                            <td>
                            <center>
                                <?=
                                img([
                                    'src' => 'assets/uploads/thumb/' . $bidan->ijazah,
                                    'style' => 'max-width: 100%; max-height: 100%; border: 1px;'
                                ])
                                ?>
                                </center>
                            </td>
                            <td style="width:120px;">
                                <?php if ($bidan->status == 0) { ?>
                                    <a href="" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-search"></i></a>
                                    <a href="<?= base_url() ?>C_admin/hapus/<?= $bidan->id_ktp ?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="<?= base_url() ?>C_admin/konfirmasi/<?= $bidan->id_ktp ?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-check"></i></a>
                                <?php } else { ?>
                                    <a href="" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-search"></i></a>
                                    <a href="<?= base_url() ?>C_admin/hapus/<?= $bidan->id_ktp ?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
                                    <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/js/dataTables.bootstrap.js')?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#tabelBidan').DataTable();
    });
</script>
</body>
</html>
