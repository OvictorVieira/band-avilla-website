<?php

namespace Library\Classes;

class Loan
{
    protected $id;
    protected $loanDate;
    protected $returnDate;
    protected $statusId;
    protected $userId;
    protected $userName;
    protected $readerId;
    protected $readerName;
    protected $cancellationDate;
    protected $dateReturned;
    protected $bookTitle;
    protected $loanId;
    protected $bookHasLoansId;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLoanDate()
    {
        return $this->loanDate;
    }

    /**
     * @param mixed $loanDate
     */
    public function setLoanDate($loanDate)
    {
        $this->loanDate = $loanDate;
    }

    /**
     * @return mixed
     */
    public function getReturnDate()
    {
        return $this->returnDate;
    }

    /**
     * @param mixed $returnDate
     */
    public function setReturnDate($returnDate)
    {
        $this->returnDate = $returnDate;
    }

    /**
     * @return mixed
     */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * @param mixed $statusId
     */
    public function setStatusId($statusId)
    {
        $this->statusId = $statusId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getReaderId()
    {
        return $this->readerId;
    }

    /**
     * @param mixed $readerId
     */
    public function setReaderId($readerId)
    {
        $this->readerId = $readerId;
    }

    /**
     * @return mixed
     */
    public function getReaderName()
    {
        return $this->readerName;
    }

    /**
     * @param mixed $readerName
     */
    public function setReaderName($readerName)
    {
        $this->readerName = $readerName;
    }

    /**
     * @return mixed
     */
    public function getCancellationDate()
    {
        return $this->cancellationDate;
    }

    /**
     * @param mixed $cancellationDate
     */
    public function setCancellationDate($cancellationDate)
    {
        $this->cancellationDate = $cancellationDate;
    }

    /**
     * @return mixed
     */
    public function getDateReturned()
    {
        return $this->dateReturned;
    }

    /**
     * @param mixed $dateReturned
     */
    public function setDateReturned($dateReturned)
    {
        $this->dateReturned = $dateReturned;
    }

    /**
     * @return mixed
     */
    public function getBookTitle()
    {
        return $this->bookTitle;
    }

    /**
     * @param mixed $bookTitle
     */
    public function setBookTitle($bookTitle)
    {
        $this->bookTitle = $bookTitle;
    }

    /**
     * @return mixed
     */
    public function getLoanId()
    {
        return $this->loanId;
    }

    /**
     * @param mixed $loanId
     */
    public function setLoanId($loanId)
    {
        $this->loanId = $loanId;
    }

    /**
     * @return mixed
     */
    public function getBookHasLoansId()
    {
        return $this->bookHasLoansId;
    }

    /**
     * @param mixed $bookHasLoansId
     */
    public function setBookHasLoansId($bookHasLoansId)
    {
        $this->bookHasLoansId = $bookHasLoansId;
    }
}