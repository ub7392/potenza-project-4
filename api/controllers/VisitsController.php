<?php
use Doctrine\ORM;
use API\Entity;

class api_VisitsController extends Ia_Controller_Action_Abstract
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      if($this->getRequest()->isGet()){
        $data = $this->getRequest()->getParam('id');

        if($data === null)
        {
            try{
              // 200 - Success
              // 400 - Bad Request
              // 500 - Server Error
              $data = $this->getEntityManager()->getRepository('API\Entity\visits')->findAll();

              foreach($data as $entryObj){
                $resultArray[] = [
                  'id'           => $entryObj->id,
                  'person_id'    => $entryObj->person_id,
                  'state_id'     => $entryObj->state_id,
                  'date_visited' => $entryObj->date_visited
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
            }
        }else{
            try{
              // 200 - Success
              // 400 - Bad Request
              // 500 - Server Error
              $visits = $this->getEntityManager()->getRepository('\API\Entity\visits')->find($data);

              $resultArray[] = [
                'id'           => $visits->id,
                'person_id'    => $visits->person_id,
                'state_id'     => $visits->state_id,
                'date_visited' => $visits->date_visited
              ];

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
        }
      }else if ($this->getRequest()->isPost()){
        try{
          // 200 - Success
          // 400 - Bad Request
          // 500 - Server Error
          $data = $this->getRequest()->getPost();

          $visits = new API\Entity\visits();
          $visits ->setPersonid($data['peoplevisit'])
                  ->setStateid($data['states'])
                  ->setDatevisited($data['date_visited']);
          $em = $this->getEntityManager();
          $em->persist($visits);
          $em->flush();

          header('Content-type: application/json');
          echo json_encode(http_response_code(200));
          die();
        }catch(\Exception $e){
          $data = $e->getMessage();

          http_response_code(500);
          header('Content-type: application/json');
          echo json_encode($data);
          die();
        }
      }
    }
  }
