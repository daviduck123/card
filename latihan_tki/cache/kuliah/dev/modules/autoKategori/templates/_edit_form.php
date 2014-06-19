<?php
// auto-generated by sfPropelAdmin
// date: 2014/06/11 09:31:05
?>
<?php echo form_tag('kategori/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($kategori, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('kategori[nama]', __($labels['kategori{nama}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('kategori{nama}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('kategori{nama}')): ?>
    <?php echo form_error('kategori{nama}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($kategori, 'getNama', array (
  'size' => '30x3',
  'control_name' => 'kategori[nama]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('kategori[deskripsi]', __($labels['kategori{deskripsi}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('kategori{deskripsi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('kategori{deskripsi}')): ?>
    <?php echo form_error('kategori{deskripsi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($kategori, 'getDeskripsi', array (
  'size' => '30x3',
  'control_name' => 'kategori[deskripsi]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('kategori[nama_strip]', __($labels['kategori{nama_strip}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('kategori{nama_strip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('kategori{nama_strip}')): ?>
    <?php echo form_error('kategori{nama_strip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($kategori, 'getNamaStrip', array (
  'size' => 80,
  'control_name' => 'kategori[nama_strip]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('kategori[created_at]', __($labels['kategori{created_at}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('kategori{created_at}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('kategori{created_at}')): ?>
    <?php echo form_error('kategori{created_at}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($kategori, 'getCreatedAt', array (
  'rich' => true,
  'withtime' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'kategori[created_at]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('kategori[updated_at]', __($labels['kategori{updated_at}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('kategori{updated_at}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('kategori{updated_at}')): ?>
    <?php echo form_error('kategori{updated_at}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($kategori, 'getUpdatedAt', array (
  'rich' => true,
  'withtime' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'kategori[updated_at]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('kategori' => $kategori)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($kategori->getId()): ?>
<?php echo button_to(__('delete'), 'kategori/delete?id='.$kategori->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
