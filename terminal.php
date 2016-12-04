<?php
require_once "lib/terminal/terminalRoot.php";
/*
 *  mysql
 *      create ->  create migration file
 *          terminal.php mysql create table
 *      update -> drop current table and upload new
 *          terminal.php mysql update table
 *      delete -> drop table (delete file or rename file)
 *          terminal.php mysql delete table
 *      migrate -> create new file
 *          terminal.php mysql migrate table
 *
 *
 *
 * system file with history for tables
 *
 *
 */
$ter = new Terminal($_SERVER['argv']);
