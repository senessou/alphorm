#!/usr/bash

# -------------------
# Apache
# -------------------

# Install Apache
apt-get install apache2

# Installer un sertificat pour les conndexions sécurisées
# Pré-requis : Disposer d'un nom de domaine qui pointe vers l'adresse IP du serveur
# 1) Télécharger le script de Let's Encrypt
cd /opt
sudo git clone https://github.com/letsencrypt/letsencrypt
# 2) Vérifier le fichier well-known
nano /.well-known
# 3) Exécuter le script pour engendrer le certificat
cd letsencrypt
./letsencrypt-auto --apache -d [exemple.org] -d [atelier.exemple.org]
# 4) le domaine sécurisé
 cd /etc/letsencrypt/live
 cd [exemple.org]
 # Les fichiers de certificats liés au domaine [exemple.org]
 ls -al
# 5) Demander le renouvellement automatique du certificat
./letsencrypt-auto renew
# 6) Nouvelle entrée dans la crontab pour renouvellement régulier (90 jours)
# 30 2 * * 1 /opt/letsencrypt/letsencrypt-auto renew >> /var/log/le-renew.log


# -------------------
# MySQL
# -------------------

# Install MySQL
apt-get install mysql-server
mysql_secure_application
# Inspecter le fichier de configuration
# nano /etc/mysql/my.cnf

# -------------------
# PHP
# -------------------

# Installer PHP 5.6
apt-get install php5
apt-get install php5-dev
# + le connecteur PHP - MySQL
apt-get install php5-mysql
# Installer phpMyAdmin comme interface d'administration de MySQL
apt-get install phpMyAdmin
ln -s /usr/share/phpmyadmin /var/www/html/phpmyadmin

# Il est également possible d'installer PHP 7 avec la même procédure

# relancer le serveur HTTP
/etc/init.d/apache2 restart


# -------------------
# FTP
# -------------------

# Installer le serveur FTP
apt-get install vsftpd
# Archive du fichier de configuration par défaut
mv vsftpd.conf vsftpd.conf.bak
# re-création du fichier de configuration
nano vsftpd.conf
# Création d'un nouvel utilisateur autorisé à se connecter
useradd -g www-data -m -p cheshire alice
# Création du répertoire de configuration des utilisateurs FTP
mkdir /etc/vsftpd/vsftpd_user_conf
cd /etc/vsftpd/vsftpd_user_conf
# Création du fichier de configuration de l'utilisateur alice
# Le fichier doit appartenir à l'utilisateur www-data
nano alice
# Redémarrage du démon vsftpd
/etc/init.d/vsftpd restart
# Création du fichier source pour la base de données utilisateurs
cd /etc/vsftpd
nano login.txt
# Création de la base de données (version selon le serveur 4.8 ou 5.3)
# En cas d'erreur, réinstaller via apt-get : apt-get install db5.3-util
libdb5.3_load -T -t hash -f /etc/vsftpd/login.txt /etc/vsftpd/login.db
# Redémarrage du démon (par précaution)
/etc/init.d/vsftpd restart

# L'accès via FTP est disponible !


# -------------------
# Administration Apache
# -------------------

# Activation des modules Apache nécessaires
a2enmod headers # Gestion des entêtes HTTP
a2enmod rewrite # Gestion de la réécriture d'URL
a2enmod expires # Gestion des entêtes de cache (dates d'expiration)

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
