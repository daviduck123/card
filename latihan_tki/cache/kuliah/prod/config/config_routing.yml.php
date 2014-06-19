<?php
// auto-generated by sfRoutingConfigHandler
// date: 2014/06/11 10:07:52
$routes = sfRouting::getInstance();
$routes->setRoutes(
array (
  'list' => 
  array (
    0 => '/cantikkategori/:nama_strip',
    1 => '#^/cantikkategori(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'nama_strip',
    ),
    3 => 
    array (
      'nama_strip' => 1,
    ),
    4 => 
    array (
      'module' => 'list',
      'action' => 'detailKategori',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'pegawai' => 
  array (
    0 => '/wow/:nama_strip',
    1 => '#^/wow(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'nama_strip',
    ),
    3 => 
    array (
      'nama_strip' => 1,
    ),
    4 => 
    array (
      'module' => 'pegawai',
      'action' => 'detail',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'logOut' => 
  array (
    0 => '/keluar',
    1 => '#^/keluar$#',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'sfGuardAuth',
      'action' => 'signout',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'homepage' => 
  array (
    0 => '/',
    1 => '/^[\\/]*$/',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'percobaan',
      'action' => 'index',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'default_symfony' => 
  array (
    0 => '/symfony/:action/*',
    1 => '#^/symfony(?:\\/([^\\/]+))?(?:\\/(.*))?$#',
    2 => 
    array (
      0 => 'action',
    ),
    3 => 
    array (
      'action' => 1,
    ),
    4 => 
    array (
      'module' => 'default',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'default_index' => 
  array (
    0 => '/:module',
    1 => '#^(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'module',
    ),
    3 => 
    array (
      'module' => 1,
    ),
    4 => 
    array (
      'action' => 'index',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'default' => 
  array (
    0 => '/:module/:action/*',
    1 => '#^(?:\\/([^\\/]+))?(?:\\/([^\\/]+))?(?:\\/(.*))?$#',
    2 => 
    array (
      0 => 'module',
      1 => 'action',
    ),
    3 => 
    array (
      'module' => 1,
      'action' => 1,
    ),
    4 => 
    array (
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
)
);
