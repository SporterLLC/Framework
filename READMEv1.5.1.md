[![Build Status](https://travis-ci.org/snopboy/Sporter.svg?branch=master)](https://travis-ci.org/snopboy/Sporter)
# Sporter Framework

> Welcome to the private git of Sporter Framework project.

> Sporter is a mini framework built specifically for MapleStory websites but can very well be used for other purposes.

> Sporter is currently under development and is a closed private project.

> Sporter is built to kickstart development of websites for any purpose and websites specifically for MapleStory servers, carefully crafted with ease, flexibility, simplicity and speed in mind.

Features
============
Sporter currently has the following features:

> - **Error Handling** - Handles all errors (PHP errors, PHP notices&warning and Debug messages) and passes them to the Logging Handler.
> - **Logging** - Logs all messages, warning, notices, errors and debug messages, all of which by severity, much like Laravel's/CodeIgniter's logging system, except that this one saves it all to the Database.
> - **Routing** - Tired of all the unsafe $_GET? Here comes the Routing system.
> - **Query Builder** - Tired of sanitizing and filtering every Query? Don't like writing long ass queries every single time? The QueryBuilder will do it for you!
> - **Database Drivers** - Switching DB driver has never been easier! Simply change the key ['dbdriver'] in $db array and it will adjust the connection and all queries automatically! Currently support only MySQLi, though it's a switch so adding new drivers is easy. MySQLi is the default driver, if you leave the ['dbdriver'] key empty or nulled it will still use MySQLi.
> - **Multilingualism** - Adding new languages is a matter of editing a simple array and texts in each key, will be changed later to read languages stored in the Database instead.
To output text of one of the langs, simply use the lang() function.


This mini-framework mostly uses plain PHP (procedural) and some OOP and does not follow the MVC pattern.

It does however make use of similar functionalities as other MVC OOP frameworks do, I.E.

Routing, Logging (mine is different, instead of storing in a file it stores in SQL Db), Templating, Page files (the actual content of each page is stored in it's own file, works like Laravel's Blade), DB Drivers, Automated Query Building, and more..

It's expected that eventually every single line of code will be rewritten in a much better way and of course in full OOP, however I'm starting with mostly procedural and writing just a few OOP classes to get more familiar and used to it, the more I learn to write and use OOP code the more procedural functionalities will be rewritten in OOP, so bear with me.



## Function lang()
The function accepts the following
```php
lang($a, $b, $param, $param2, $param3, $param4, $param5);
```
The variables are placeholders for the following, bellow you can see what's being defined and where, how and why.

**$a** is the desired language

**$a** accepts the following
```php
[NULL || (unique number of desired language to force it)];
```
**NULL** will allow the Language handler define the language (by both website settings and user settings).

**n** a unique number will force the language which is set with this unique number.

**$b** is the sentence you want to output, it's a key in the lang array.

**$param** - **$param5** are all optionals, used to pass non-static values and variables to the Lang, For example
```php
$locationVar = 'Ragezone';
lang(NULL, 'current_location', $locationVar);
#This wherever you want the sentence to be printed in the View.

$lang = array (1 => array ('current_location' => 'You're in %PARAM%'));
#This is set in _app/configuration/languages.php

#Will become 'You're in Ragezone', backslash used to escape single quotes (lol).
```

## Dynamic Lang Selection
Want to change languages to the entire application? Simply edit **$config** array to display a different locale, also if there's a problem with this locale, the fallback_locale will kick in so no worries. Currently has English and Korean.

## Dynamic Breadcrumbs
To make sure your visitors always know where they are.

## Safe Linking
To both safely and accurately link your assets and url links with ease, full url is specified -
```php
safeLink('News/Sporter-Framework-FTW');
```
OR
```php
safeLink('Path/To/Static/File.css', 'static');
```
will return
```php
//www.example.com/News/Sporter-Framework-FTW
```
OR
```php
//cdn.example.com/Path/To/Static/File.css
```
// is for dynamic protocol selection, if your current protocol is http then when clicking it will redirect you on http, if your current protocol is https (secured) then it will serve the page in https.

## Templating
Instead of editing tens files to change your design template, all you need to do is edit one!

## Partial OOP
I'm really new to Object Oriented Programming so only the Routing and QueryBuilder are written in classes.


Once I finish working on the basic functionalities of the application, I'll start working on MapleStory-related functionalities and design (I already have a gorgeous design almost done, I promise you it's the most beautiful, professional and modern MSPS web design, guaranteed!), though I wont show it up just yet because I want to avoid rips like was with MapleBool.

Not sure how many lines of code the entire application currently has, but I just checked and today alone I wrote over a thousand lines, lol.

Also I'm using global ENV vars to define which view to load and of course the page title present in the Breadcrumbs.

I know the "risks" of using it but in this case there is no risk, moreover it does what I need = Set a environment variable temporary for the current request ONLY and resets it after the request is done.

## Credits
 - **AltoRouter - Routing Library** - https://github.com/dannyvankooten/AltoRouter
 - **GUMP - Validation Library** - https://github.com/Wixel/GUMP
 - **Logging Function** - https://web.stanford.edu/dept/its/communications/webservices/wiki/index.php/How_to_create_logs_with_PHP
 - **Bootstrap** - © Twitter Boostrap Team https://github.com/orgs/twbs/people
 - **Bootstrap-RTL** - https://github.com/morteza/bootstrap-rtl


# Screenshots
Currently this Bootstrap layout is used for presentation.

Breadcrumbs test
![Breadcrumbs](https://forum.ragezone.com/cache.php?img=http%3A%2F%2Fi.imgur.com%2FEnRFVBc.png)

Home page
![Homepage](https://forum.ragezone.com/cache.php?img=http%3A%2F%2Fpuu.sh%2FlRZdx%2Febff2384b5.png)

News page
![News](https://forum.ragezone.com/cache.php?img=http%3A%2F%2Fpuu.sh%2FlRZhB%2Fbec8c2e969.png)

Error404 page
![Error404](https://forum.ragezone.com/cache.php?img=http%3A%2F%2Fpuu.sh%2FlRZtm%2F89822c449f.png)

Korean
![Korean](https://forum.ragezone.com/cache.php?img=http%3A%2F%2Fpuu.sh%2FlRZy6%2Fb8b0739a19.png)

Hebrew (**RTL**)
![Hebrew](https://forum.ragezone.com/cache.php?img=http%3A%2F%2Fi.imgur.com%2FNfysVXX.png)