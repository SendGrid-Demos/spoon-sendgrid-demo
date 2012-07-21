<?php
// Setup and require Spoon
define('PATH_LIBRARY', 'library');
set_include_path(get_include_path() . PATH_SEPARATOR . PATH_LIBRARY);
require_once 'spoon/spoon.php';

// Create a new email object
$email = new SpoonEmail();
$email->setTemplateCompileDirectory('/tmp');
$email->setSMTPConnection('smtp.sendgrid.net', '587');
$email->setSMTPAuth('battle', 'braces');

// Compose
$email->setFrom('swift@sendgrid.com', 'Swift');
$email->addRecipient('theycallmeswift@gmail.com');
$email->setSubject('Hello from Spoon [Powered by SG]');
$email->setHTMLContent('This message was delivered by your friends at SendGrid');

// Send it
$email->send();

// And render a view
$tpl = new SpoonTemplate();
$tpl->setForceCompile(true);
$tpl->setCompileDirectory('/tmp');
$tpl->display('views/template.tpl');

