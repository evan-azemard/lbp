<?php
require('../model/gerant.php');



    class C_gerant{
        private $id;
        private $addadmin;
        private $userall;

        public function getAddadmin()
        {
            return$this->addadmin;
        }
        public function getId()
        {
            return $this->id;
        }

        public function getUserall()
        {
            return $this->userall;
        }
        public function setUserall($userall)
        {
            $this->userall = $userall;
        }
        public function setAddadmin($addadmin)
        {
            $this->addadmin = $addadmin;
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


        public function selectuser(){
            $sel = selectuser();
            return $sel;
        }


        public function selall(){
            $sel = selall();
            return $sel;
        }



        public  function logoA(){
            $rec = cherche_logo_ger($_SESSION['id']);
            if ($rec === false){
                var_dump("null");
            }
            if ($rec === true)
            {
                var_dump("true");

                ?>
                <style>
                    #header_panier{
                        color: rgba(255, 0, 55, 0.58) !important;
                    }
                </style>
                <?php
            }

        }

        public function deladmin($id)
        {
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
            ?><meta http-equiv="refresh" content="0"><?php

        }


        public function addadmin($addadmin){
            $this->addadmin = $addadmin;
            $errors = array();

            $sel = verif_id($this->addadmin);
            if ($sel['rank'] == 2){
                array_push($errors, "Vous ne pouvez utiliser cette id ! Seul les utilisateurs sont acc??cible!");
            }
            if ($sel['rank'] == 3){
                array_push($errors, "Vous ne pouvez utiliser cette id ! Seul les utilisateurs sont acc??cible!");
            }
            if ($sel['rank'] == 4){
                array_push($errors, "Vous ne pouvez utiliser cette id ! Seul les utilisateurs sont acc??cible!");
            }
            $c = count($errors);

            if ($c < 1)
            {
                if ($sel['rank'] = 1)
                {
                    ajoutadmin($this->addadmin);
                }
            } else
            {
                return $errors;
            }
            ?><meta http-equiv="refresh" content="0"><?php
        }


        public function userall($userall)
        {
            $this->userall = $userall;
            $errors = array();

            $sel = verif_id($this->userall);

            if ($sel['rank'] == 4){
                array_push($errors, "Vous ne pouvez utiliser cette id ! Seul les utilisateurs , vendeurs et admin sont acc??cible!");
            }
            $c = count($errors);

            if ($c < 1) {
                if (($sel['rank'] == 1 || $sel['rank'] == 2 || $sel['rank'] == 3)) {
                    delall($this->userall);
                }
            }else{
                return $errors;
            }
            ?><meta http-equiv="refresh" content="0"><?php

        }
    }
