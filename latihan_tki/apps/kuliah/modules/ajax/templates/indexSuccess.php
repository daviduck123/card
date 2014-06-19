<?php use_helper('DateForm', 'Object', 'Number'); ?>
<?php

echo link_to('link', '#', array('id' => 'linknyo', 'data-url' => url_for('ajax/ambilData')));
?>
<div id="kotak"></div>


<hr>
<form class="form-horizontal " action="<?php echo url_for('ajax/simpanBarang'); ?>" id="simpanBarang">
    <div class="form-group">
        <label for="inputnama" class ="col-lg-3 control-label">Nama</label>
        <div class="col-lg-5">
            <?php echo object_input_tag(new Barang(), 'getNama', array('class' => 'form-control', 'control_name' => 'barangnya[nama]')) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputnama" class="col-lg-3 control-label">Deskripsi</label>
        <div class="col-lg-5">
            <?php echo object_textarea_tag(new Barang(), 'getDeskripsi', array('class' => 'form-control', 'control_name' => 'barangnya[deskripsi]')); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="inputnama" class="col-lg-3 control-label">Stok</label>
        <div class="col-lg-5">
            <?php echo object_input_tag(new Barang(), 'getStok', array('class' => 'form-control', 'control_name' => 'barangnya[stok]')); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputnama" class="col-lg-3 control-label">Harga Beli</label>
        <div class="col-lg-5">
            <?php echo object_input_tag(new Barang(), 'getHargaBeli', array('class' => 'form-control', 'control_name' => 'barangnya[harga_beli]')); ?>

        </div>
    </div>
    <div class="form-group">
        <label for="inputnama" class="col-lg-3 control-label">Harga Jual</label>
        <div class="col-lg-5">
            <?php echo object_input_tag(new Barang(), 'getHargaJual', array('class' => 'form-control', 'control_name' => 'barangnya[harga_jual]')); ?>
        </div>
    </div>

    <div class="form-group ">
        <div class="col-lg-offset-7">
            <?php echo submit_tag('simpan', array('class' => 'btn btn-primary')); ?>
        </div>
    </div>

</form>

<div id="areaApdet" hidden="true">
    <?php echo image_tag('ajax-loader.gif', array('id' => 'tunggu')); ?>
</div>
<table class="table" id="tabel-barang">
    <tr>
    <th>Nama </th>
    <th>Deskripsi</th>
    <th>Stok</th>
    <th>Harga Beli</th>
    <th>Harga Jual</th>
    </tr>
    
    <tbody>
        <?php foreach ($barang as $item): ?>
        <tr>
            <td><?php  echo $item->getNama(); ?></td>
            <td><?php  echo $item->getDeskripsi(); ?></td>
            <td><?php  echo $item->getStok(); ?></td>
            <td><?php  echo format_currency($item->getHargaBeli(),'IDR'); ?></td>
            <td><?php  echo format_currency($item->getHargaJual(),'IDR'); ?></td>
            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>