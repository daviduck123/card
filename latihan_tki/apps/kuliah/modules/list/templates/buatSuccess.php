<h1> Buat Baru Barang Manual</h1>
<?php use_helper('DateForm', 'Object'); ?>
<?php if($sf_request->hasErrors()): ?>
<?php foreach($sf_request->getErrors() as $error) :?>
 <?php echo $error; ?>
<?Php endforeach; ?>
<?php endif?>
<form enctype="multipart/form-data" class="form-horizontal " action="<?php echo url_for('list/simpan'); ?>" method="post">
    <?php echo object_input_hidden_tag($barang, 'getId', array('class' => 'form-control', 'control_name' => 'barangnya[id]')) ?>
    <div class="form-group">
        <label for="inputnama" class ="col-lg-3 control-label">Nama</label>
        <div class="col-lg-5">
            <?php echo object_input_tag($barang, 'getNama', array('class' => 'form-control', 'control_name' => 'barangnya[nama]')) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputnama" class="col-lg-3 control-label">Deskripsi</label>
        <div class="col-lg-5">
            <?php echo object_textarea_tag($barang, 'getDeskripsi', array('class' => 'form-control', 'control_name' => 'barangnya[deskripsi]')); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="inputnama" class="col-lg-3 control-label">Stok</label>
        <div class="col-lg-5">
            <?php echo object_input_tag($barang, 'getStok', array('class' => 'form-control', 'control_name' => 'barangnya[stok]')); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputnama" class="col-lg-3 control-label">Harga Beli</label>
        <div class="col-lg-5">
            <?php echo object_input_tag($barang, 'getHargaBeli', array('class' => 'form-control', 'control_name' => 'barangnya[harga_beli]')); ?>

        </div>
    </div>
    <div class="form-group">
        <label for="inputnama" class="col-lg-3 control-label">Harga Jual</label>
        <div class="col-lg-5">
              <?php echo object_input_tag($barang, 'getHargaJual', array('class' => 'form-control', 'control_name' => 'barangnya[harga_jual]')); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputnama" class="col-lg-3 control-label">Status</label>
        <div class="col-lg-5">
            <?php echo object_checkbox_tag($barang,'getStatus',array('control_name'=>'barangnya[status]')); ?> aktif
        </div>
    </div>

    <div class="form-group">
        <label for="inputnama" class="col-lg-3 control-label">Kategori</label>
        <div class="col-lg-5">
<!--            <?php //echo select_tag('barangnya[kategori]', options_for_select($kategoriKombo), array('class' => 'form-control')); ?> -->
         <?php echo object_select_tag($barang,'getKategoriId', array('class' => 'form-control','control_name'=>'barangnya[kategori]','peer_method'=>'getCombo','text_method'=>'getStringCombo')); ?> 

        </div>
    </div>


    <div class="form-group">
        <label for="inputnama" class="col-lg-3 control-label">Gambar</label>
        <div class="col-lg-5">
            <?php if($barang->getNamafile()): ?>
            <?php  echo image_tag('../uploads/'.$barang->getNamafile(),array('width'=>'100px')) ?>
            <?php endif; ?>
            <?php echo input_file_tag('gambar'); ?> 

        </div>
    </div>
    <div class="form-group">
        <label for="inputnama" class="col-lg-3 control-label">Date</label>
        <div class="col-lg-5">
            <?php echo select_date_tag('date', date('Y-m-d'), array('rich' => 'true')); ?> 

        </div>
    </div>

    <div class="form-group ">
        <div class="col-lg-offset-7">
            <?php echo submit_tag('simpan', array('class' => 'btn btn-primary')); ?>
        </div>
    </div>
</form>
