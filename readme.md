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
#### Using Composer
Inside working dir type <code>composer install</code>. It will install all dependencies inside package.json including require dev. Then type command <code>php artisan key:generate
    
#### Rename <code>.env.example to .env</code>, then set your database configuration
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_pass
```
#### I've provided some demo, so you don't need to create data from scrath to see how this works, following are the steps
* In your terminal (assuming you have located dir to schedule app project, exp: ~$ user/project/schedule_app) and then type following command
```
// this command will migrate tables to your database.
php artisan migrate
```

* Import/insert data to database by typing command below
```
php artisan db:seed
```
above command will call these seeder classes:
<pre>
Seeding: LecturerSeeder<br>
Seeding: RoomSeeder<br>
Seeding: AppSeeder<br>
Seeding: UserSeeder<br>
</pre>

* To be able to access dashboard it requires some authentication, to create one, there is no interface to accompish that goal, instead we could configure it through database seeding. Just go to <code>database/seeds/UserSeeder.php</code> in your project folder and you'll find these lines of code
```php
public function run()
{
    User::create([
        'username' => 'your_username', // create your own username
        'password' => bcrypt('your_password') // create your own password
    ]);
}
```
But, because of we're in a demo mode for now, so username and password has already availabel, you could check UserSeeder class inside this directory <code>database/seeds/UserSeeder.php</code> and see your current password and username by your self (sorry i can't tell those here, it's too sensitive XD).

* The app is ready to use, <code>http://localhost:8000/schedule</code> this is starting endpoint, type that url in your browser to see what's happen next

#### If you intended to create data from scracth, i highly recommend to run following command to start
```
php artisan db:seed --class=UserSeeder
```
*Note:* Some links will not available if you create from scratch, and even will cause an error, but it's OK, keep calm and do not panic!

for more info, you can contact to this email <code>cocokbanget29@gmail.com</code><br>
Have a nice day!
