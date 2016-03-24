INFS3202 Assignment
-----

An sftp client implemented in a web browser

Takes extensive use of the [phpseclib library](https://github.com/phpseclib/phpseclib/)

To install, first download phpseclib to the target directory and install it.

    git clone https://github.com/phpseclib/phpseclib.git
    curl -sS https://getcomposer.org/installer | php
    php composer.phar install

Next remove conflicting files from the downloaded repo.

    rm .gitattributes
    rm .gitignore
    rm LICENSE
    rm README.md

Now install the repo

    git init
    git remote add origin https://bitbucket.org/jack775544/browser-transfer.git
    git fetch
    git checkout -t origin/master
