# -------------------
# Administration PHP
# -------------------

apt-get install imagemagick
apt-get install php-imagick
# Redémarrage du serveur
/etc/init.d/apache2 restart

#Installation de PECL (au besoin)
wget http://pear.php.net/go-pear.phar
php go-pear.phar

# Installation de l'extension memcache
pecl install memcache
# Chercher le répertoire contenant memcache.so
find / -name memcache* | grep memcache
# > /usr/lib/php5/20131226/memcache.so
# Ajouter extension=/usr/lib/php5/20131226/memcache.so dans le fichier php.init

# Installation de PHPUnit
wget https://phar.phpunit.de/phpunit.phar
# Rendre l'archive exécutable
chmod a+x phpunit.phar
# Déplacer l'archive dans un dossier accessible globalement
# et le renommer
mv phpunit.phr /usr/local/bin/phpunit

# Tester le bon fonctionnement
phpunit --version
