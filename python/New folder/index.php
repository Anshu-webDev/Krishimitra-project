<?php
// $result = file_get_contents("http://localhost/python/app.py");
// echo $result;

    //  $result1 = shell_exec("python C:/xampp/htdocs/kris/python/crop-prediction/predict-crop.py");
    //  echo $result1;
    $command1 = escapeshellcmd('cmd');
    $command = escapeshellcmd('python C:/xampp/htdocs/kris/python/crop-prediction/predict-crop.py');
    // $output = shell_exec($command);

    sleep(15);    
    
    echo $command;
?>