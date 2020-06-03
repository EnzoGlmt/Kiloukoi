# Kiloukoi
Site de location d'outils de particulier à particulier.

Lundi 25/05, création du projet symfony dans VSCode et sur Github avec le groupe.

# SYMFONY

## COMPOSER

- aller sur getcomposer.org, lien "download" sur la page d'accueil
- Windows : télécharger l'exécutable et le lancer
- Mac : ouvrir un terminal et suivre les instructions
- à ne pas réinstaller pour chaque nouveau projet Symfony

## NOUVEAU PROJET SYMFONY (4.4)

- se rendre dans le dossier www via le terminal :
```
cd chemin_vers_www
```
- créer le projet :
```
composer create-project symfony/website-skeleton nom_du_projet ^4.4.*
```
## GIT

- créer un dépôt distant sur GitHub
- dans un nouveau terminal, aller dans le dossier Immobilier :
```
cd /Applications/MAMP/htdocs/immobilier
```
- initialiser Git :
```
git init
```
- relier le dépôt distant :
```
git remote add origin https://github.com/davidHurtrel/immobilier.git
```
- ajouter des fichiers :
```
git add *
```
```
git commit -m "..."
```
```
git push origin master
```

## APACHE-PACK

- barre de débug / routing :
```
composer require symfony/apache-pack
```

## CONTRÔLEUR

- créer un contrôleur (et la vue associée) :
```
php bin/console make:controller
```

## BASE DE DONNÉES

- ligne 32 dans .env (y modifier avec les informations de connexion phpMyAdmin) :
```
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
```
- créer la base :
```
php bin/console doctrine:database:create
```
- créer une entité (table) :
```
php bin/console make:entity
```
- migration :
```
php bin/console make:migration
```
```
php bin/console doctrine:migrations:migrate
```
-Recupere la base de donnée dans la personne a fais un push, faire un pull après avoir fait : 
'''
php bin/console doctrine:schema:update --force 

git reset --hard  :cela supprime toute les modifs faite donc faire tres attentions. 

