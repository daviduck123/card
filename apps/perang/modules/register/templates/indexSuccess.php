<?php use_helper('Validation', 'I18N') ?>
<body >

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">Register</h4>
                    </div>
                    <div class="panel-body">
                        <div id="sf_guard_auth_form">
                            <form method="post" action="<?php echo url_for('register/signup');?>" enctype="multipart/form-data" role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <?php
                                        echo form_error('username'),
                                        input_tag('username', $sf_data->get('sf_params')->get('username'), array('class' => 'form-control'));
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Password:</label>
                                        <?php
                                        echo form_error('password');
                                        ?>
                                        <input type="password" name="password" id="password" value="" class="form-control">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Nama:</label>
                                        <?php
                                        echo form_error('nama');
                                        ?>
                                        <input type="text" name="nama" id="nama" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>File:</label>
                                        <?php
                                        echo form_error('file');
                                        ?>
                                        <input type="file" name="gambar" id="file" value="" class="form-control">
                                    </div>


                                </fieldset>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Daftar</button>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

