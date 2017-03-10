<?php
App::uses('AppController', 'Controller');
/**
 * UsersFellowships Controller
 *
 * @property UsersFellowship $UsersFellowship
 * @property PaginatorComponent $Paginator
 */
class UsersFellowshipsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UsersFellowship->recursive = 0;
		$this->set('usersFellowships', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UsersFellowship->exists($id)) {
			throw new NotFoundException(__('Invalid users fellowship'));
		}
		$options = array('conditions' => array('UsersFellowship.' . $this->UsersFellowship->primaryKey => $id));
		$this->set('usersFellowship', $this->UsersFellowship->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UsersFellowship->create();
			if ($this->UsersFellowship->save($this->request->data)) {
				$this->Flash->success(__('The users fellowship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The users fellowship could not be saved. Please, try again.'));
			}
		}
		$users = $this->UsersFellowship->User->find('list');
		$fellowships = $this->UsersFellowship->Fellowship->find('list');
		$this->set(compact('users', 'fellowships'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UsersFellowship->exists($id)) {
			throw new NotFoundException(__('Invalid users fellowship'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UsersFellowship->save($this->request->data)) {
				$this->Flash->success(__('The users fellowship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The users fellowship could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UsersFellowship.' . $this->UsersFellowship->primaryKey => $id));
			$this->request->data = $this->UsersFellowship->find('first', $options);
		}
		$users = $this->UsersFellowship->User->find('list');
		$fellowships = $this->UsersFellowship->Fellowship->find('list');
		$this->set(compact('users', 'fellowships'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UsersFellowship->id = $id;
		if (!$this->UsersFellowship->exists()) {
			throw new NotFoundException(__('Invalid users fellowship'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UsersFellowship->delete()) {
			$this->Flash->success(__('The users fellowship has been deleted.'));
		} else {
			$this->Flash->error(__('The users fellowship could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
