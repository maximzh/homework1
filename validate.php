<?php
require_once 'vendor/autoload.php';

use Egulias\EmailValidator\EmailValidator;

$validator = new EmailValidator;

if (isset($_POST['email']) && isset($_POST['name'])) {
    $data = array();
    $data['email'] = strtolower(trim($_POST['email']));
    $data['name'] = ucfirst(strtolower(trim($_POST['name'])));
    $data['gender'] = $_POST['gender'];

    echo "You have entered next data : <br /><br />";
    foreach ($data as $key => $value) {
        echo "Your $key is : <strong>$value</strong> <br />";
    }
    $email = $data['email'];
    $result = $validator->isValid($data['email']);

    if ($result) {
        echo "<strong>$email</strong>" . ' is seems to be a valid email address';
    } else {
        if ($validator->hasWarnings()) {
            echo var_export($validator->getWarnings(),
                                true) . 'Warning! ' . "<strong>$email</strong>" . ' has unusual/deprecated features (result code ' . ')';
        } else {
            echo "<strong>$email</strong>" . ' is not a valid email address (result code ' . $validator->getError() . ')';
        }
    }
}
