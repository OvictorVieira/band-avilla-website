<?php

namespace Library\Model\Books;

use Library\Model\incConex\SingletonConexDataBase as IncConexDB;
use Library\Classes\Book;
use PDO;

class ModelBook
{

    /**
     * @param $id
     * @return array|null|string
     */
    public function getBook($id)
    {

        $sql = "SELECT bk.id as bookId, bk.title as bookTitle, bk.publication_date, aut.id as authorId, aut.name as authorName, gnr.id as genreId, gnr.name as genreName, pbl.id as publisherId, pbl.name as publisherName FROM books as bk 
                JOIN authors as aut on bk.author_id = aut.id
                JOIN publishers pbl on bk.publisher_id = pbl.id
                JOIN genres gnr on bk.genre_id = gnr.id WHERE id = :id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':id', $id);
        $consult->execute();

        $resultQuery = $consult->fetchAll(PDO::FETCH_ASSOC);

        $book = new Book();

        if($consult->rowCount() == 1) {

            $book->setTitle($resultQuery[0]['bookTitle']);
            $book->setId($resultQuery[0]['bookId']);
            $book->setPublicationDate($resultQuery[0]['publication_date']);
            $book->setAuthorId($resultQuery[0]['authorId']);
            $book->setAuthorName($resultQuery[0]['authorName']);
            $book->setGenreId($resultQuery[0]['genreId']);
            $book->setGenreName($resultQuery[0]['genreName']);
            $book->setPublisherId($resultQuery[0]['publisher_id']);
            $book->setPublisherName($resultQuery[0]['publisherName']);
        }

        return $book;
    }

    /**
     * @param $title
     * @param $publicationDate
     * @param $genre
     * @param $author
     * @param $publisher
     * @return bool|mysqli_result
     */
    public function setBook($title, $publicationDate, $genre, $author, $publisher)
    {

        $publicationDate = date('Y-m-d', strtotime($publicationDate));

        $sql = "INSERT INTO books (title, publication_date, genre_id, author_id, publisher_id) 
                VALUES (:title, :publication_date, :genre_id, :author_id, :publisher_id)";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':title', $title);
        $consult->bindParam(':publication_date', $publicationDate);
        $consult->bindParam(':genre_id', $genre);
        $consult->bindParam(':author_id', $author);
        $consult->bindParam(':publisher_id', $publisher);

        return $consult->execute();
    }

    /**
     * @param $id
     * @param $title
     * @param $publicationDate
     * @param $genre
     * @param $author
     * @param $publisher
     * @return bool|mysqli_result
     */
    public function updateBook($id, $title, $publicationDate, $genre, $author, $publisher)
    {

        $publicationDate = date('Y-m-d', strtotime($publicationDate));

        $sql = "UPDATE books SET title = :title, publication_date = :publication_date, author_id = :author_id, genre_id = :genre_id, publisher_id = :publisher_id  WHERE id = :id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':title', $title);
        $consult->bindParam(':publication_date', $publicationDate);
        $consult->bindParam(':author_id', $author);
        $consult->bindParam(':genre_id', $genre);
        $consult->bindParam(':publisher_id', $publisher);
        $consult->bindParam(':id', $id);

        return $consult->execute();
    }

    /**
     * @param $id
     * @return bool|mysqli_result
     */
    public function deleteBook($id)
    {
        $sql = "DELETE FROM books WHERE id = :id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':id', $id);

        return $consult->execute();
    }

    /**
     * @return bool|mysqli_result
     */
    public function getAllBook()
    {
        $sql = "SELECT bk.id as bookId, bk.title as bookTitle, bk.publication_date, aut.id as authorId, aut.name as authorName, gnr.id as genreId, gnr.name as genreName, pbl.id as publisherId, pbl.name as publisherName FROM books as bk 
                JOIN authors as aut on bk.author_id = aut.id
                JOIN publishers pbl on bk.publisher_id = pbl.id
                JOIN genres gnr on bk.genre_id = gnr.id ORDER BY bk.title";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->query($sql);

        $queryExec = $consult->fetchAll(PDO::FETCH_ASSOC);

        $arrayBooks = [];

        foreach ($queryExec as $item) {
            $book = new Book();

            $book->setTitle($item['bookTitle']);
            $book->setId($item['bookId']);
            $book->setPublicationDate($item['publication_date']);
            $book->setAuthorId($item['authorId']);
            $book->setAuthorName($item['authorName']);
            $book->setGenreId($item['genreId']);
            $book->setGenreName($item['genreName']);
            $book->setPublisherId($item['publisherId']);
            $book->setPublisherName($item['publisherName']);
            $arrayBooks[] = $book;
        }

        return $arrayBooks;
    }
}