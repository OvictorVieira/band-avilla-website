<?php

namespace Library\Model\incConex;

// Definindo constantes para a conecção
define( 'DSN', 'mysql:host=mysql;dbname=biblioteca' );
define( 'USER', 'secundario' );
define( 'PASS', 'Usu@r1o' );

use PDO;
use PDOException;

class SingletonConexDataBase
{
    private static $conectionPDO;

    private function __construct()
    {
    }

    /**
     * @return PDO instance
     */
    public static function getConectionDataBase()
    {
        if(!isset(self::$conectionPDO)) {
            try{
                self::$conectionPDO = new PDO(DSN, USER, PASS);
                //self::$conectionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $exeption) {
                echo 'Não foi possível realizar a conexão com o banco de dados. Erro:' . $exeption->getMessage();
            }
        }

        return self::$conectionPDO;
    }
}