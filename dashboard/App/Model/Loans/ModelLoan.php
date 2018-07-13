<?php

namespace Library\Model\Loans;

use Library\Model\incConex\SingletonConexDataBase as IncConexDB;
use Library\Model\Users\ModelUser;
use Library\Classes\Loan;
use PDO;


class ModelLoan
{
    /**
     * @param $id
     * @return Loan
     */
    public function getLoan($id)
    {
        $sql = "SELECT loan.id as loanId, loan_date, return_date, status_id, usr.id as userId ,usr.name as nameUser, rdr.id as readerId , rdr.name as readerName,
                cancellation_date, date_returned, bhl.book_id bookBhlId, bk.title as bkTitle
                FROM loans as loan JOIN users usr on loan.user_id = usr.id
                JOIN readers rdr on loan.reader_id = rdr.id
                JOIN status sts on loan.status_id = sts.id
                JOIN books_has_loans bhl on loan.id = bhl.loan_id
                JOIN books bk on bhl.book_id = bk.id
                WHERE loan.id = :id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':id', $id);

        $consult->execute();

        $loans = $consult->fetchAll(PDO::FETCH_ASSOC);

        $loan = new Loan();

        if($consult->rowCount() == 1) {

            $loan->setId($loans[0]['loanId']);
            $loan->setLoanDate($loans[0]['loan_date']);
            $loan->setReturnDate($loans[0]['return_date']);
            $loan->setStatusId($loans[0]['status_id']);
            $loan->setUserId($loans[0]['userId']);
            $loan->setUserName($loans[0]['nameUser']);
            $loan->setReaderId($loans[0]['readerId']);
            $loan->setReaderName($loans[0]['readerName']);
            $loan->setBookHasLoansId($loans[0]['bookBhlId']);
            $loan->setBookTitle($loans[0]['bkTitle']);
            $loan->setCancellationDate($loans[0]['readerName']);
            $loan->setDateReturned($loans[0]['readerName']);

        }

        return $loan;
    }

    /**
     * @param $bookId
     * @param $readerId
     * @param $userId
     * @param $returnDate
     * @return bool
     */
    public function setLoan($bookId, $readerId, $userEmail, $returnDate)
    {
        $returnDate = date('Y-m-d', strtotime($returnDate));

        $modelUser = new ModelUser();

        // Retorna o ID do Usuário
        $userId = $modelUser->getUser($userEmail)->getId();

        $sql = "INSERT INTO loans (loan_date, return_date, user_id, reader_id) VALUES ( :loan_date, :return_date, $userId, :reader_id)";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);

        $consult->bindValue(':loan_date', date('Y-m-d'));
        $consult->bindParam(':return_date',$returnDate);
        $consult->bindParam(':reader_id',$readerId);

        if($consult->execute()) {

            if( $this->setBookHasLoans($bookId, $conex->lastInsertId() ) ) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $bookId
     * @param $loanId
     * @return bool
     */
    public function setBookHasLoans($bookId, $loanId)
    {
        $sql = "INSERT INTO books_has_loans (book_id, loan_id) VALUES (:book_id, :loan_id)";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':book_id', $bookId);
        $consult->bindParam(':loan_id', $loanId);

        return $consult->execute();
    }

    /**
     * @param $id
     * @param $statusId
     * @return bool
     */
    public function updateLoan($id, $statusId)
    {
        $cancellationDate = date('Y-m-d');
        $dateReturned = date('Y-m-d');

        $conex = IncConexDB::getConectionDataBase();

        // status Cancelado
        if($statusId == 2) {
            $sql = "UPDATE loans SET status_id = :status_id, cancellation_date = :cancellation_date, date_returned = :date_returned WHERE id = :id";
            $consult = $conex->prepare($sql);
            $consult->bindParam(':cancellation_date', $cancellationDate);
        }

        // status Devolvido
        if($statusId == 3) {
            $sql = "UPDATE loans SET status_id = :status_id, date_returned = :date_returned WHERE id = :id";
            $consult = $conex->prepare($sql);
        }

        $consult->bindParam(':status_id', $statusId);
        $consult->bindParam(':date_returned', $dateReturned);
        $consult->bindParam(':id', $id);

        return $consult->execute();
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteLoan($id)
    {
        $sql = "DELETE FROM loans WHERE id = :id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':id', $id);

        return $consult->execute();
    }

    /**
     * @return array
     */
    public function getAllLoans()
    {
        $sql = "SELECT loan.id as loanId, loan_date, return_date, status_id, usr.id as userId ,usr.name as nameUser, rdr.id as readerId , rdr.name as readerName,
                cancellation_date, date_returned, bhl.book_id bookBhlId, bk.title as bkTitle
                FROM loans as loan JOIN users usr on loan.user_id = usr.id
                JOIN readers rdr on loan.reader_id = rdr.id
                JOIN status sts on loan.status_id = sts.id
                JOIN books_has_loans bhl on loan.id = bhl.loan_id
                JOIN books bk on bhl.book_id = bk.id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->query($sql);

        $consult->execute();

        $listLoans = $consult->fetchAll(PDO::FETCH_ASSOC);

        $arrayLoans = [];

        foreach($listLoans as $item) {

            $loan = new Loan();

            $loan->setId($item['loanId']);
            $loan->setLoanDate($item['loan_date']);
            $loan->setReturnDate($item['return_date']);
            $loan->setStatusId($item['status_id']);
            $loan->setUserId($item['userId']);
            $loan->setUserName($item['nameUser']);
            $loan->setReaderId($item['readerId']);
            $loan->setReaderName($item['readerName']);
            $loan->setBookHasLoansId($item['bookBhlId']);
            $loan->setBookTitle($item['bkTitle']);
            $loan->setCancellationDate($item['cancellation_date']);
            $loan->setDateReturned($item['date_returned']);

            $arrayLoans[] = $loan;
        }

        return $arrayLoans;
    }


    /**
     * @return array of Status
     */
    public function getStatus()
    {
        $sql = "SELECT * FROM status";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->query($sql);

        $consult->execute();

        $arrayStatus = $consult->fetchAll(PDO::FETCH_ASSOC);

        $status = [];

        foreach($arrayStatus as $item) {

            $status[] = [
                'id' => $item['id'],
                'status' => $item['status']
            ];
        }

        return $status;
    }
}