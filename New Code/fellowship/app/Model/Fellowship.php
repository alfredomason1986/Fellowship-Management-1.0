<?php
App::uses('AppModel', 'Model');
/**
 * Fellowship Model
 *
 * @property Degree $Degree
 * @property Discipline $Discipline
 * @property Elegibility $Elegibility
 * @property User $User
 * @property User $User
 */
class Fellowship extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Degree' => array(
			'className' => 'Degree',
			'foreignKey' => 'degree_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Discipline' => array(
			'className' => 'Discipline',
			'foreignKey' => 'discipline_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Elegibility' => array(
			'className' => 'Elegibility',
			'foreignKey' => 'elegibility_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'users_fellowships',
			'foreignKey' => 'fellowship_id',
			'associationForeignKey' => 'user_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
