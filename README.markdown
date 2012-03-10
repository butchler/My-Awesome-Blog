My Awesome Blog
===============

This is a (currently in progress) project to teach my friend how to create a simple blog using HTML, CSS, and PHP. View the commit history or the tags to see how the project evolves from simple/naive implementations up to a full blog system.

Version 1 - Static HTML
-----------------------

The first version just uses static HTML and CSS files. However, all of the content that will be on the website is already there. Nothing about the HTML should really change after this point, only how the HTML is generated.

There are three main pages on the website: the home page, the archives page, and the about page. The home page lists the posts from the most recent month that actually has any posts. The archives page just has a list of links, one link for each month in which posts were posted to the blog (December 2011, February 2012, etc.). Each month page just shows all of the blog posts that were posted in that month. Finally, the about page is just a static page with some information about the blog.

This method isn't very flexible: all of the layout code is duplicated on each page, so if you want to change something about the layout HTML you'll have to do it for every single file. Also, you'll have to manually move things over to the archives pages as they get old, which is obviously inconvenient.

Version 2 - PHP and Include Files
---------------------------------

To get rid of the duplicated HTML that's currently distributed across all of the files, you can use PHP, a programming language commonly used on servers, to automatically insert the layout HTML for you.

First, I created a folder called called includes/ and created two files in it, called before.html and after.html. These contain all of the HTML that come before and after the main content, such as the opening and closing `<html>` tags and the `<head>` tag. Next, I went through all of the pages and replaced the redundant HTML with these two snippets of PHP code:

```php
<?php include 'path/to/includes/before.html'; ?>
... Page specific content goes here ...
<?php include 'path/to/includes/after.html'; ?>
```

The path to the includes folder was different depending on the file's location relative to the includes folder: for the home page it was ./includes and for the archive/2012/03.php page it was ../../includes. I also changed the extension of all of the pages from .html to .php.

In order to get the site working with these changes, you'll need to either upload the files to a web server or install a local web server on your computer. If you're using Linux, you should probably use your distro's package manager to install Apache and PHP (and MySQL for later). If you're using Mac or Windows, you'll probably want to check out [MAMP](http://www.mamp.info/) and [WAMP](http://www.wampserver.com/en/), respectively.

