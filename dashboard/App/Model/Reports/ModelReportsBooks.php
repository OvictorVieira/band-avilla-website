<?php

namespace Library\Reports;

use Library\Model\IncConex\SingletonConexDataBase as IncConexDB;
use PDO;

class ModelReportsBooks
{
    /**
     * @return array|string
     */
    public function getReportBook()
    {
        $sql = "SELECT 
                bk.id as bookId,
                bk.title as bookTitle,
                bk.publication_date,
                aut.id as authorId,
                aut.name as authorName,
                gnr.id as genreId,
                gnr.name as genreName,
                pbl.id as publisherId,
                pbl.name as publisherName,
                count(bhl.book_id) as qtd
            FROM books_has_loans as bhl
            JOIN books bk on bk.id = bhl.book_id
            JOIN authors as aut on bk.author_id = aut.id
            JOIN publishers pbl on bk.publisher_id = pbl.id
            JOIN genres gnr on bk.genre_id = gnr.id
            
            GROUP BY bk.id ORDER BY qtd DESC";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->query($sql);

        $resultReport = $consult->fetchAll(PDO::FETCH_ASSOC);

        $reportsBook = [];

        foreach($resultReport as $item) {

            $reportsBook[] = [
                'book_id' => $item['bookId'],
                'book_title' => $item['bookTitle'],
                'publication_date' => $item['publication_date'],
                'author_id' => $item['authorId'],
                'author_name' => $item['authorName'],
                'genre_id' => $item['genreId'],
                'genre_name' => $item['genreName'],
                'publisher_id' => $item['publisherId'],
                'publisher_name' => $item['publisherName'],
                'qtd' => $item['qtd']
            ];
        }

        return $reportsBook;
    }
}














