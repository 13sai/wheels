<?php
/**
 * 测试实例
 * User: 13sai
 * Date: 2018/9/1
 * Time: 17:51
 */
include 'autoload.php';
include 'TestDelayTask.php';

(new TestDelayTask(4))->startAfter(120);
(new TestDelayTask(3))->startAt(153120384);


