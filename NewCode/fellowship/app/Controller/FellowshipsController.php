<?php
App::uses('AppController', 'Controller');

/**
* Fellowships Controller
 *
 * @property Fellowship $Fellowship
 * @property PaginatorComponent $Paginator
 */
class FellowshipsController extends AppController {
	
	
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
		$this->Fellowship->recursive = 0;
		$this->set('fellowships', $this->Paginator->paginate());
	}
	
	
	/**
	* view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Fellowship->exists($id)) {
			throw new NotFoundException(__('Invalid fellowship'));
		}
		$options = array('conditions' => array('Fellowship.' . $this->Fellowship->primaryKey => $id));
		$this->set('fellowship', $this->Fellowship->find('first', $options));
	}
	
	
	/**
	* add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Fellowship->create();
			if ($this->Fellowship->save($this->request->data)) {
				$this->Flash->success(__('The fellowship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			else {
				$this->Flash->error(__('The fellowship could not be saved. Please, try again.'));
			}
		}
		$degrees = $this->Fellowship->Degree->find('list');
		$disciplines = $this->Fellowship->Discipline->find('list');
		$elegibilities = $this->Fellowship->Elegibility->find('list');
		// $users = $this->Fellowship->User->find('list', array('fields' => array('User.id', 'User.role_id')));
		$users = $this->Fellowship->User->find('list');
		$roles = $this->Fellowship->User->Role->find('list');
		
		$this->set(compact('degrees', 'disciplines', 'elegibilities', 'users', 'roles'));
	}
	
	
	/**
	* edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Fellowship->exists($id)) {
			throw new NotFoundException(__('Invalid fellowship'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Fellowship->save($this->request->data)) {
				$this->Flash->success(__('The fellowship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			else {
				$this->Flash->error(__('The fellowship could not be saved. Please, try again.'));
			}
		}
		else {
			$options = array('conditions' => array('Fellowship.' . $this->Fellowship->primaryKey => $id));
			$this->request->data = $this->Fellowship->find('first', $options);
		}
		$degrees = $this->Fellowship->Degree->find('list');
		$disciplines = $this->Fellowship->Discipline->find('list');
		$elegibilities = $this->Fellowship->Elegibility->find('list');
		$users = $this->Fellowship->User->find('list');
		
		$fellowship = $this->Fellowship->find('first', $options);
		$this->set(compact('degrees', 'disciplines', 'elegibilities', 'users', 'fellowship'));
	}
	
	
	/**
	* delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Fellowship->id = $id;
		if (!$this->Fellowship->exists()) {
			throw new NotFoundException(__('Invalid fellowship'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Fellowship->delete()) {
			$this->Flash->success(__('The fellowship has been deleted.'));
		}
		else {
			$this->Flash->error(__('The fellowship could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
