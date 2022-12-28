# Test ping

## Crontab

´´´
*/10 * * * * /usr/bin/php /home/cjorellana/test/test.php >/dev/null 2>&1
*/59 * * * * /usr/bin/php /home/cjorellana/test/quitar_notificar.php >/dev/null 2>&1
´´´
