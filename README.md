# Lite Brith Day Rimender

This application is intended to send notification emails in order to remind you of a special date.

To use it, install required libraries using composer and create a config.php file at the root folder whit the following info:

~~~
<?php
$conf=[
	'mailHost' => 'url_mailHost',
	'mailUsername' => 'user@domain-example.com',
	'mailPassword' => 'mail-password',

];
global $conf;
?>
~~~

Use the file named data.json to store information about all special dates.

Set up a CRON task to run the file named main.php daily.