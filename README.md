## REST API with Symfony

This is an application which exposes an API route to divide two numbers.

The precision of numbers is limited by 5 to avoid weird behaviour related to how PHP (and not only PHP) stores and
compares floats.

The precision value used by API to divide numbers is set as a service's configuration value in Symfony.
The app contains several unit and functional tests.

### How to run the application
1. Clone the repository form GitHub.
2. Run ```docker-compose up``` from the app directory.
3. To run the tests open the container's shell and run ```bin/phpunit```. Set a testsuite if needed when running tests.
Available test suites are "Unit" and "Functional".

The app runs on the PHP's built-in web server which is set up with the container.
