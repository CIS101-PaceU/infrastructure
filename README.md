# infrastructure

To serve the php app with XAMPP, you need to specify the document root in `httpd.conf` file, which is located in the `xampfiles/etc` directory.

Here is an example of the changes you need to make, but the WP directory will be different on your local machine. Leave the orginal setting commented so you can go back to it if necessary

```php
# DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs"
DocumentRoot "/Users/William/projects/red-velvet/infrastructure/WP"
# <Directory "/Applications/XAMPP/xamppfiles/htdocs">
<Directory "/Users/William/projects/red-velvet/infrastructure/WP">
```
