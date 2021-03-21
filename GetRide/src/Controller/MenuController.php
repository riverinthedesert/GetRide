<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\App;

class MenuController extends AppController
{
	
	/*
	 * page basic
	 */
    public function index(){
    }
	
	/*
	 * deplacer à page VisuGroupe
	 */
	public function visuGroupe(){
		$redirect = $this->request->getQuery('redirect', [
				'controller' => 'VisuGroupe',
				'action' => 'index',
			]);

			return $this->redirect($redirect);

        return $this->redirect(['action' => 'index']);
	}
	
	/*
	 * deplacer à page Offre
	 */
	public function offre(){
		$redirect = $this->request->getQuery('redirect', [
				'controller' => 'Offre',
				'action' => 'index',
			]);

			return $this->redirect($redirect);

        return $this->redirect(['action' => 'index']);
	}
	
	/*
	 * deplacer à page recettes
	 */
	public function visuProfil(){
		
		$redirect = $this->request->getQuery('redirect', [
				'controller' => 'VisuProfil',
				'action' => 'index',
			]);

			return $this->redirect($redirect);

        return $this->redirect(['action' => 'index']);
	}
	
}
?>