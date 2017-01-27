<?php

namespace Frm\Core;

use Frm\Core\Config;
use Frm\Core\Application;

class DB 
{

    protected static $instance = null; 

    public static function getInstance() 
    {
        if (self::$instance === null) {
            $opt = array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                \PDO::ATTR_EMULATE_PREPARES => TRUE
            );
            
            $config = Config::getInstance('db');
            if (Application::isProduction()) {
                $config = $config['production'];
            } else {
                $config = $config['local'];
            } 
            
            $dsn = 'mysql:host=' . $config['dbHost'] . ';dbname=' . $config['dbDbname'] . ';charset=utf8';
            self::$instance = new \PDO($dsn, $config['dbUser'], $config['dbPassword'], $opt);
        }
        return self::$instance;
    }

    public static function __callStatic($method, $args) 
    {
        return call_user_func_array(array(self::instance(), $method), $args);
    }

    public static function run($sql, $args = []) 
    {         
        $stmt = self::getInstance()->prepare($sql);
        //$stmt->debugDumpParams();
        $stmt->execute($args);               
        return $stmt;
    }
    
    private function __construct() 
    {

    }

    private function __clone() 
    {
        
    }
    
    private function __wakeup() 
    {
        
    }         
}

/*

# Получение множества колонок
$rows = \Core\DB::run("SELECT * FROM pdowrapper WHERE id < :task_id LIMIT 10", ['task_id' => 10])->fetchAll();
 

# Создаем таблицу
\Core\DB::query("CREATE temporary TABLE pdowrapper (id int auto_increment primary key, name varchar(255))");
 * 

# множественное исполнение подготовленных выражений
$stmt = \Core\DB::prepare("INSERT INTO pdowrapper VALUES (NULL, ?)");
foreach (['Sam','Bob','Joe'] as $name)
{
    $stmt->execute([$name]);
}
var_dump(\Core\DB::lastInsertId());


# Получение строк в цикле
$stmt = \Core\DB::run("SELECT * FROM pdowrapper");
while ($row = $stmt->fetch(\PDO::FETCH_LAZY))
{
    echo $row['name'],",";
    echo $row->name,",";
    echo $row[1], PHP_EOL;
}


# Получение одной строки
$id  = 1;
$row = \Core\DB::run("SELECT * FROM pdowrapper WHERE id=?", [$id])->fetch();
var_export($row);


# Получение одного поля
$name = \Core\DB::run("SELECT name FROM pdowrapper WHERE id=?", [$id])->fetchColumn();
var_dump($name);


# Получение всех строк в массив
$all = \Core\DB::run("SELECT name, id FROM pdowrapper")->fetchAll(PDO::FETCH_KEY_PAIR);
var_export($all);


# Обновление таблицы
$new = 'Sue';
$id = 1;
$stmt = \Core\DB::run("UPDATE pdowrapper SET name=? WHERE id=?", [$new, $id]);
var_dump($stmt->rowCount());

*/
