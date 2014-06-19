<table class="table">
   <?php foreach($data_sessions as $row): ?>
        <tr>
           
            <td>
                <?php echo $row; ?>
            </td>
           
        </tr>
    <?php endforeach; ?>
        Halo :<?php echo $sf_user->getProfile()->getNama() ;?>
    <tr>
        <td>ID BARANG : </td>
        <td><?php echo $tampil[0]->getId(); ?> </td>
    </tr>
    <tr>
        <td>Nama BARANG : </td>
        <td><?php echo $tampil[0]->getNama(); ?> </td>
    </tr>
    <tr>
        <td>Deskripsi BARANG : </td>
        <td><?php echo $tampil[0]->getDeskripsi(); ?> </td>
    </tr>
    <tr>
        <td>Id Kategori: </td>
        <td><?php echo $tampil[0]->getKategori() ?> </td>
    </tr>
     <tr>
        <td>Status Barang: </td>
        <td><?php echo $tampil[0]->getStatusString() ?> </td>
    </tr>
    
    
        
 
</table>

