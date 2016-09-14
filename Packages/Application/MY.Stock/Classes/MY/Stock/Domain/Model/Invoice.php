<?php
namespace MY\Stock\Domain\Model;

/*
 * This file is part of the MY.Stock package.
 */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Invoice
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var \DateTime
     * @ORM\Column(nullable = true)
     */
    protected $date;

    /**
     * @var Buyer
     * @ORM\ManyToOne(inversedBy="invoices")
     */
    protected $buyer;

    /**
     * @var \Doctrine\Common\Collections\Collection<\MY\Stock\Domain\Model\Booked>
     * @ORM\OneToMany(mappedBy="invoice")
     */
    protected $books;

    /**
     * @var string
     */
    protected $totalPrice;

    /**
     * @var string
     */
    protected $remainingAmountToPay;

    /**
     * @var bool
     */
    protected $isPaid = FALSE;

    /**
     * @return string
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date) {
        $this->date = $date;
    }

    /**
     * @return \My\Stock\Domain\Model\Buyer
     */
    public function getBuyer() {
        return $this->buyer;
    }

    /**
     * @param \My\Stock\Domain\Model\Buyer $buyer
     */
    public function setBuyer($buyer) {
        $this->buyer = $buyer;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBooks() {
        return $this->books;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $books
     */
    public function setBooks($books) {
        $this->books = $books;
    }

    /**
     * @return string
     */
    public function getTotalPrice() {
        return $this->totalPrice;
    }

    /**
     * @param string $totalPrice
     */
    public function setTotalPrice($totalPrice) {
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return string
     */
    public function getRemainingAmountToPay() {
        return $this->remainingAmountToPay;
    }

    /**
     * @param string $remainingAmountToPay
     */
    public function setRemainingAmountToPay($remainingAmountToPay) {
        $this->remainingAmountToPay = $remainingAmountToPay;
    }

    /**
     * @return boolean
     */
    public function isIsPaid() {
        return $this->isPaid;
    }

    /**
     * @param boolean $isPaid
     */
    public function setIsPaid($isPaid) {
        $this->isPaid = $isPaid;
    }
}
