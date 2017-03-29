<?php
namespace Dalt\Logger\routes;

use PDO;
use Dalt\Logger\Route;
use Dalt\Core\DB;

/**
 * Class DatabaseRouter
 *
 * CREATE TABLE `logs` (
 *   `log_id` int(11) NOT NULL AUTO_INCREMENT,
 *   `date` datetime DEFAULT NULL,
 *   `level` varchar(16) DEFAULT NULL,
 *   `message` text,
 *   `context` text,
 *   PRIMARY KEY (`log_id`)
 * ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 * 
 */
class DatabaseRoute extends Route
{
    /**
     *
     * @var string
     */
    public $table;
    /**
     *
     * @var PDO
     */
    public $db;
    
    /**
     * 
     * @inheritdoc
     */
    public function log($level, $message, array $context = []) 
    {
        $stmt = $this->db->prepare(
                'INSERT INTO ' . $this->table . ' (date, level, message, context) ' .
                'VALUES (:date, :level, :message, :context)'
        );
        
        $date = $this->getDate('Y-m-d H:i:s');
        $context = $this->contextStringify($context);

        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':context', $context);

        $stmt->execute();
    }

}
