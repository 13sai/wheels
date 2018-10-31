<?php
/**
 * User: 13sai
 * Date: 2018/9/1
 * Time: 16:36
 */

namespace DelayTask;


class RedisManager
{
    private static $_instance = null;

    private function __construct()
    {
        self::$_instance = new \Redis();
        $config = require 'redis.config.php';
        self::$_instance->connect($config['host'], $config['port'], $config['timeout']);
        if (isset($config['password'])) {
            self::$_instance->auth($config['password']);
        }
    }

    /**
     * 获取静态实例
     */
    public static function getRedis()
    {
        if (!self::$_instance) {
            new self;
        }

        return self::$_instance;
    }

    /**
     * 禁止clone
     */
    private function __clone()
    {
    }
}