# docker-compose PHP MariaDB slim4 Boilerplate

1. start and get logs

```
docker-compose up
```

2. open an new terminal and get into PHP container

sudo systemctl stop mysql
```
docker-compose exec --workdir /app php /bin/bash
```

3. within the PHP container, install compose dependencies

```
composer update
```

4. slim app runs on http://localhost:8080

php vendor/bin/doctrine orm:schema-tool:create

5. Informations sur le projet
```
    - Pour lancer une partie il faut être sur la page racine 'localhost:8080' et cliquer sur le bouton 'Commencer', on arrive sur une page load qui crée la base de données pour une nouvelle partie et qui est sensé redirige vers la page de jeu (marche pas). Pour se redireger manuellement il faut aller sur 'localhost:8080/game' et la partie commence.
    - Pas gestion des différentes parties, si plusieurs parties sont lancées en même temps, elles se superposent et ça casse tout.
    - Pour recommencer une partie il faut vider la base de données et relancer une partie.
    - Si le joueur défausse une carte sans faire exprès il ne peut pas la récupérer
    - Si le joueur doit additionner une carte et une valeur qui n'est pas celle d'une carte, il doit additionner à la main et ne peut pas utiliser la fonction combiner, il doit la piocher
    - Le joueur peut piocher une carte dont il ne devrait pas avoir accès
    
```
