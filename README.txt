1- Create relations with MySQL Workbench : ifaeveil.mwb
2- Create DB from .mwb file : Database->Forward Engineer...
3- Download the Laravel installer using Composer:
  composer global require laravel/installer
4- Create a fresh Laravel installation:
  composer create-project --prefer-dist laravel/laravel:^7.0 ifaeveil
5- Follow steps at https://labs.infyom.com/laravelgenerator/docs/7.0/installation
6- Follow steps at https://labs.infyom.com/laravelgenerator/docs/7.0/publish-layout
7- Add an admin via thinker:
  php artisan tinker
  use App\User
  use Illuminate\Support\Facades\Hash
  $user=new User
  $user->create(['username'=>'admin','role'=>1,'password'=>Hash::make('password')])
8- Make username authentication : https://www.youtube.com/watch?v=Qtiyo2J_-tA&feature=youtu.be
9- Generate code for admin CRUD:
php artisan infyom:scaffold Admin --fromTable --tableName=admins
10- Test route:  php artisan make:test AdminTest
  vendor/bin/phpunit --filter test_only_login_users_can_see_admin_list

php artisan infyom:scaffold Quiznote --fromTable --tableName=quiznotes


test CRUD a faire
1- admins
2- classes
3- annees
4- etapes
5- profs
6- assignations
7- eleves
8- users
9- Changer mot de passe
10- matieres
11- lecons
12- exams
13- soumissions
14- messages
15- quiz questions
16- quiz
17- note quiz

