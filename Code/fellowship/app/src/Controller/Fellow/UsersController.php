<?php
// src/Controller/Fellow/UserssController.php

namespace App\Controller\Fellow;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {

        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['edit']);
		$this->Auth->deny(['index', 'view', 'add']);
    }
	
	public function isAuthorized($user)
	{
		
		if ($this->request->action === 'index') {
			return true;
		}
		
		
/*
		// The owner of an article can edit and delete it
		if (in_array($this->request->action, ['edit', 'delete'])) {
			$articleId = (int)$this->request->params['pass'][0];
			if ($this->Fellowships->isOwnedBy($articleId, $user['id'])) {
				return true;
			}
		}
*/

		return parent::isAuthorized($user);
	}

    public function index()
    {
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }
	
	public function edit($id = null)
	{
		$user = $this->Users->get($id);
		if ($this->request->is(['post', 'put'])) {
			$this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				//$this->Auth->login($this->User->read());
				$this->Flash->success(__('Your profile has been updated.'));
				return $this->redirect(['prefix'=>'fellow', 'controller'=>'Fellowships', 'action' => 'index']);
			}
			$this->Flash->error(__('Unable to update the user.'));
		}

		$this->set('user', $user);
	}
		
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);

		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('The user with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}

}



?>