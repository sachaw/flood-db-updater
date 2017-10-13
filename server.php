<?php
//include 'client.php';
$options = [
    'cost' => 10,
];
function generateId($length = 16) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$username = $_POST['username'];
$passwordhash = password_hash($_POST['password'], PASSWORD_DEFAULT, $options = array('cost' => 12));
$password = str_replace("$2y", "$2a", $passwordhash);
$id = generateId();

//acceptData($username, $password, $id);

?>

PLEASE SET "action" TO THE SERVER RUNNING THE CLIENT SCRIPT, THIS SHOULD BE YOUR FLOOD SERVER

<form action="http://*.*.*.*:81/" method="post">
Username: <input type="text" name="username" value="<?= $username ?>"><br>
Password: <input type="text" name="password" value="<?= $password ?>"><br>
ID: <input type="text" name="id" value="<?= $id ?>"><br>
<input type="submit">
</form>
