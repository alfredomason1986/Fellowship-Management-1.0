<?php
// src/Controller/Fellow/FellowshipsController.php

namespace App\Controller\Fellow;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class FellowshipsController extends AppController
{
	public function beforeFilter(Event $event)
    {

        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow([]);
		$this->Auth->deny([]);
    }

    public function index()
    {
		//$query = $this->Fellowships->find('all')->contain(['Tags']);
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
			),
			'fields' => array('u.*', 'f.*', 'Users_Fellowships.*')
		));
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
	
	public function view($id = null)
    {
        $article = $this->Fellowships->get($id);
        $this->set(compact('article'));
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
	
	public function add()
    {
		$article = $this->Fellowships->newEntity();
		if ($this->request->is('post')) {
			$article = $this->Fellowships->patchEntity($article, $this->request->data);
			// Added this line
			$article->user_id = $this->Auth->user('id');
			// You could also do the following
			//$newData = ['user_id' => $this->Auth->user('id')];
			//$article = $this->Fellowships->patchEntity($article, $newData);
			if ($this->Fellowships->save($article)) {
				$this->Flash->success(__('Your article has been saved.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to add your article.'));
		}
		$this->set('article', $article);

		// Just added the categories list to be able to choose
		// one category for an article
		//$categories = $this->Fellowships->Categories->find('treeList');
		//$this->set(compact('categories'));
    }
	
	public function edit($id = null)
	{
		$article = $this->Fellowships->get($id);
		if ($this->request->is(['post', 'put'])) {
			$this->Fellowships->patchEntity($article, $this->request->data);
			if ($this->Fellowships->save($article)) {
				$this->Flash->success(__('Your article has been updated.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to update your article.'));
		}

		$this->set('article', $article);
	}
	
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);

		//$article = $this->Fellowships->get($id);
		
		$table = TableRegistry::get('Users_Fellowships', array('table'=>'Users_Fellowships'));
		$article = $table->get($id);
		//$query = $query->delete();
			//->where(['id' => $id]);
		//$article = $table->get($id);
		//$entity = $this->Articles->get(2);
		//$result = $this->Articles->delete($entity);
		
		//if ($this->Fellowships->delete($article)) {
		if($table->delete($article)){
			$this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}
}
?>