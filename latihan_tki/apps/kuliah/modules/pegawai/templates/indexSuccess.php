<table class="table">
    <th> Id</th>
    <th> Nama</th>
    <th> Deskripsi</th>
   
    <th> Action</th>
<?php foreach ($pegawai as $peg) : ?>

    <tr>
        <td><?php echo $peg->getId(); ?> </td>
        <td><?php echo $peg->getNama(); ?> </td>
        <td><?php echo $peg->getAlamat(); ?> </td>
        <td><?php echo link_to('<i class="glyphicon glyphicon-zoom-in"></i>', 'pegawai/detail?nama_strip='.$peg->getNamaStrip())?>
       
                </td>
    </tr>
    

    
    
    <?php endforeach; ?>
</table>


