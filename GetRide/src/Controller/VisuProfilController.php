<?php
    namespace App\Controller;
use Cake\Datasource\ConnectionManager;

    class VisuProfilController extends AppController
    {
		

        public function index()
        {
			 
			 
        }
		
		
		public function view(){
			$this->Form->postButton(__('button1'), ['action' => 'supprimer']);
			$this->Form->postButton(__('button1'), ['action' => 'modifPass']);

		}
		
		public function supprimer(){

		}
		
		public function modifPass(){

		}
		
		 public function confirmation()
		{
	
		}
		
		
    }
	
?>