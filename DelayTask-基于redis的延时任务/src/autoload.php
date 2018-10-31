<?php
/**
 * User: 13sai
 * Date: 2018/9/1
 * Time: 17:52
 */
spl_autoload_register(function($className){
    require_once __DIR__.DIRECTORY_SEPARATOR.$className.'.php';
});