<?php
// src/Controller/Admins/UsersController.php

namespace App\Controller\Admins;

use App\Controller\AppController;
use Cake\Event\Event;

use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {

        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow([]);
		$this->Auth->deny(['index', 'view', 'add', 'edit']);
    }
	
	public function login()
    {
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
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
        $this->set('users', $this->Users->find('all',
		//array('conditions'=>array('Users.role'=>'admin')),
		array('order'=>array('Users.role'))
		));
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }
	
	public function fellowships(){
		
	}

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('admin', $user);
    }
	
	public function edit($id = null)
	{
		$user = $this->Users->get($id);
		if ($this->request->is(['post', 'put'])) {
			$this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Flash->success(__('The user has been updated.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to update the user.'));
		}

		$this->set('user', $user);
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute('SELECT * FROM fellowships AS f
								INNER JOIN (SELECT id as uf_id, 
								user_id as uf_u_id, fellowship_id as uf_f_id 
								FROM users_fellowships) uf ON (
								  f.id = uf.uf_f_id
								  AND uf.uf_u_id=?
								)', [$id]);
								//IN (SELECT id FROM users WHERE)
		$articles = $stmt->fetchAll('assoc');
		$this->set(compact('articles'));
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