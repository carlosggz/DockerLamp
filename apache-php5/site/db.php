<?php
require('vendor/autoload.php');

class User extends \Spot\Entity
{
    protected static $table = 'user';

    public static function fields()
    {
        return [
            'id'           => ['type' => 'integer', 'autoincrement' => true, 'primary' => true],
            'first_name'   => ['type' => 'string',  'required' => true],
            'last_name'    => ['type' => 'string',  'required' => true],
            'dni'          => ['type' => 'string',  'required' => true, 'index' => true]
        ];
    }
}

$cfg = new \Spot\Config();
$cfg->addConnection('mysql', 'mysql://root:root@mysql/Test');

$spot = new \Spot\Locator($cfg);

$mapper = $spot->mapper('User');
$users = $mapper->all();
?>
<html>
    <head>
        <title>Docker LAMP - Test database server</title>
    </head>
    <body>
        <h1>Docker LAMP - Test email server</h1>
        <h3>List of users</h3>

        <?php foreach($users as $user) {?>
            id: <?= $user->id ?> - Name: <?= $user->first_name. " " . $user->last_name ?><br>
        <?php } ?>

        <p><a href="index.html">Back to home</a></p>
    </body>
</html>