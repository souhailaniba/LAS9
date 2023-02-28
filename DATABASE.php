<?php
    $con=mysqli_connect("localhost","root","","example");
    mysqli_query($con,"CREATE TABLE if not exists `example`.`users` ( `fname` VARCHAR(100) NOT NULL ,  `interests` TEXT  ,  `lname` VARCHAR(100) NOT NULL ,  `major` ENUM('IAGI','GEM','MSEI','GM','GI') NOT NULL ,  `password` VARCHAR(100) NOT NULL ,  `photo` TEXT  ,  `sid` INT NOT NULL AUTO_INCREMENT ,  `username` VARCHAR(100) NOT NULL ,    PRIMARY KEY  (`sid`))");
    
    mysqli_query($con, "CREATE TABLE if not exists`example`.`files` ( `titre` VARCHAR(100) NOT NULL ,  `type` ENUM('TD ','Controle','TP','Examen') NOT NULL ,  `major` ENUM('IAGI','MSEI','GEM','GM','GI') NOT NULL ,  `annee` VARCHAR(5) NOT NULL ,  `fichier` TEXT NOT NULL ,  `commentaire` TEXT NOT NULL ,  `fid` INT NOT NULL AUTO_INCREMENT ,  `pid` INT NOT NULL ,    PRIMARY KEY  (`fid`),   
              FOREIGN KEY (PID) REFERENCES users(sid))");
    if (!file_exists('file_upload')) {
    mkdir('file_upload');
}
    if (!file_exists('profilepics_upload')) {
    mkdir('profilepics_upload');
}
?>