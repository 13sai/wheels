<?php

use DelayTask\DelayTask;

/**
 * User: 13sai
 * Date: 2018/9/1
 * Time: 17:55
 */

class TestDelayTask extends DelayTask
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function run()
    {
        $file  = 'text.txt';//要写入文件的文件名（可以是任意文件名），如果文件不存在，将会创建一个
        $content = "写入的内容".time()."\n";

        if($f = file_put_contents($file, $content,FILE_APPEND)){// 这个函数支持版本(PHP 5)
            echo "写入成功。<br />";
        }
    }
}