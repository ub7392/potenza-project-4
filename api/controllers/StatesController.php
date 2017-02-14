<?php
use Doctrine\ORM;
use API\Entity;

class api_StatesController extends Ia_Controller_Action_Abstract
{
  public function init()
  {
      /* Initialize action controller here */
  }

  public function indexAction()
  {
    if($this->getRequest()->isGet()){
      $data = $this->getRequest()->getParam('states_id');

      if($data === null)
      {
        try{
          // 200 - Success
          // 400 - Bad Request
          // 500 - Server Error
          $data = $this->getEntityManager()->getRepository('API\Entity\states')->findAll();

          foreach($data as $entryObj){
            $resultArray[] =
            [
              'states_id'           => $entryObj->states_id,
              'states_name'         => $entryObj->states_name,
              'states_abbreviation' => $entryObj->states_abbreviation,
            ];
          }

          http_response_code(200);
          header('Content-type: application/json');
          echo json_encode($resultArray);
          die();
        }catch(\Exception $e){
          $data = $e->getMessage();

          http_response_code(500);
          header('Content-type: application/json');
          echo json_encode($data);
          die();
        }
      }else{
          try{
          // 200 - Success
          // 400 - Bad Request
          // 500 - Server Error
          $states = $this->getEntityManager()->getRepository('\API\Entity\states')->find($data);
          $resultArray[] =
          [
            'states_id'           => $states->states_id,
            'states_name'         => $states->states_name,
            'states_abbreviation' => $states->states_abbreviation,
          ];

          http_response_code(200);
          header('Content-type: application/json');
          echo json_encode($resultArray);
          die();
        }catch(\Exception $e){
          $data = $e->getMessage();

          http_response_code(500);
          header('Content-type: application/json');
          echo json_encode($find);
          die();
        }
      }
    }
  }
}
