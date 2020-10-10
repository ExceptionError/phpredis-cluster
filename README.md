# phpredis-clusterの検証
## 使い方
`docker-compose up -d` した後にappコンテナに入って `php test.php` を実行。
appコンテナのログに `CLUSTER SLOTES` と出力される回数を確認する。

## わかったこと
`redis.clusters.cache_slots=1` にすると `new RedisCluster` を複数回行っても同じseedsなら `CLUSTER SLOTES` が1回に抑えられる。
`redis.clusters.cache_slots=0` にすると `new RedisCluster` するたびに `CLUSTER SLOTES` が実行される。

1プロセス内でのキャッシュはされるけど複数プロセスではキャッシュは共有されない。

## メモ
redisの `MONITOR` コマンドでは `CLUSTER SLOTES` の確認はできなかった。
なのでプロキシを挟んでそいつでログを吐かせる必要があった。
