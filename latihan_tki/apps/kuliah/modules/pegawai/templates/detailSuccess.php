<table class="table">
  
    <tr>
        <td>ID Pegawai : </td>
        <td><?php echo $tampil[0]->getId(); ?> </td>
    </tr>
    <tr>
        <td>Nama Pegawai : </td>
        <td><?php echo $tampil[0]->getNama(); ?> </td>
    </tr>
    <tr>
        <td>Status Pegawai : </td>
        <td><?php echo $tampil[0]->getStatusString(); ?> </td>
    </tr>
    <tr>
        <td>Alamat Pegawai: </td>
        <td><?php echo $tampil[0]->getAlamat(); ?> </td>
    </tr>
     <tr>
        <td>Kota Pegawai: </td>
        <td><?php echo $tampil[0]->getKota() ?> </td>
    </tr>
     <tr>
        <td>Kota Pegawai: </td>
        <td><?php echo $tampil[0]->getJabatan() ?> </td>
    </tr>
     <tr>
        <td>Kota Pegawai: </td>
        <td><?php echo $tampil[0]->getGaji() ?> </td>
    </tr>
    
    
        
 
</table>
