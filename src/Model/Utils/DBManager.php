<?php
namespace Model\Utils;

class DBManager
{
    /**
     * @var \PDO
     */ 
    private $pdo = null;
 
    /**
     * @var self
     */ 
    private static $instance = null;
     
    private function __construct()
    {
        try {
            $this->pdo = new \PDO(DB_DSN, DB_USER, DB_PASSWD);
        } catch (\PDOException $e) {
            echo 'La connexion à la base de donnée a échouée : ' . $e->getMessage();
        }
    }
     
    /**
     * @return self
     */
    public static function getInstance(): self
    {  
        if (\is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
     
    /**
     * @param string $query
     *
     * @return \PDOStatement
     */
    public function query(string $query, array $params = []): ?\PDOStatement
    {
        $statement = $this->pdo->prepare($query);

        if (!$statement->execute($params)) {
            echo implode(' ', $statement->errorInfo()).'<br>'.$statement->debugDumpParams();

            return null;
        }

        return $statement;
    }

    public function getStatement(string $sql): ?\PDOStatement
    {
        return $this->pdo->prepare($sql);
    }

    public function execute(\PDOStatement $statement): ?\PDOStatement
    {
        if (!$statement->execute()) {
            echo implode(' ', $statement->errorInfo()).'<br>'.$statement->debugDumpParams();

            return null;
        }

        return $statement;
    }
}
