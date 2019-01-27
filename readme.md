<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


# Schedule v1.0
<p>
    Hello there! Welcome to Schedule v1.0 repository. Here you can clone this repo freely, ya of course.
    But, wait, what do I clone this repo for? Okay.. okay.. I almost forgot. Then, lemme introduce this app.
    Schedule is web based app, built using Laravel (spesifically laravel v^5.7.), and its main purpose is to help you manage your schedhule, what i've implemented here is managed my class schedules of my campus. Hoping this would aplicable to any kinds of scheduling.</p>

# Configuring app
* open <pre>.env</pre> file, then set your database configuration
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_pass
```
* I've provided some demo, so you don't need to create data from scrath to see how this works,following are the steps
1. In your terminal (assuming you have located dir to schedule app project, exp: ~$ user/project/schedule_app) and then type following command
```
php artisan migrate
```
this command will migrate tables to your database.
2. Import/insert data to database by typing command below
```
php artisan db:seed
```
this command will call seeder classes:
Seeding: _LecturerSeeder_
Seeding: _RoomSeeder_
Seeding: _AppSeeder_
Seeding: _UserSeeder_

3. To be able to access dashboard it requires some authentication, to create one there is no interface to accompish that goal, instead we could configure it throug database seeding
go to _database/seeds/UserSeeder.php_ and you'll find this lines of code
```php
public function run()
{
    User::create([
        'username' => 'your_username', // create your own username
        'password' => bcrypt('your_password') // create your own password
    ]);
}
```
But, because of we're in a demo mode for now, so username and password has already availabel, you could check UserSeeder class inside this directory _database/seeds/UserSeeder.php_ and see your current password and username by your self (sorry i can't tell those here, it's too sensitive XD).

4. The app is ready to use, <pre>http://localhost:8000/schedule</pre> this is starting endpoint, type that url in your browser to what's happen next

* If you intended to create data from scracth i highly recommend to run following command to start
```
php artisan db:seed --class=UserSeeder
```
*Note:* Some links will not available if you create from scratch, and even will cause an error, but it's OK, keep calm and do not panic!
