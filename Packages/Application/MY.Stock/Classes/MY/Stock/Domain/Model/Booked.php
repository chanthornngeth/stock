<?php
namespace MY\Stock\Domain\Model;

/*
 * This file is part of the MY.Stock package.
 */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use MY\Stock\Domain\Model\Invoice;

/**
 * @Flow\Entity
 */
class Booked
{

    /**
     * @var string
     */
    protected $bookAmount;

    /**
     * @var \DateTime
     */
    protected $bookDate;

    /**
     * @var \My\Stock\Domain\Model\Invoice
     * @ORM\ManyToOne(inversedBy="books")
     */
    protected $invoice;

    /**
     * @return string
     */
    public function getBookAmount() {
        return $this->bookAmount;
    }

    /**
     * @param string $bookAmount
     */
    public function setBookAmount($bookAmount) {
        $this->bookAmount = $bookAmount;
    }

    /**
     * @return \DateTime
     */
    public function getBookDate() {
        return $this->bookDate;
    }

    /**
     * @param \DateTime $bookDate
     */
    public function setBookDate($bookDate) {
        $this->bookDate = $bookDate;
    }

    /**
     * @return \My\Stock\Domain\Model\Invoice
     */
    public function getInvoice() {
        return $this->invoice;
    }

    /**
     * @param \My\Stock\Domain\Model\Invoice $invoice
     */
    public function setInvoice($invoice) {
        $this->invoice = $invoice;
    }
}
