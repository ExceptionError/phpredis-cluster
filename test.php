<?php

error_reporting(0);

//ini_set('redis.clusters.cache_slots', 1);

$seeds = [
    //'redis-node-0:6379',
    //'redis-node-1:6379',
    //'redis-node-2:6379',
    //'redis-node-3:6379',
    //'redis-node-4:6379',
    //'redis-node-5:6379',
    'localhost:5000',
];
$cluester = new RedisCluster(null, $seeds, 1.5, 1.5, false, 'bitnami');
$cluester->set("a", mt_rand());
var_dump($cluester->get("a"));
$cluester2 = new RedisCluster(null, $seeds, 1.5, 1.5, false, 'bitnami');
var_dump($cluester2->get("a"));
