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
