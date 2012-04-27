app/console cache:clear
app/console cache:clear --env=prod
app/console cache:clear --env=prod  --no-warmup
chmod 777 -R /var/www/html/
app/console assetic:dump
app/console assetic:dump --env=prod
app/console assetic:dump --env=prod --no-debug
chmod 777 -R /var/www/html/
