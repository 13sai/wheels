<?php
/**
 * User: 13sai
 * Date: 2018/9/1
 * Time: 16:35
 */
namespace DelayTask;


abstract class DelayTask
{
    const DELAY_TASK = 'delayTask';

    /**
     * 延时时间
     * @param $pushDelayTime
     */
    public function startAfter(int $pushDelayTime)
    {
        RedisManager::getRedis()->zAdd(self::DELAY_TASK, time() + $pushDelayTime, serialize($this));
    }

    /**
     * 定时时间
     * @param $pushDelayAt
     */
    public function startAt(int $pushDelayAt)
    {
        RedisManager::getRedis()->zAdd(self::DELAY_TASK, $pushDelayAt, serialize($this));
    }

    abstract function run();
}