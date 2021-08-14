# biturl
Simple URL shortener service, it allows you to make long links short with only one click! <br>
Your shortened URLs can be used in publications, advertisements, blogs, forums, e-mails, instant messages, and other locations.

## **install:**

`git clone git@github.com:sdfim/biturl.git` <br>
`cp .env.dist .env` <br> 
and fill in parameters <br>
`composer install` <br>
`php bin/console doctrine:migrations:migrate` <br>
`php bin/console cache:clear --env=dev` <br>
