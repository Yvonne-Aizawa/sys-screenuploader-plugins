<?php

// load system

set_include_path('/');
include 'plugins.class.php';
// start system
plugins::start('plugins/');
include 'config.php';
include 'common.php';
include 'logging.php';
$path = $folder.getTitleFromName($_REQUEST['filename']).'/'; // get the folder path

$ext = strtolower(pathinfo($path.$_REQUEST['filename'], PATHINFO_EXTENSION)); // get the extension of the file

// Only image and video
if (in_array($ext, ['jpg', 'jpeg', 'png', 'bmp', 'gif', 'mp4', 'avi', 'mpg', 'mpeg'])) {
    plugins::call('PreSaving', [file_get_contents('php://input')]);
    plugins::call('execute', [file_get_contents('php://input')]);
} else {
    echo 'not allowed';
    LogToFile('not allowed');
}
