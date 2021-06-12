<?php
require('model/gerant.php');

function gerant(){

    class C_gerant{
        private $id;

          public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public  function ajouteradmin($id){

              $this->setId($id);

              ajoutadmin($this->id);
        }
        public function selectadmin(){
              $sel = selectadmin();
              return $sel;
        }

        public function deladmin($id){
              $this->id = $id;
              $errors = array();


              if ($this->id === $_SESSION['id']) {
                  array_push($errors, "Vous ne pouvez pas vous auto supprimer !");
              }
                $c = count($errors);

              if ($c < 1){
                  deladmin($this->id);
              }else{
                  return $errors;
              }
              header("refresh: 1");

        }
    }

        //Template
    $template = 'gerant';
    //Layout (contient header , footer)
    include('view/layout.php');
}
