My Awesome Blog
===============

This is a (currently in progress) project to teach my friend how to create a simple blog using HTML, CSS, and PHP. View the commit history or the tags to see how the project evolves from simple/naive implementations up to a full blog system.

Version 1 - Static HTML
-----------------------

The first version just uses static HTML and CSS files. However, all of the content that will be on the website is already there. Nothing about the HTML should really change after this point, only how the HTML is generated.

There are three main pages on the website: the home page, the archives page, and the about page. The home page lists the posts from the most recent month that actually has any posts. The archives page just has a list of links, one link for each month in which posts were posted to the blog (December 2011, February 2012, etc.). Each month page just shows all of the blog posts that were posted in that month. Finally, the about page is just a static page with some information about the blog.

This method isn't very flexible: all of the layout code is duplicated on each page, so if you want to change something about the layout HTML you'll have to do it for every single file. Also, you'll have to manually move things over to the archives pages as they get old, which is obviously inconvenient.

