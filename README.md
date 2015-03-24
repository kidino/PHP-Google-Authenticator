PHP Google Authenticator Demo
=============================

This is not meant as a fully functional application. It is only to demonstrate how to make use of Google Authenticator Mobile App with your website as a 2-Factor login system, or as a one-time password.

This simple PHP script demonstrates the implementation of Google Authenticator with PHP. To utilise this, you will need to download the Google Authenticator app. This script also utilizes Google Authenticator Library from PHPGangsta

***PHPGansta Google Authenticator Library***
https://github.com/PHPGangsta/GoogleAuthenticator

***Google Authenticator Android App*** 
https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2

How To Use
----------

First of all, check the script. That is where the goodies are.

There is only one thing to modify in ```login.php```. Just change the ```$app_name``` variable to reflect your application.

To test it, point your browser to ```login.php``` and just follow the login process.