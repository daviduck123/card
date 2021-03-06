<?php
// auto-generated by sfDefineEnvironmentConfigHandler
// date: 2014/06/19 13:35:16
sfConfig::add(array(
  'sf_logging_enabled' => true,
  'sf_logging_level' => 'debug',
  'sf_logging_rotate' => false,
  'sf_logging_period' => 7,
  'sf_logging_history' => 10,
  'sf_logging_purge' => true,
));

$logger = sfLogger::getInstance();
$logger->setLogLevel(constant('SF_LOG_'.strtoupper(sfConfig::get('sf_logging_level'))));

$log = new sfWebDebugLogger();
$log->initialize(array (
));
$logger->registerLogger($log);

$log = new sfFileLogger();
$log->initialize(array (
  'file' => 'C:\\xampp\\htdocs\\card\\log/perang_dev.log',
));
$logger->registerLogger($log);
