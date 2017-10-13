<?php
//client script
define('DBFILE', '/srv/torrent/flood/server/db/users.db');


//DEV/DEBUGGING


// define('DBFILE', 'users.db');
// $db = file_get_contents(DBFILE);
// $db = explode(PHP_EOL, $db);
//
// for ($i=0; $i < count($db); $i++) {
//   if ($i != 0) {
//
//   }
//   var_dump(json_decode($db[$i]));
// }

//accept data
function acceptData($username, $password, $id)
{
  $json = '{"username":"'. $username .'","password":"'. $password .'","_id":"'. $id .'"}' . "\n";
  return insert($json);
}
function insert($json)
{
  $data = file_get_contents(DBFILE);
  $data .= $json;
  return file_put_contents(DBFILE, $data);
}
if (isset($_POST['username'])) {
  acceptData($_POST['username'], $_POST['password'], $_POST['id']);
}
