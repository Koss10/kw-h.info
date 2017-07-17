<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\DeviceRepositoryInterface;
use InvalidArgumentException;

class ListController extends AbstractActionController
{
    private $deviceRepository;
    
    public function __construct(DeviceRepositoryInterface $deviceRepository) {
        $this->deviceRepository = $deviceRepository;
    }
        public function indexAction()
    {
        return new ViewModel([
            'devices' => $this->deviceRepository->findAllDevices(),
            ]);
    }
    public function detailAction()
    {
        $id = $this->params()->fromRoute('id');
        try{
            $device = $this->deviceRepository->findDevice($id);
        } catch (\InvalidArgumentException $ex){
            return $this->redirect()->toRoute('home');
        }
        return new ViewModel([
            'device' => $device,
        ]);
    }
}
