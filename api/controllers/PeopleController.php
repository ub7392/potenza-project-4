<?php
//Controllers/PeopleController.php
use Doctrine\ORM;
use API\Entity;

class api_PeopleController extends Ia_Controller_Action_Abstract
{
  public function init()
  {
      /* Initialize action controller here */
  }

  public function indexAction()
  {
    if($this->getRequest()->isGet()){
      $data = $this->getRequest()->getParam('people_id');

       if($data === null)
       {
        try{
          // 200 - Success
          // 400 - Bad Request
          $data = $this->getEntityManager()->getRepository('API\Entity\people')->findAll();

          foreach($data as $entryObj){
            $resultArray[] = [
              'people_id'     => $entryObj->people_id,
              'first_name'    => $entryObj->first_name,
              'last_name'     => $entryObj->last_name,
              'favorite_food' => $entryObj->favorite_food
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

          $people = $this->getEntityManager()->getRepository('\API\Entity\people')->find($data);
          $resultArray[] =
          [
            'people_id'     => $people->people_id,
            'first_name'    => $people->first_name,
            'last_name'     => $people->last_name,
            'favorite_food' => $people->favorite_food
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
    }else if($this->getRequest()->isPost()){
      try{
        // 200 - Success
        // 400 - Bad Request
        // 500 - Server Error
        $data = $this->getRequest()->getPost();

        $people = new API\Entity\people();
        $people ->setFirstname($data['first_name'])
                ->setLastname($data['last_name'])
                ->setFavoritefood($data['favorite_food']);
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
}
