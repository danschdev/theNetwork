# theNetwork
1. Clone the repository
> git clone https://github.com/danschdev/theNetwork
2. Install the required packages
> composer install
3. Start Docker Desktop (on Windows)
>
4. Start the Symfony server
> symfony server:start
5. Call the project URL in your browser
> http://127.0.0.1:8000/

# code quality
## PHPStan
$ vendor/bin/phpstan analyse src --level 0 
$ vendor/bin/phpstan analyse src --level 9
The higher level, the stricter errors are reported
## CS-Fixer
$ vendor/bin/php-cs-fixer fix src
