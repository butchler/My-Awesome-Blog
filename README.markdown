My Awesome Blog
===============

This is a (currently in progress) project to teach my friend how to create a simple blog using PHP and MySQL. You can check out how the simple blog looks [here](http://butchler.github.com/My-Awesome-Blog/) and view the [commit history](http://github.com/butchler/My-Awesome-Blog/commits/master) or the tags to see how the project evolves from simple/naive implementations up to a full blog system. The goal is that, by doing it this way, it will be very clear why things are done the way they are in the final product.

Version 1 - Static HTML
-----------------------

[(Browse Source)](http://github.com/butchler/My-Awesome-Blog/tree/version1-static-html)

The first version just uses static HTML and CSS files. However, all of the content that will be on the website is already there. Nothing about the HTML should really change after this point, only how the HTML is generated.

There are three main pages on the website: the home page, the archives page, and the about page. The home page lists the posts from the most recent month that actually has any posts. The archives page just has a list of links, one link for each month in which posts were posted to the blog (December 2011, February 2012, etc.). Each month page just shows all of the blog posts that were posted in that month. Finally, the about page is just a static page with some information about the blog.

This method isn't very flexible: all of the layout code is duplicated on each page, so if you want to change something about the layout HTML you'll have to do it for every single file. Also, you'll have to manually move things over to the archives pages as they get old, which is obviously inconvenient.

Version 2 - PHP and Include Files
---------------------------------

[(Browse Source)](http://github.com/butchler/My-Awesome-Blog/tree/version2-php-and-includes)

To get rid of the duplicated HTML that's currently distributed across all of the files, you can use PHP, a programming language commonly used on servers, to automatically insert the layout HTML for you.

First, I created a folder called called includes/ and created two files in it, called before.html and after.html. These contain all of the HTML that comes before and after the main content, such as the opening and closing `<html>` tags and the `<head>` tag. Next, I went through all of the pages and replaced the redundant HTML with these two snippets of PHP code:

```php
<?php include 'path/to/includes/before.html'; ?>
... Page specific content goes here ...
<?php include 'path/to/includes/after.html'; ?>
```

The path to the includes folder was different depending on the file's location relative to the includes folder: for the home page it was ./includes and for the archive/2012/03.php page it was ../../includes. I also changed the extension of all of the pages from .html to .php.

In order to get the site working with these changes, you'll need to either upload the files to a web server or install a local web server on your computer. If you're using Linux, you should probably use your distro's package manager to install Apache and PHP (and MySQL for later). If you're using Mac or Windows, you'll probably want to check out [MAMP](http://www.mamp.info/) and [WAMP](http://www.wampserver.com/en/), respectively.

Version 3 - Page-specific Variables
-----------------------------------

[(Browse Source)](http://github.com/butchler/My-Awesome-Blog/tree/version3-page-specific-variables)

So now we've fixed the issue with the layout HTML being duplicated everywhere, but there's one problem: in order to fix that problem, I had to sacrifice the page titles. Before, each page had a different `<title>` tag, specific to that page, like `<title>My Awesome Blog - About</title>` for the about page, `<title>My Awesome Blog - Archives</title>` for the archives page, and so on. But now, because each page is including the before.html file and because before.html just sets the `<title>` to My Awesome Blog, all of the page have the same title. In this case, it's not a very big issue, but it would still be nice to fix, and in a more complicated project you might need to do something similar if you have certain information that is different for each page.

In order to fix this, I'm going to replace this line of code:

```php
<?php include 'path/to/includes/before.html'; ?>
```

that was at the beginning of each file with this code:

```php
<?php
$title = '<title of page>';

include 'path/to/includes/before.php';
?>
```

In PHP, all variables begin with the `$` character, so all I've done is set a variable called `$title` to the title of the page. Right now, this doesn't do anything because before.php doesn't do anything with the `$title` variable. Notice that I changed the name of before.html to before.php. This is because I'm going to put some PHP code in it to use `$title`, and changing the extension to .php tells the web server (well, Apache anyways, I don't know about other web servers) to interpret the file as PHP code instead of static HTML.

This line in before.php:

```php
<title>My Awesome Blog</title>
```

will become:

```php
<title>My Awesome Blog - <?php echo $title; ?></title>
```

Assuming that the `$title` variable has been set like in the above code, this code will set the `<title>` to "My Awesome Blog - <title of page>". Now you can go through all of the pages and set their `$title` appropriately.

A lot of the pages also display the title of the page as an <h2> in the actual content of the page, though, so now that the title is stored in the `$title` variable, you can use that to shorten up the code a little bit. You can remove the lines that were like this:

```php
<h2>Title of Page</h2>
```

from each of the pages and instead have that line appear only once in before.php:

```php
      <section id="main">
         <h2><?php echo $title; ?></h2>
```

