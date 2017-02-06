<?php
//Controllers/PeopleController.php
use Doctrine\ORM;
use Modules\Entity;

class API_PeopleController extends Ia_Controller_Action_Abstract
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      if($this->getRequest()->isGet()){

        try{
          // 200 - Success
          // 400 - Bad Request
          // 500 - Server Error
          $data = $this->getEntityManager()->getRepository('\Modules\Entity\People')->fetchAll();

          http_response_code(200);
          header('Content-type: application/json');
          echo json_encode($data);
          die();
        }catch(\Exception $e){
          $data = $e->getMessage();

          http_response_code(500);
          header('Content-type: application/json');
          echo json_encode($data);
          die();
        }
      }else if($this->getRequest()->isPost()){
        try{
          // 200 - Success
          // 400 - Bad Request
          // 500 - Server Error
          $data = $this->getRequest()->getPost();

          $people = new Modules\Entity\People();
          $people ->setFirstname($data['$first_name'])
                  ->setLastname($data['$last_name'])
                  ->setFavoritefood($data['$favorite_food']);
          $em = $this->getEntityManager();
          $em->persist($people);
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

    public function getAction()
    {
      //$people = new API_Model_PeopleMapper();

      try{
        // 200 - Success
        // 400 - Bad Request
        // 500 - Server Error
        //$data = $this->getRequest()->getParam('people_id');
        //$find = $people->find($data);
        $data = $this->getEntityManager()->getRepository('\Modules\Entity\People')->find($personid);
        $find = $people->find($data);

        http_response_code(200);
        header('Content-type: application/json');
        echo json_encode($data);
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
