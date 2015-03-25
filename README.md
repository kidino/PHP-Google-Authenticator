PHP Google Authenticator Demo
=============================

This is not meant as a fully functional application. It is only to demonstrate how to make use of Google Authenticator Mobile App with your website as a 2-Factor login system, or as a one-time password.

This simple PHP script demonstrates the implementation of Google Authenticator with PHP. To utilise this, you will need to download the Google Authenticator app. This script also utilizes Google Authenticator Library from PHPGangsta

***PHPGansta Google Authenticator Library***
https://github.com/PHPGangsta/GoogleAuthenticator

***Google Authenticator***

* ***Android*** 
https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2
* ***iOS (iPhone and iPad)***
https://itunes.apple.com/my/app/google-authenticator/id388497605?mt=8
* ***Windows Phone***
http://www.windowsphone.com/en-us/store/app/authenticator/021dd79f-0598-e011-986b-78e7d1fa76f8

How To Use
----------

First of all, check the script. That is where the goodies are.

There is only one thing to modify in ```login.php```. Just change the ```$app_name``` variable to reflect your application.

To test it, point your browser to ```login.php``` and just follow the login process.

Note
----

Just to demonstrate on how this works, the script will store the users' secret key in a text file which is named by hashing the email address with a MD5. So later, you will have some extra files on your web folder. Of course, this is not the ideal way of storing the users' secret key. You better use a database, a folder below the web public, or any other methods.

This whole project is meant as a demo.
