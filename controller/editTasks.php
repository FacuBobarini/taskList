<?php

include('../model/tasks.php');

$editTask = new Tasks();

$editTask->editTasks();


include('../views/edit.php');



?>