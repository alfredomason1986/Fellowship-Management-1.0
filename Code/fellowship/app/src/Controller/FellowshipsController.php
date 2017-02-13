<?php
// src/Controller/FellowshipsController.php

namespace App\Controller;

class FellowshipsController extends AppController
{
	public $paginate = [
        'limit' => 10,
        'order' => [
            'fellowships.title' => 'asc'
        ]
    ];
	
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    public function index()
    {
        $articles = $this->Fellowships->find('all');
        //$this->set(compact('articles'));
		$this->set('articles', $this->paginate($articles));

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

		$article = $this->Fellowships->get($id);
		if ($this->Fellowships->delete($article)) {
			$this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}
}
?>