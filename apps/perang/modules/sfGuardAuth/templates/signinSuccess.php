<?php use_helper('Validation', 'I18N') ?>
<body >

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <div id="sf_guard_auth_form">
                            <?php echo form_tag('@sf_guard_signin') ?>

                            <fieldset>
                                <div class="form-group">
                                   <?php
                                    echo form_error('username'),
                                    input_tag('username', $sf_data->get('sf_params')->get('username'), array('class' => 'form-control'));
                                    ?>
                                </div>
                                
                                <div class="form-group">
                                    <?php
                                    echo form_error('password')
                                    ?>
                                    <input type="password" name="password" id="password" value="" class="form-control">
                                </div>
                                <div class="checkbox">
                                   <?php
                                    echo label_for('remember', __('Remember me?')),
                                    checkbox_tag('remember');
                                    ?>
                                </div>
                               
                            </fieldset>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            
                            </form>
                            
                        </div>
                        <?php echo link_to('<i class="fa fa-user fa-fw"></i> Register
                                            ', 'register')  ?>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>

     
</body>

