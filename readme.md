# Isoler docker
 - Créer un répertoire .docker
 - Déplacer le fichier DockerFile, la structure de base et le vhost.conf dedans
 - Corriger le fichier docker-compose.yml
 - Recompiler et lancer compose

# require automatique des classes, utilisation de l'autoloader psr-4
 - Déplacer les classes dans un répertoire src
 - Renommer les répertoires / psr (majuscule), définir les namespaces
 - Set l'autoload dans le fichier composer.json
 - Dump de l'auto-loader (composer dump-autoload)

# Sass
 - gem install compass
 - Dans la vue, link un fichier css
 - S'assurer que le fichier css est bien lu et interprété par le navigateur
 - fichier css accessible depuis le répertoire public
 - Ajouter une règle dans le fichier scss
 - Configurer le watcher (compass watch sass/hello.scss)

# Sécuriser l'accès au code
 - accéder à localhost:8003/.docker/Dockerfile ou localhost:8003/vendor/... <- faille de sécurité
 - créer un répertoire public
 - mettre uniquement l'index du site et la feuille de style dans ce répertoire
 - modifier le vhost pour que le document root pointe sur le répertoire public
 - recompiler l'image avec docker-compose up --build
 - Vérifier qu'on accède plus au fichier

