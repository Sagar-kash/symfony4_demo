Symfony Demo
========================

This is  a demo. Kindly folow below steps for installations.
1) git pull
2) Add database credentials in app/config/parameters.yml
3) composer install
4) php app/console doctrine:schema:update --dump-sql
5) php app/console doctrine:schema:update --force
6) Create users one admin and other super-admin because admin have access to employee and super-admin had both employee and department
7) php app/console fos:user:create adminuser --super-admin
8) php app/console fos:user:demote testuser ROLE_ADMIN


as per requirements there are flowing features in the project
1) Few doctrine entities (two entities employee and department)
2) CRUD application (crud application on both employee and department)
3) One custom doctrine extension (there is a postupdate event on employee, wherever there is employee updated it automatically add modified_date in database in employee column src\DemoBundle\EventListener\PostEmployee.php)
4) One custom DQL function there are two places where I have used custom DQL one in src\DemoBundle\EventListener\PostEmployee.php and other at src\DemoBundle\Form\EmployeeType.php
5) One custom twig extension (src\DemoBundle\Twig\DemoExtension.php For custom date format)
6) Authentication there is FOS user Auth
7) Symfony events (src\DemoBundle\EventListener\ExceptionListener.php)
8) Symfony ACL (admin have access to employee and super-admin had both employee and department)


Atuhor:
Sharma Kailash
kailash_kds@yahoo.com
