<?php

namespace Library\Reports;

use Library\Model\IncConex\SingletonConexDataBase as IncConexDB;
use PDO;

class ModelReportsReaders
{
    /**
     * @return array|string
     */
    public function getReportReares()
    {

        $sql = "SELECT 
                    rdr.name as readerName,
                    rdr.cpf as readerCpf,
                    count(loan.reader_id) as qtd_rdr_loan
                FROM loans as loan
                JOIN readers rdr on loan.reader_id = rdr.id
                
                GROUP BY rdr.id ORDER BY qtd_rdr_loan DESC";

        $conex = IncConexDB::getConectionDataBase();

        $consult = $conex->query($sql);

        $resultReport = $consult->fetchAll(PDO::FETCH_ASSOC);

        $reportsReader = [];

        foreach($resultReport as $item) {

            $reportsReader[] = [
                'reader_name' => $item['readerName'],
                'reader_cpf' => $item['readerCpf'],
                'qtd_rdr_loan' => $item['qtd_rdr_loan']
            ];
        }

        return $reportsReader;
    }
}