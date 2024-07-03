# Projet PhoenixPedia

Il s'agit d'un projet d'application web utilisant :
* **PHP** : version `8.3.7`.<br><br>
* **Laravel** : version `11.9`.<br><br>
* **Bulma** : version `1.0.1`. <br><br>
* **Nginx** : version `1.26.0`. <br><br>
* **MariaDB** : version `latest`. <br><br>

## Mise en place de l'environnement de développement

### Prérequis

* **Installer Docker et Docker Compose** : disponible sur le [site officiel](https://www.docker.com).<br><br>
* **Cloner le Répertoire du Projet** :
   ```sh
  git clone https://github.com/Green-Blind/PhoenixPedia.git
  cd PhoenixPedia/phoenixpedia
  ```
  <br>

### Étapes pour Configurer l'Environnement de Développement

* **Copier le fichier** `.env.example` en `.env` :
   ```sh
  cp .env.example .env
  ```
  <br>
* **Copier le fichier** `laravel.conf.example` en `laravel.conf` :
   ```sh
  cp nginx/conf.d/laravel.conf.example nginx/conf.d/laravel.conf
  ```
  <br>
* **Mettre à jour les variables d'environnement** : Vérifiez que les informations dans le fichier `.env` et `laravel.conf` soient correctes, en particulier celles concernant la base de données.<br><br>
* **Installer les dépendances PHP avec Composer** : Si Composer n'est pas installé sur votre système, il est disponible depuis le [site officiel](https://getcomposer.org).<br><br>
   ```sh
  composer i
  ```
  <br>
* **Installer les dépendances PHP avec Composer** : Si Composer n'est pas installé sur votre système, il est disponible depuis le [site officiel](https://getcomposer.org).<br><br>
   ```sh
  npm i
  ```
  <br>
* **Générer l'APP_KEY** :
   ```sh
  php artisan key:generate
  ```
  <br>
* **Lancer Docker Compose** : Assurez-vous que Docker est en cours d'exécution, puis utilisez Docker Compose pour démarrer les conteneurs.<br><br>
   ```sh
  docker-compose up -d
  ```
  <br>
* **Exécuter les migrations de la base de données** :
   ```sh
  docker-compose exec app php artisan migrate
  ```
  <br>

### Vérification et Résolution des Problèmes

* **Vérifier l'état des conteneurs** : Assurez-vous que tous les conteneurs sont en cours d'exécution.
   ```sh
  docker ps
  ```
  <br>
* **Accéder à l'application** : Ouvrez votre navigateur et accédez à [http://localhost:8081](http://localhost:8081) pour vérifier que l'application Laravel fonctionne correctement.<br><br>
* **Accéder à phpMyAdmin** : Ouvrez votre navigateur et accédez à [http://localhost:8082](http://localhost:8082) pour accéder à phpMyAdmin et vérifier que la base de données est accessible.<br><br>

### Reconstruction des Images

Lorsque vous apportez des **modifications** au `Dockerfile`, au `docker-compose.yml`, aux fichiers sources ou aux configurations de service. Il sera peut-être nécessaire de reconstruire les **images Docker**.
Cela garantit que les changements sont pris en compte dans les nouvelles instances de **conteneurs Docker**.
   ```sh
  docker-compose up -d --build
  ```
  <br>

### Modification dans les Fichiers de Code

Si vous modifiez uniquement des fichiers comme des vues (dans `resources/views`), des modèles (dans `app/Models`) ou des contrôleurs (dans `app/Http/Controllers`), voici le comportement :
* **Vues** : Les modifications dans les fichiers de vues sont prises en compte immédiatement lorsqu'elles sont sauvegardées, sans nécessiter de redémarrage des conteneurs Docker.<br><br>
* **Modèles et Contrôleurs** : Pour les changements dans les fichiers PHP tels que les modèles et les contrôleurs, Laravel détecte automatiquement ces modifications lorsqu'elles sont enregistrées. Par conséquent, vous n'avez pas besoin de redémarrer les conteneurs Docker.

### Cache et Optimisation

Cependant, il y a certains scénarios où Laravel utilise des caches ou des optimisations qui pourraient nécessiter une mise à jour manuelle si les changements n'apparaissent pas immédiatement :
* **Cache Configuration** : Si vous modifiez des fichiers de configuration (`config/`) ou d'autres fichiers de configuration Laravel, il est recommandé de vider le cache Laravel en utilisant la commande artisan :
   ```sh
  docker-compose exec app php artisan config:cache
  ```
  <br>  
* **Autoload Class Mapping** : Si vous ajoutez de nouvelles classes ou des classes dans des répertoires non standard, tu peux devoir régénérer l'autoload :
   ```sh
  docker-compose exec app composer dump-autoload
  ```
  <br>  

### Redémarrage Sélectif
Si vous effectuez des changements qui ne semblent pas être pris en compte immédiatement (par exemple, des changements dans des configurations spécifiques qui ne sont pas rafraîchies automatiquement), vous pouvez redémarrer sélectivement les services nécessaires. Par exemple :
   ```sh
  docker-compose restart app
  ```
  <br>  

Cela redémarre uniquement le service `app` (contenant PHP-FPM dans ce cas), ce qui peut suffire pour appliquer les modifications récentes.


