# Running the project
To run the project you will need PHP 8.0+ installed.

The first step is to install the dependencies with `composer install`. If you do not have composer installed, follow the documentation [here](https://getcomposer.org/download/).

After this step is finished, you can serve the project with `symfony server:start`. 
If the `symfony` command is not available, you can install it following [the documentation](https://symfony.com/doc/current/setup/symfony_server.html).

# Testing
The project was made with testing in mind. To run the tests, simply run `php bin/phpunit` from within the project folder.
