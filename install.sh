#!/bin/bash
USERNAME='root'
PASSWORD='root'
DBNAME='db_blogphp'
HOST='localhost'

USER_USERNAME='neni'
USER_PASSWORD='neni'

MySQL=$(cat <<EOF
DROP DATABASE IF EXISTS $DBNAME;
CREATE DATABASE $DBNAME DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
DELETE FROM mysql.user WHERE user='$USER_USERNAME' and host='$USER_PASSWORD';
GRANT ALL PRIVILEGES ON $DBNAME.* to '$USER_USERNAME'@'$HOST' IDENTIFIED BY '$USER_PASSWORD' WITH GRANT OPTION;
EOF
)
echo $MySQL | mysql --user=$USERNAME --password=$PASSWORD

php artisan migrate:refresh --seed


if [ ! -d ./node_modules ]; then
	npm install --save-dev gulp
	npm install --save-dev gulp-sass
	npm install --save-dev gulp-minify-css
	npm install --save-dev gulp-concat
	npm install --save-dev gulp-rename
	npm install --save-dev gulp-uglify
else
	echo "ok pour gulp et ses dépendances"
fi


if [ ! -f gulpfile.js ]; then
	touch gulpfile.js
fi