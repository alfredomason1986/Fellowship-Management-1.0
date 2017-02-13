<?php
// src/Controller/Fellow/FellowshipsController.php

namespace App\Controller\Fellow;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

use Cake\Datasource\ConnectionManager;

class FellowshipsController extends AppController
{
	public function beforeFilter(Event $event)
    {

        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
		
		//this allows users to delete
        $this->Auth->allow(['delete']);
		$this->Auth->deny([]);
    }

    public function index()
    {
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute('SELECT * FROM fellowships AS f
								INNER JOIN (SELECT id as uf_id, 
								user_id as uf_u_id, fellowship_id as uf_f_id 
								FROM users_fellowships) uf ON (
								  f.id = uf.uf_f_id
								  AND uf.uf_u_id=?
								)', [$this->Auth->user('id')]);
								//IN (SELECT id FROM users WHERE)
		$articles = $stmt->fetchAll('assoc');
		//$query = $this->Fellowships->find('all')->contain(['Tags']);
		/*
		$table = TableRegistry::get('Users_Fellowships',
				array('table'=>'Users_Fellowships'));
        $articles = $table->find('all', array(
			'joins' => array(
				array(
					'table' => 'users',
					'alias' => 'u',
					'type' => 'INNER',
					'conditions' => array(
						'u.id = Users_Fellowships.user_id'
					)
				),
				array(
					'table' => 'fellowships',
					'alias' => 'f',
					'type' => 'INNER',
					'conditions' => array(
						'f.id = Users_Fellowships.fellowship_id'
					)
				)
			)
		));
		*/
		/*
		find('all')
					->join([
						'f' => [
							'table' => 'fellowships',
							'type' => 'INNER',
							'conditions' => 'users_fellowships.fellowship_id = f.id',
						],
						'u' => [
							'table' => 'users',
							'type' => 'INNER',
							'conditions' => 'u.id = users_fellowships.user_id',
						]
					]);
					*/
        $this->set(compact('articles'));
    }
	
	public function isAuthorized($user)
	{
		// All registered users can add articles
		if ($this->request->action === 'add') {
			return true;
		}

		// The owner of an article can edit and delete it
		if (in_array($this->request->action, ['edit', 'delete'])) {
			$articleId = (int)$this->request->params['pass'][0];
			if ($this->Fellowships->isOwnedBy($articleId, $user['id'])) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}
	
	public function add($id)
    {
		$this->loadModel('Users_Fellowships');
		
		$article = $this->Users_Fellowships->newEntity();
		if ($this->request->is('post')) {
			$article->fellowship_id = $id;
			$article->user_id = $this->Auth->user('id');
			if ($this->Users_Fellowships->save($article)) {
				$this->Flash->success(__('Your application has been saved.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to add your article.'));
		}

    }

	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);
		$this->loadModel('Users_Fellowships');
		$article = $this->Users_Fellowships->get($id);

		if($this->Users_Fellowships->delete($article)){
		$this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}
}
?>