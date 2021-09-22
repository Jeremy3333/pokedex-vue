TWP
=======

TWP is a web site where you can manage post a sort theme, in this site you can:

- post, and delete posts with a title and a content
- you can link posts with categorise

Download
--------

you can clone this repository

    git clone https://github.com/EpitechDigital2020/D-DEV-121-PAR-1-1-pokedex-jeremy.simond.git

Install
-------

 don't forget to change your database info in your wp-config.php file

    define('DB_NAME', '[your database name]');
    define('DB_USER', '[the name of the user that wordpress have to use]');
    define('DB_PASSWORD', '[your databases password]');
    define('DB_HOST', '[your database host (generaly localhost)]');

after that launche your wordpress serv with:

    php -S 0.0.0.0:8000

 go to your navigateur with the link http://0.0.0.0:8000 and follow the instruction after that go to settings > permalink and select any other than the default one

and launch a local server of vuejs with:

    npm run dev