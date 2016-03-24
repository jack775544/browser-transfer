# INFS3202 Assignment

An sftp client implemented in a web browser

Takes extensive use of the [phpseclib library](https://github.com/phpseclib/phpseclib/)

INSTALLATION
---
Download phpseclib to the target directory and install it.

    git clone https://github.com/phpseclib/phpseclib.git
    cd phpseclib
    curl -sS https://getcomposer.org/installer | php
    php composer.phar install

Next remove conflicting files from the downloaded repo.

    rm -rf .git
    rm .gitattributes
    rm .gitignore
    rm LICENSE
    rm README.md

Now install the repo

    git init
    git remote add origin https://bitbucket.org/jack775544/browser-transfer.git
    git fetch
    git checkout -t origin/master

Notes
---
By default zones at UQ have outgoing connections from port 22 blocked, this means that this will not work on the normal settings! To get port 22 unblocked on the UQ Zones, contact the ITIG helpdesk for assistance.
