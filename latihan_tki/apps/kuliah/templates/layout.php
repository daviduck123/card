<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>

        <?php include_http_metas() ?>
        <?php include_metas() ?>

        <?php include_title() ?>

        <link rel="shortcut icon" href="/favicon.ico" />

    </head>
    <body>
        <h1>    ini adalah layoutnya  dan berada diatas konten </h1>
        <li> <?php
        if ($sf_user->isAuthenticated()) 
       {
            echo link_to('<i class="fa fa-sign-out fa-fw"></i> Logout','@logOut');
        }
        ?></li>

        <?php echo $sf_data->getRaw('sf_content') ?>

    </body>
</html>
