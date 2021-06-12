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
              var_dump($this->id);
              deladmin($this->id);
        }
    }

        //Template
    $template = 'gerant';
    //Layout (contient header , footer)
    include('view/layout.php');
}
