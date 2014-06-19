<table>
    <tr>
        <th>Nama</th><th>Deskripsi</th>
    </tr>
    <?Php foreach ($kategori->getTigaBarangTerbaru() as $row) :?>
<tr>
    <td>
        <?php echo $row->getNama(); ?>
    </td>
    <td>
        <?php echo $row->getDeskripsi(); ?>
    </td>
</tr>
    <?php endforeach; ?>
</table>