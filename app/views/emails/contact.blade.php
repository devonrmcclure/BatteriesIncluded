<?php

$data = Input::all();

echo 'Name: ' . $data['name'] . "<br />";
echo 'Call back #: ' . $data['phone_num'] . "<br /><br />";


echo $data['message'];