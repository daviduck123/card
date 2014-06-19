<table class="table" id="table1">
    <th> Id</th>
    <th> Nama</th>
    <th> Deskripsi</th>
    <th> Gambar</th>
    <th> Status</th>

    <th> Action</th>
    <?php $conter = 0;
    foreach ($barang->getResults() as $bar) : ?>

        <tr>
            <td><?php echo $bar->getId(); ?> </td>
            <td><?php echo $bar->getNama(); ?> </td>
            <td><?php echo $bar->getDeskripsi(); ?> </td>
            <td><?php echo $bar->getStatusString(); ?> </td>
            <?php
            if ($bar->getNamaFile() != "") {
                // echo '<td><img src="'.(sfConfig::get('sf_upload_dir').'\\'.$bar->getNamaFile()).'"> </td>';
                echo '<td>' . image_tag('../uploads/' . $bar->getNamaFile(), array('width' => '100px')) . '</td>';
            } else {
                echo '<td>' . image_tag('no-photo.jpg', array('width' => '100px')) . '</td>';
            }
            ?>
            <?php if($sf_user->hasCredential(array(array('admin','lihat')))): ?>
            <td><?php echo link_to('<i class="glyphicon glyphicon-zoom-in"></i>', 'list/detail?nama_strip=' . $bar->getNamaStrip()) ?>
            </td>
             <?php endif ?>
             <?php if($sf_user->hasCredential('admin')): ?>
            <td><?php echo link_to('<i class="glyphicon glyphicon-edit"></i>', 'list/buat?id=' . $bar->getId()) ?>

            </td>
             <?php endif ?>
            <td><?php echo link_to('<i class="glyphicon glyphicon-plus"></i>', 'list/buat'); ?>
            </td>
            <td><?php echo link_to('<i class="glyphicon glyphicon-trash"></i>', 'list/hapus?id=' . $bar->getId(), array('confirm' => ' anda yakin ingin menghapus ?')); ?>
                
            </td><td><?php echo link_to('<i class="glyphicon glyphicon-plus">Ganti Status</i>', '#', array('id' => 'status_' . $conter, 'data-url' => url_for('list/ubahStatus?id=' . $bar->getId()), 'onClick' => 'ubahStatus(' . $conter . ')')); ?>
            </td>
        </tr>




    <?php $conter++;
endforeach; ?>
    <tfoot>
        <tr>
            <th colspan="6" align="center">
                <?php if ($barang->haveToPaginate()): ?>
                    <?php echo link_to('<i class="glyphicon glyphicon-fast-backward"></i>', 'list'); ?>
                    <?php echo link_to('<i class="glyphicon glyphicon-chevron-left"></i>', 'list/index?halaman=' . $barang->getPreviousPage()); ?>
                    <?php foreach ($barang->getLinks() as $halaman): ?>
                        <?php echo link_to_unless($halaman == $barang->getPage(), $halaman, 'list/index?halaman=' . $halaman) ?>
                    <?php endforeach ?>
                    <?php echo link_to('<i class="glyphicon glyphicon-chevron-right"></i>', 'list/index?halaman=' . $barang->getNextPage()); ?>

    <?php echo link_to('<i class="glyphicon glyphicon-fast-forward"></i>', 'list/index?halaman=' . $barang->getLastPage()); ?>
<?php endif ?>
            </th>
        </tr>
    </tfoot>
</table>

<table class="table">
    <th> Id</th>
    <th> Nama</th>
    <th> Deskripsi</th>

    <th> Action</th>
<?php foreach ($kategori as $kat) : ?>

        <tr>
            <td><?php echo $kat->getId(); ?> </td>
            <td><?php echo $kat->getNama(); ?> </td>
            <td><?php echo $kat->getDeskripsi(); ?> </td>
            <td><?php echo link_to('<i class="glyphicon glyphicon-zoom-in"></i>', 'list/detailKategori?nama_strip=' . $kat->getNamaStrip()) ?>

            </td>
        </tr>




<?php endforeach; ?>
</table>
<script>

</script>