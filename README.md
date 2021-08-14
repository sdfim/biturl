# biturl
Simple URL shortener service, it allows you to make long links short with only one click! <br>
Your shortened URLs can be used in publications, advertisements, blogs, forums, e-mails, instant messages, and other locations.

## **install:**

`git clone git@github.com:sdfim/biturl.git` 

`cp .env.dist .env` 

and fill in parameters: <br>
* APP_ENV=prom <br>
* DATABASE_URL <br>
* YOUR_HOST_NAME <br>
<br>

`composer install` 

`php bin/console doctrine:migrations:migrate` 

`php bin/console cache:clear --env=dev` 
