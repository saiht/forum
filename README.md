# Create forum with TDD

If you want to test this project, start by cloning the project with this command:

`git clone git@github.com:saiht/forum.git`

Then, copy .env.example to .env:

`cp .env.example .env`

Now you need to generate a new key for laravel:

`php artisan key:generate`

Edit .env file to access to your database.

To generate entities for users, threads, relies,... You need to use this command to migrate database:

`php artisan migrate`

And to generate entities, helpers have been created for you, copy and execute all the commands below:

`php artisan tinker`

You will have access to the artisan tinker to edit, add, remove,... entities. Type to generate threads, and then to generate replies to each thread

`$threads = factory('App\Thread', 50)->create();`
`$threads->each(function($thread) { factory('App\Reply', 10)->create([ 'thread_id' => $thread->id ]); });`

Now you are ready, type :

`php artisan serve`
 
 And open your browser to the indicated url.

 If you want, you have Unit/Feature testing available with the simple `phpunit` command.

 Enjoy !
