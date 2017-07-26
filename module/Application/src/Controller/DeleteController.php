<?php
namespace Application\Controller;

use Application\Model\Device;
use Application\Model\DeviceCommandInterface;
use Application\Model\DeviceRepositoryInterface;
use InvalidArgumentException;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DeleteController extends AbstractActionController 
{
    private $command;
    private $repository;
    public function __construct(
            DeviceCommandInterface $command,
            DeviceRepositoryInterface $repository
            ) {
                $this->command = $command;
                $this->repository = $repository;
    }
    
    public function deleteAction(){
        $id = $this->params()->fromRoute('id');
        if(! $id){
            return $this->redirect()->toRoute('admin');
        }
        try{
            $device = $this->repository->findDevice($id);
        } catch (\InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('admin');
        }
        $request = $this->getRequest();
        if(! $request->isPost()){
            return new ViewModel(['device' => $device]);
        }
        if($id != $request->getPost('id') || 'delete' != $request->getPost('confirm', 'no')) {
            return $this->redirect()->toRoute('admin');
        }
        
        $device = $this->command->deleteDevice($device);
        
        return $this->redirect()->toRoute('admin');
    }
}