<?php

class SQL {
    
    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'loja_virtual';
    private $conexao;

    function __construct(){
 
        $this->conexao = mysql_connect($this->host,$this->usuario,$this->senha);
        mysql_select_db($this->banco,$this->conexao);
    }

    function __destruct(){
        mysql_close($this->conexao);
    }

    function consQuery($sql){
        header('Content-type: text/html; charset=utf-8');
        mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
        
        return mysql_fetch_assoc(mysql_query($sql,$this->conexao));
    }

    function execQuery($sql){
        header('Content-type: text/html; charset=utf-8');
        mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
        
        return mysql_query($sql,$this->conexao);
    }
}
?>