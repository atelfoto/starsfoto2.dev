<?php
App::uses('AppModel', 'Model');
/**
 * Portfolio Model
 *
 * @property User $User
 */
class Portfolio extends AppModel {
/**
 * [$components description]
 * @var array
 */
 public $components = array('Session',"RequestHandler");
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	// Les associations ci-dessous ont été créés avec toutes les clés possibles, ceux qui ne sont pas nécessaires peuvent être enlevés

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * [$actsAs description]
 * @var array
 */
	public $actsAs = array(
			'Upload.Upload' => array(
			'photo' => array(
					'fields' => array(
						'dir' => 'photo_dir'
					),
					'thumbnailMethod' => 'php',
					'thumbnailSizes' => array(
						"xvga"=>"1920x1080",
						'vga' => '640x360',
						'port' => '350x262',
						'thumb' => '150x150'
					),
					'deleteOnUpdate' => true,
					'deleteFolderOnDelete' => true
				)
			)
		);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Name is required',
			),
			'unique'=>array(
				'rule'=>'isUnique',
				"message"=>' This name has already been chosen.'
			)
		),
		'photo' => array(
        	'uploadError' => array(
				'rule' => 'uploadError',
				'message' => ' Something is wrong, try again',
				'on' => 'create'
			),
	    	'isUnderPhpSizeLimit' => array(
	    		'rule' => 'isUnderPhpSizeLimit',
	        	'message' => 'File exceeds the size limit upload file'
	        ),
		     'isValidMimeType' => array(
	    	 	'rule' => array('isValidMimeType', array('image/jpeg', 'image/png'), false),
         	'message' => 'The picture is not jpg or png',
	    	 ),
		     // 'isBelowMaxSize' => array(
	    	 // 	'rule' => array('isBelowMaxSize', 1048576),
       //  	'message' => 'The image size is too large'
	    	 // ),
		     'isValidExtension' => array(
	    	 	'rule' => array('isValidExtension', array('jpg', 'png','jpeg'), false),
    		   	'message' => 'The image does not have the extension jpg or png'
	    	 ),
			 'checkUniqueName' => array(
   		    	 'rule' => array('checkUniqueName'),
   		    	 'message' => 'The image is already registered',
   		    	 'on' => 'update'
      		),
        ),
	);
/**
 * [checkUniqueName: Donne un nom unique à la photo avec le plugin upload]
 * @param  [type] $data [description]
 * @return [type]       [description]
 */
	function checkUniqueName($data)	{
	    $isUnique = $this->find('first', array('fields' => array('Portfolio.photo'), 'conditions' => array('Portfolio.photo' => $data['photo'])));
	    if(!empty($isUnique)) {
	        return false;
	    }
	    else {
	        return true;
	    }
	}
/**
 * [beforeSave duplique sauvegarde le nom de la vue en slug]
 * @param  array  $options [description]
 * @return [type]          [description]
 */
	public function beforeSave($options= array()) {
		if (empty($this->data['post']['slug']) && isset($this->data['Portfolio']['slug']) && !empty($this->data['Portfolio']['name']))
			$this->data["Portfolio"]['slug'] = strtolower(Inflector::slug($this->data['Portfolio']['name']
			,'-'	));

		return true;
	}
/**
 * [beforeDelete description]
 * @param  boolean $cascade [description]
 * @return [type]           [description]
 */
	public function beforeDelete($cascade = true){
		$portfolio = $this->read('Portfolio.id');
		$id =$portfolio['Portfolio']['id'];
		//$portfolio = $this->Portfolio->read($slug);
		$portfolio = $this->read('Portfolio.slug');
		$slug =$portfolio['Portfolio']['slug'];
		$folder = WWW_ROOT .'files'.DS.'portfolio'.DS.$slug;
		$images = $folder.DS.'images';
		$thumbs = $folder.DS.'thumbs';
		if (file_exists($folder)) {
			if (file_exists($images)) {
				foreach(glob($images.'/*.jpg') as $v){
					unlink($v);
				}
				rmdir($images);
			}
			if (file_exists($thumbs)) {
				foreach(glob($thumbs.'/*.jpg') as $v){
					unlink($v);
				}
				rmdir($thumbs);
				$folder = WWW_ROOT .'files'.DS.'portfolio'.DS.$slug;
				if (file_exists($folder)) {
				rmdir($folder);
				}
			}
		}
		return true;
	}
}
