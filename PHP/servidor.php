<?php
        $mysql = new mysqli('localhost', 'root', '', 'chamado');
        $mysql -> set_charset('utf8');

        if ($mysql == FALSE){
            echo 'FALHA NA CONEXÂO';
        }
        