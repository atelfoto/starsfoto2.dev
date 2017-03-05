<?php
class User extends AppModel{
	public $displayField = 'username';
	public  $HasMany= array(
	 		'Portfolio' => array(
	 			'className' => 'Portfolio',
	 			'foreignKey' => 'user_id',
				'dependent' => false
	 		),
	 		'Post' => array(
	 			'className' => 'Post',
	 			'foreignKey' => 'user_id',
				'dependent' => false
	 		),
	 		'History' => array(
	 			'className' => 'History',
	 			'foreignKey' => 'user_id',
				'dependent' => false
	 		)
	 	);

	public $validate = array(
		'username' =>array(
			'alpha'=>array(
				'rule'=>'notBlank',
				'allowEmpty'=> false,
				'message' => "This field must not be empty"
				),
			"unique"=>array(
				'rule'=> 'isUnique',
				'message'=> 'This username is already used'
				)
			),
		"password"=>array(
			"beta"=>array(
				'rule'=>'notBlank',
				'required'=> false,
				'message' => "You must specify a password"
				),
			"unique"=>array(
				'rule'=> 'isUnique',
				'message'=> 'This username is already used'
				)
			),
        'password2' => array(
            'rule' => 'identicalFields',
            'required' => false,
            'message'=> ' This password is not identical'
        ),
		'avatarf' => array(
			'rule' => 'isJpg',
			'message' => 'You must send a jpg'
			)
		);
	/**
	 * beforeFilter callback
	 *
	 * @return void
	 */
	public function beforeSave($options= array()) {
		if (!empty($this->data['user']['password'] )) {
			$this->data['user']['password'] = AuthComponent::password($this->data['user']['password']);
		}
		return true;
	}
	public function identicalFields($check, $limit){
        $field = key($check);
        return $check[$field] == $this->data['User']['password'];
    }
	public function isJpg($check, $limit){
		$field = key($check);
		$filename= $check[$field]['name'];
		if(empty($filename)){
			return true;
		}
		$info = pathinfo($filename);
		return strtolower($info['extension']) == 'jpg';
	}

	function afterFind($results, $primary = false){
		foreach($results as $k => $result){
			if(isset($result[$this->alias]['avatar']) && isset($result[$this->alias]['id'])){
				$results[$k][$this->alias]['avatari'] = 'avatars/'.ceil($result[$this->alias]['id']/1000).'/'.$result[$this->alias]['id'].'.jpg';
				$results[$k][$this->alias]['avatart'] = 'avatars/'.ceil($result[$this->alias]['id']/1000).'/'.$result[$this->alias]['id'].'_thumb.jpg';
				$results[$k][$this->alias]['avatarm'] = 'avatars/'.ceil($result[$this->alias]['id']/1000).'/'.$result[$this->alias]['id'].'_mini.jpg';
			}
		}
		return $results;
	}

	/**
	 * beforeDelete callback
	 *
	 * @param $cascade boolean
	 * @return boolean
	 */
		public function beforeDelete($cascade = true) {
			$user = $this->read("role");
			if ($user['User']['role'] =='admin') {
				return false;
			}

			return true;
		}


}
