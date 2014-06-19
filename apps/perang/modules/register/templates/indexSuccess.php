<?php use_helper('Validation', 'I18N', 'Object') ?>
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
                            <form method="post" action="<?php echo url_for('register/signup'); ?>" enctype="multipart/form-data" role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <?php
                                        echo form_error('username');
                                        echo input_tag("data[username]", '', array('class' => 'form-control'))
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Password:</label>
                                        <?php
                                        echo form_error('password');
                                        echo input_tag("data[password]", '', array('class' => 'form-control', "type" => "password"))
                                        ?>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Nama:</label>
                                        <?php
                                        echo form_error('nama');
                                        echo input_tag("data[nama]", '', array('class' => 'form-control'))
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>File:</label>
                                        <?php
                                        echo form_error('file');
                                        echo input_tag("file", '', array('class' => 'form-control', "type" => "file"))
                                        ?>
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

