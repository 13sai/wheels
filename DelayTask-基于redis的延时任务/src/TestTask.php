<?php
/**
 * User: zuowei
 * Date: 2018/9/5
 * Time: 12:00
 */

use DelayTask\RedisManager;

include 'autoload.php';
include 'TestDelayTask.php';

class DelayTaskTask
{

    const QueneName = 'delayTask';

    private $currentTime;

    private $once = 5;


    public function run()
    {
        $this->currentTime = time();
        error_reporting(error_reporting() & ~E_WARNING);

        while (true) {
            // 每次取出5条
            $list = RedisManager::getRedis()->zRange(self::QueneName, 0, $this->once, true);

            if (!empty($list)) {
                foreach ($list as $val=>$score) {
                    if ($score < $this->currentTime) {
                        unserialize($val)->run();
                        RedisManager::getRedis()->zDelete(self::QueneName, $val);
                    } else {
                        break 2;
                    }
                }
            } else {
                break;
            }
        }
    }
}
(new DelayTaskTask())->run();