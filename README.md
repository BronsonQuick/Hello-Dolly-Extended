# Hello Dolly Extended

## An exercise to demonstrate the power of php classes to new WordPress developers

These plugins have been written to help new WordPress plugin developers understand the power of writing WordPress
plugins using php classes. Due to the rapid rate and growth of WordPress as a content management system, there are an
overwhelming number of blog posts that teach WordPress plugin developers to code their plugins purely in php functions
which are not contained within a php class.

This method may seem fine to new developers as their plugins will work however this method doesn't allow other WordPress
developers to 'modify' or 'tweak' the original plugin to suit their own needs.

This repository will be an code resource for an article written for [Code Poet](http://build.codepoet.com/ "Code Poet").

#Installation Notes

1. Deactivate the existing Hello Dolly version that ships with WordPress (currently version 1.6)
2. Upload `oh-hello.php` and the entire `hello-extended` folder to your WordPress plugins folder. This is usually
 `wp-content\plugins` unless you have a modified install.
3. Activate `Hello Dolly Version 1.7`
4. Activate `Hello Dolly Extended`

#Acknowledgements

Props to @rmmcue for quickly running his eyes over this to fix some minor issues and props to @evansolomon for his code
review!
