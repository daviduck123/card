<div class="col-lg-4">
    <div class="col-lg-4">
        <?php  echo image_tag('/uploads/' . $user->getFile(), array('style' => 'width:100%')); ?>
    </div>
    <div class="col-lg-8">
        <label>Profile</label>
        <br>
        <label>
            <?php  echo $user->getNama();?><BR>
            <?php  echo "W/L : ".$user->getWin()."/".$user->getLose();?><BR>
            <?php  echo "Games: ".$user->getGames();?><BR>
        </label>
        <br>
        <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-search"></i>Edit Profile</button>
                            
    </div>

</div>
<div class="col-lg-8">
    <table id="table1" class="table table-striped table-bordered" >
        <thead>

        <th width="10px">#</th>
        <th>Nama Room</th>
        <th> Player</th>
        <th> Join</th>

        </thead>

        <tbody>
            <?php
            $conter = 1;
            foreach ($room as $row) :
                ?>
                <tr>
                    <td><?php echo $conter; ?> </td>
                    <td><?php echo $row->getNama(); ?> </td>
                    <td><?php echo $row->getJumlah() . '/4'; ?> </td>
                    <td><?php echo 'wew'; ?> </td>
                </tr>


                <?php $conter++; ?>

            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pull-right">
        <?php echo link_to('<i class="glyphicon glyphicon-plus"></i> Create Room', '#', array('id' => 'btnTambahBarang', 'data-toggle' => 'modal', 'data-target' => '#modalTambah', 'class' => 'btn btn-primary')); ?>

    </div>
</div>

<div class="modal fade " id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="panel-title"><i class="glyphicon glyphicon-plus"></i>
                        Create Room</h4>

                </div>

            </div>

            <div class="modal-body">

                <form id="simpanBarang" class="form-horizontal " action="<?php echo url_for('home/tambahRoom'); ?>" method="post">


                    <div class="form-group">
                        <label for="inputnama" class ="col-lg-3 control-label">Nama Room :</label>
                        <div class="col-lg-8">
                            <?php echo input_tag('data', '', array('id' => 'data_nama', 'class' => 'form-control', 'maxlength' => '40')) ?>
                        </div>

                    </div>




                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>


                        <button type="submit" onclick="validator()" class="btn btn-primary">Create</button>

                    </div>

                </form>


            </div>



        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    function validator()
    {
        if (!$('#data_nama').val())
        {
            alertify.alert('Nama Room Harus Diisi');
            event.preventDefault();
        }
    }
    $(document).ready(function() {
        $('#table1').dataTable(
                {
                    "bSort": false,
                    "language": {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                }
        );
    });
</script>