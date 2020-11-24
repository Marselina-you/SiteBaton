<?php 
$son = new mysqli('localhost','root','root', 'zabatonom');

$deletes = $son->query("DELETE FROM ass WHERE id = '" . $_GET['id'] . "'");
if ($deletes) {
                    echo "Успешное удаление";
                } else {
                    echo "ошибка.";
                }