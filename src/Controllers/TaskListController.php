<?php
class TaskListController extends AbstractController {
  
  public function render () : void {
     $orderBy=null;
     $search=null;
     $page=null;
      $order=null;
    //  $search = $_GET['search'];
      if(isset($_GET['search'])) {
          $search = $_GET['search'];

      }
      //$orderBy=$_GET['order-by'];
      if(isset($_GET['order-by'])){
          $orderBy=$_GET['order-by'];
      }
      if(isset($_GET['page'])){
          $page=$_GET['page'];
      }








    $data=$_GET;
      //var_dump($data);
      unset($data['page']);
   echo get_template( __PROJECT_ROOT__ . "/Views/list.php", [

        'params'=> $data,
       'tasks'=> $this->taskService->list([

         "search"=>$search,
         "orderBy"=>$orderBy,
         "page"=>$page]
     )['tasks']
   ] );


  }
  
}