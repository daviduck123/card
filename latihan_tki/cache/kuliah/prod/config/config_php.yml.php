<?php
// auto-generated by sfPhpConfigHandler
// date: 2014/06/11 10:07:52
ini_set('log_errors', '1');
ini_set('arg_separator.output', '&amp;');
if (ini_get('session.auto_start') != false)
{
  sfLogger::getInstance()->warning('{sfPhpConfigHandler} php.ini "session.auto_start" key is better set to "false" (current value is "\'0\'" - php.ini location: "C:\Windows\php.ini").');
}

