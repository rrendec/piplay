<?php

require_once 'MPL.php';
MPL::init();

$root = realpath(dirname($_SERVER['SCRIPT_FILENAME']) . '/..');
MPL::addIncludePath($root . '/model');
MPL::addIncludePath($root . '/model/build/classes');
MPL::addIncludePath($root . '/lib');
MPL::addIncludePath($root . '/controller');
MPL::addIncludePath($root . '/view');
define('TEMPLATE_ROOT', $root . '/template');
require_once('config.php');

require_once "propel/Propel.php";
Propel::init($root . "/model/build/conf/piplay-conf.php");

// vim: ts=4 sw=4 et
