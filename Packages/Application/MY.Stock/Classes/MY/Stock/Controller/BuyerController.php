<?php
namespace MY\Stock\Controller;

/*
 * This file is part of the MY.Stock package.
 */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use MY\Stock\Domain\Model\Buyer;

class BuyerController extends ActionController
{

    /**
     * @Flow\Inject
     * @var \MY\Stock\Domain\Repository\BuyerRepository
     */
    protected $buyerRepository;

    /**
     * @return void
     */
    public function indexAction()
    {
        $this->view->assign('buyers', $this->buyerRepository->findAll());
    }

    /**
     * @param \MY\Stock\Domain\Model\Buyer $buyer
     * @return void
     */
    public function showAction(Buyer $buyer)
    {
        $this->view->assign('buyer', $buyer);
    }

    /**
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * @param \MY\Stock\Domain\Model\Buyer $newBuyer
     * @return void
     */
    public function createAction(Buyer $newBuyer)
    {
        $this->buyerRepository->add($newBuyer);
        $this->addFlashMessage('Created a new buyer.');
        $this->redirect('index');
    }

    /**
     * @param \MY\Stock\Domain\Model\Buyer $buyer
     * @return void
     */
    public function editAction(Buyer $buyer)
    {
        $this->view->assign('buyer', $buyer);
    }

    /**
     * @param \MY\Stock\Domain\Model\Buyer $buyer
     * @return void
     */
    public function updateAction(Buyer $buyer)
    {
        $this->buyerRepository->update($buyer);
        $this->addFlashMessage('Updated the buyer.');
        $this->redirect('index');
    }

    /**
     * @param \MY\Stock\Domain\Model\Buyer $buyer
     * @return void
     */
    public function deleteAction(Buyer $buyer)
    {
        $this->buyerRepository->remove($buyer);
        $this->addFlashMessage('Deleted a buyer.');
        $this->redirect('index');
    }

}
