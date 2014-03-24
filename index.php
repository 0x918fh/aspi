<?php
defined('YII_DEBUG') or define('YII_DEBUG',true);
require_once('framework/yii.php');
$configFile='protected/config/main.php';
Yii::createWebApplication($configFile)->run();
