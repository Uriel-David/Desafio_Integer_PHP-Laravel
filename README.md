# Integer Backend Challenge - PHP/Laravel
Challenge for the PHP + React Full Stack Developer vacancy.
This part of the project aims to implement the backend of a To Do list,
the project was developed with PHP 8, Laravel 11, MySQL e Docker, and basically
allows you to perform basic operations (CRUD).

## Project Setup
To install the project, simply use the `composer install` command in the project’s root folder.
After that, simply run the project with the `./vendor/bin/sail up -d --build` command.
After that, use the following command `./vendor/bin/sail artisan migrate` and you will
be able to use and test the api at this url `http://localhost/api/todos`.

## Notes
If you want to use the command in a simplified way, in this case just `sail command...`
just enter this command in the terminal `alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail) '`.

There is a very simple test suitcase for the controller, where you can if you want to run
the command `./vendor/bin/sail artisan test`, Furthermore,
if necessary, there is a seeder created to supply all tables in both the standard base and the test base,
just run the command `./vendor/bin/sail artisan db:seed --env=testing` the parameter `-- env=testing`
is to call the env from test instead of development.
