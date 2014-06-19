<?php use_helper('Number') ?>
<tr>
    <td><?php echo $barangku->getNama(); ?></td>
    <td><?php echo $barangku->getDeskripsi(); ?></td>
    <td><?php echo $barangku->getStok(); ?></td>
    <td><?php echo format_currency($barangku->getHargaBeli(),'IDR') ?></td>
    <td><?php echo format_currency($barangku->getHargaJual(),'IDR') ?></td>
</tr>

