# theNetwork
1. Clone the repository
> git clone https://github.com/danschdev/theNetwork
2. Install the required packages
> composer install
3. Start Docker Desktop (on Windows)
>
4. Start the database service
> docker-compose up -d
5. Start the Symfony server
> symfony server:start
6. Call the project URL in your browser
> http://127.0.0.1:8000/

# code quality
## PHPStan
> vendor/bin/phpstan analyse src --level 0 

> vendor/bin/phpstan analyse src --level 9

The higher level, the stricter errors are reported
## CS-Fixer
> vendor/bin/php-cs-fixer fix src

# database
Create a migration based on the coded entities:
> symfony console make:migration

Show a list of all migrations
> symfony console doctrine:migrations:list

Execute migrations which have not been executed yet:
>  symfony console doctrine:migrations:migrate

Query the database:
> symfony console doctrine:query:sql 'SELECT * FROM post'

Drop the database content and load fixtures into the db:
> php bin/console doctrine:fixtures:load
Attention, the database server port must be set in the .env file at DATABASE_URL, according to the port used by the docker container.
