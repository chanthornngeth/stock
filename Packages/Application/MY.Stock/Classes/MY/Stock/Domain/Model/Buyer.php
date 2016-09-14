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
class Buyer
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $village;

    /**
     * @var \Doctrine\Common\Collections\Collection<\MY\Stock\Domain\Model\Invoice>
     * @ORM\OneToMany(mappedBy="buyer")
     */
    protected $invoices;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone) {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getVillage() {
        return $this->village;
    }

    /**
     * @param string $village
     */
    public function setVillage($village) {
        $this->village = $village;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvoices() {
        return $this->invoices;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $invoices
     */
    public function setInvoices($invoices) {
        $this->invoices = $invoices;
    }


}
