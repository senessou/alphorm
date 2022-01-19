#!/usr/bash

# Le script nécessite d'avoir python et pip installés
# Installation (éventuelle) de la bibliothèque Graphviz
pip install graphviz

# Installation de PHPDocumentor
wget https://phpdoc.org/phpDocumentor.phar

# Rendre le code exécutable
chmod a+x

# Déplacer le code dans un répoertoire accessible globalement
# et le renommer
mv phpDocumentor.phar /usr/local/bin/phpdoc

# Aller dans le répoertoire racine de votre application et exécuter phpdoc sur votre code
# l’option -d indique la hiérarchie de répertoires à examiner
# l’option -t indique le nom du répertoire ou archiver la documentation
phpdoc -d . -t docs
