<?php
// src/Model/Table/FellowshipsTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class FellowshipsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsToMany('Users', [
            'joinTable' => 'users_fellowships',
        ]);
    }

	public function isOwnedBy($articleId, $userId)
	{
		return $this->exists(['id' => $articleId, 'user_id' => $userId]);
	}
	
	public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title')
            ->requirePresence('title')
            ->notEmpty('body')
            ->requirePresence('body');

        return $validator;
    }
}
?>