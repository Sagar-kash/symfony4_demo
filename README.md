Symfony Demo
========================

This is  a demo. Kindly folow below steps for installations.
1) git pull
2) Rename .env.dist to .env
3) change db credentials
4) composer install
5) php bin/console doctrine:migrations:diff
6) php bin/console make:migration
7) ./node_modules/.bin/encore production
8) config\packages\security.yaml contain's username and password

as per requirements there are flowing features in the project
1) Few doctrine entities (two entities employee and department)
2) CRUD application (crud application on both employee and department)
3) One custom doctrine extension (there is a postupdate event on employee, wherever there is employee created it automatically add created_date in database in employee column src\EventListener\PostEmployeeSubscriber.php)
4) One custom DQL function there are two places where I have used custom DQL one in src\EventListener\PostEmployeeSubscriber.php and other at src\Form\EmployeeType.php
5) One custom twig extension (src\Twig\DemoExtension.php For custom date format)
6) Authentication there is FOS user Auth
7) Symfony events Subscriber (src\EventListener\PostEmployeeSubscriber.php)
8) Symfony ACL (admin have access to employee and super-admin had both employee and department)


Atuhor:
Sharma Kailash
kailash_kds@yahoo.com
