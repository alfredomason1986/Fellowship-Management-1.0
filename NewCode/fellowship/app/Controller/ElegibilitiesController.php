<?php
App::uses('AppController', 'Controller');
/**
 * Elegibilities Controller
 *
 * @property Elegibility $Elegibility
 * @property PaginatorComponent $Paginator
 */
class ElegibilitiesController extends AppController {

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
		$this->Elegibility->recursive = 0;
		$this->set('elegibilities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Elegibility->exists($id)) {
			throw new NotFoundException(__('Invalid elegibility'));
		}
		$options = array('conditions' => array('Elegibility.' . $this->Elegibility->primaryKey => $id));
		$this->set('elegibility', $this->Elegibility->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Elegibility->create();
			if ($this->Elegibility->save($this->request->data)) {
				$this->Flash->success(__('The elegibility has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The elegibility could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Elegibility->exists($id)) {
			throw new NotFoundException(__('Invalid elegibility'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Elegibility->save($this->request->data)) {
				$this->Flash->success(__('The elegibility has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The elegibility could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Elegibility.' . $this->Elegibility->primaryKey => $id));
			$this->request->data = $this->Elegibility->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Elegibility->id = $id;
		if (!$this->Elegibility->exists()) {
			throw new NotFoundException(__('Invalid elegibility'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Elegibility->delete()) {
			$this->Flash->success(__('The elegibility has been deleted.'));
		} else {
			$this->Flash->error(__('The elegibility could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
