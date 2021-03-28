<?php
    namespace App\Controller;

use App\Model\Entity\MembreFavo;
use Cake\Datasource\ConnectionManager;

    class VisuProfilController extends AppController
    {
		

        public function index()
        {
			$visuProfil = $this->paginate($this->VisuProfil);
			$this->set(compact('visuProfil'));
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
		
		public function ajouterFavo($idMembre = null,$idMembreFavo = null)
		{
			if ($this->request->is('post')) {
				$redirect = $this->request->getQuery('redirect', [
					'controller' => 'MembreFavo',
					'action' => 'add',
				]);
				return $this->redirect($redirect);

			}else{
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
		
    }
	
?>