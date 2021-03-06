<?php

namespace Application\Controller;

use Application\Form\DeviceForm;
use Application\Model\Device;
use Application\Model\DeviceCommandInterface;
use Application\Model\DeviceRepositoryInterface;
use InvalidArgumentException;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class WriteController extends AbstractActionController {

    private $command;
    private $form;
    private $repository;

    public function __construct(
    DeviceCommandInterface $command, DeviceForm $form, DeviceRepositoryInterface $repository) {
        $this->command = $command;
        $this->form = $form;
        $this->repository = $repository;
    }

    public function indexAction() {

        return new ViewModel([
            'devices' => $this->repository->findAllDevices(),
        ]);
    }

    public function detailAction() {
        $id = $this->params()->fromRoute('id');

        try {
            $device = $this->repository->findDevice($id);
        } catch (\InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('admin');
        }

        return new ViewModel([
            'device' => $device,
        ]);
    }

    public function addAction() {
        $request = $this->getRequest();
        $viewModel = new ViewModel(['form' => $this->form]);

        if (!$request->isPost()) {
            return $viewModel;
        }

        $this->form->setData($request->getPost());

        if (!$this->form->isValid()) {
            return $viewModel;
        }

        $device = $this->form->getData();

        try {
            $device = $this->command->insertDevice($device);
        } catch (\Exception $ex) {
            throw $ex;
        }

        return $this->redirect()->toRoute(
                        'admin/detail', ['id' => $device->getId()]
        );
    }

    public function editAction() {
        $id = $this->params()->fromRoute('id');
        if (!$id) {
            return $this->redirect()->toRoute('admin');
        }

        try {
            $device = $this->repository->findDevice($id);
        } catch (InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('admin');
        }

        $this->form->bind($device);
        $viewModel = new ViewModel(['form' => $this->form]);

        $request = $this->getRequest();
        if (!$request->isPost()) {
            return $viewModel;
        }

        $this->form->setData($request->getPost());

        if (!$this->form->isValid()) {
            return $viewModel;
        }

        $device = $this->command->updateDevice($device);
        return $this->redirect()->toRoute(
                        'admin/detail', ['id' => $device->getId()]
        );
    }

}
