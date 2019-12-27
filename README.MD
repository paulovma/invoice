<h1>Invoice App</h1>

<p>
    Steps to put the application up
</p>

<p> 1. Make sure you have docker installed </p>
<p> 2. Run docker-compose up -d </p>
<p> 
3. Connect via bash to the application container and run :
<p> 3.1 composer install </p>
<p> 3.2 php vendor/bin/doctrine-migrations migrations:migrate</p> 
<p> 3.3 php bin/console assets:install </p>
</p>
<p> 4. The application makes use of the following mysql user and password : arquivei; password;
If you want to use any other user and password, please make you've changed the following files : .env; bootstrap.php;
</p>
<p> 5. There are some variables in .env file which you need to fill in. </p>
<p> 6. If everything went well, the swagger documentation will be available in : /api/doc </p>

<h2> Missing features </h2>

<p> Integration Tests </p>
<p> Swagger Documentation </p>
