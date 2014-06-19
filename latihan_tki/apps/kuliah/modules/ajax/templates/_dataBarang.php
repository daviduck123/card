<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Deskripsi</th>
    </tr>
    <?php
    foreach($barangku as $item ):
    ?>
    <tr>
    <td><?php echo $item->getNama(); ?></td>
    <td><?php echo $item->getDeskripsi(); ?></td>
    </tr>
        <?php endforeach; ?>
</table>