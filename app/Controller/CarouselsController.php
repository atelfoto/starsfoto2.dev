<?php
App::uses('AppController', 'Controller');
/**
 * Carousels Controller
 *
 * @property Carousel $Carousel
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class CarouselsController extends AppController {
/**
 * Components
 *
 * @var array
 */
public $components = array('Paginator','RequestHandler',  'Session');
/**
 * index method
 *
 * @return void
 */
public function index(){
	$pages = $this->Carousel->find('all'
		,array(
			'conditions'=>array('type'=>'image/jpeg','online'=>1),
			'fields'    =>array('name','photo','photo_dir','class','content')
			)
		);
	return $pages;
}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function view($id = null) {
	if (!$this->Carousel->exists($id)) {
		throw new NotFoundException(__('Invalid carousel'));
	}
	$options = array('conditions' => array('Carousel.' . $this->Carousel->primaryKey => $id));
	$this->set('carousel', $this->Carousel->find('first', $options));
}
/**
 * admin_index method
 *
 * @return void
 */
public function admin_index() {
	$actionHeading =__('carousel manager');
	$this->Carousel->recursive = 0;
	$this->paginate = array('Carousel'=>array(
		'limit'=>6,
		'order'=>array('Carousel.modified' => 'desc'),
		));
	$d['carousels'] = $this->Paginate('Carousel',array(
		'online >= 0'));
	$this->set($d);
	$this->set(compact('actionHeading'));
}

/**
* admin_view
**/
public function admin_view($id=null){
	$options = array('conditions' => array('Carousel.' . $this->Carousel->primaryKey => $id));
	$this->set('carousel', $this->Carousel->find('first', $options));

}


/**
 * admin_add method
 *
 * @return void debug($this->Recipe->validationErrors);
 */
public function admin_add() {
	$actionHeading =__('Add picture');
	if ($this->request->is('post')) {
		$this->Carousel->create();
		if ($this->Carousel->save($this->request->data)) {
			$this->Session->setFlash(__('The picture Id %s has been added to your carousel.Please crop your picture or close .',h($id)), 'notif', array('class' => 'alert alert-success'));
			return $this->redirect(array('action' => 'crop',$this->Carousel->id));
		} else {
			$this->Session->setFlash(__('The picture could not be added to your carousel. please correct your mistakes and try again.'), 'notif', array('class' => 'alert alert-danger'));
		}
	}
	$users = $this->Carousel->User->find('list');
	$this->set(compact('users','actionHeading'));
}

/**
* admin_crop
**/
public function admin_crop($id=null){
	$options = array('conditions' => array('Carousel.' . $this->Carousel->primaryKey => $id));
	$this->set('carousel', $this->Carousel->find('first', $options));
	if($this->request->is('post')){
		if (!empty($this->request->data['h'])) {
			$targ_w = 1900;
			$targ_h = 694;
			$targ_x = $this->request->data['x'];
			$targ_y = $this->request->data['y'];
			$img= $this->request->data['Carousel']['photo'];
			$jpeg_quality = $this->request->data['quality'];
			$src = WWW_ROOT .'files'.DS."carousel".DS."photo".DS. $id.DS.$img;
			$img_r = imagecreatefromjpeg($src);
			$dst_r = imagecreatetruecolor($targ_w, $targ_h);
			imagecopyresampled($dst_r,$img_r,0,0,$this->request->data['x'],$this->request->data['y'],
				$targ_w,$targ_h,$this->request->data['w'],$this->request->data['h']);
			imagejpeg($dst_r,WWW_ROOT .'files'.DS."carousel".DS."photo".DS. $id.DS."xvga_".$img,$jpeg_quality);
			$this->Session->setFlash(__(" Your picture ID %s is been cropped",h($id)), "notif", array('class'=>"success", "type"=>'ok'));
			return $this->redirect(array("action"=>"index",array("admin"=>true)));
		}else{
			$this->Session->setFlash(__("Please select a crop region again then press submit"), "notif", array('class'=>"danger", "type"=>'info'));
		}
	}

}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function admin_edit($id = null) {
	$actionHeading =__('edit');
	if (!$this->Carousel->exists($id)) {
		throw new NotFoundException(__('Invalid carousel'));
	}
	if ($this->request->is(array('post', 'put'))) {
		if ($this->Carousel->save($this->request->data)) {
			Cache::clear();
			foreach(glob(CACHE.'models'.DS.'*') as $file){
				unlink($file);
			}
			foreach(glob(CACHE.'views'.DS.'*.php') as $file){
				unlink($file);
			}

			$this->Session->setFlash(__('The picture ID %s has been modified.',h($id)), 'notif', array('class' => 'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The picture ID %s could not be modified. Please, try again.',h($id)), 'notif', array('class' => 'alert alert-danger'));
		}
	} else {
		$options = array('conditions' => array('Carousel.' . $this->Carousel->primaryKey => $id));
		$this->request->data = $this->Carousel->find('first', $options);
	}
	$actionHeading =__('edit');

	$users = $this->Carousel->User->find('list');
	$this->set(compact('users',"actionHeading","disabled"));
}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function admin_delete($id = null) {
	$carousel = $this->Carousel->read(null,$id);
	$this->Carousel->id = $id;
	if (!$this->Carousel->exists()) {
		throw new NotFoundException(__('Invalid carousel'));
	}
	if ($carousel['Carousel']['class']== 'active'){
		$this->Session->setFlash(__('You cannot delete an active image.Please select another image before.'), 'notif', array('class' => 'alert alert-danger'));
		return $this->redirect(array('action' => 'index'));
	}
	$this->request->allowMethod('post', 'delete');
	if ($this->Carousel->delete()) {
		$this->Session->setFlash(__('The picture %s has been deleted to your carousel.',h($id)), 'notif', array('class' => 'alert alert-success'));
	} else {
		$this->Session->setFlash(__('The picture %s could not be deleted. Please, try again.',h($id)), 'notif', array('class' => 'alert alert-danger'));
	}
	return $this->redirect(array('action' => 'index'));
}

function admin_active($id=null) {
	$carousel = $this->Carousel->read(null,$id);
	if (!$id && empty($carousel)) {
		$this->Session->setFlash(__('You must provide a valid ID number to enable a post.',true),'notif',array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($carousel)) {
		$this->Carousel->updateAll(array('Carousel.class' => "' '"));
		$this->Carousel->saveField('class', "active",false);
		$this->Carousel->saveField('online', 1,false);
		if ($this->Carousel->save($this->Carousel->saveField('class',"active",false))) {
			$this->Session->setFlash(__('The Picture %s has been activated in the first to your carousel.',h($id)),'notif',array('class'=>'success','type'=>'ok'));
		} else {
			$this->Session->setFlash(__('The picture  %s was not activated in the first to your carousel.Please try agin',h($id)),'notif',array('class'=>'danger','type'=>'sign'));
		}
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('No Carousel by that ID was found.',true),'notif',array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
}

function admin_enable($id=null) {
	$carousel = $this->Carousel->read(null,$id);
	if (!$id && empty($carousel)) {
		$this->Session->setFlash(__('You must provide a valid ID number to enable a post.',true),'notif',array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($carousel)) {
		$carousel['Carousel']['online'] = 1;
		if ($this->Carousel->save($this->Carousel->saveField('online', 1,false))) {
			$this->Session->setFlash(__('The picture %s has been published to your carousel.',h($id)),'notif',array('class'=>'success','type'=>'ok'));

		} else {
			$this->Session->setFlash(__('The picture %s was not published to your carousel.',h($id)),'notif',array('class'=>'danger','type'=>'sign'));
		}
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('No Carousel by that ID was found.',true),'notif',array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
}

function admin_disable($id=null) {
	$carousel = $this->Carousel->read(null,$id);
	if (!$id && empty($carousel)) {
		$this->Session->setFlash(__('You must provide a valid ID number to disable a portfolio.',true),'notif',array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if ($carousel['Carousel']['class']== 'active'){
		$this->Session->setFlash(__('you can not disable an active image please actived another image before'),
		 'notif', array('class' => 'alert alert-danger'));

		return $this->redirect(array('action' => 'index'));
	}
	if (!empty($carousel)) {
		$carousel['Carousel']['online'] = 0;
		if ($this->Carousel->save($this->Carousel->saveField('online', 0,false))) {
			$this->Session->setFlash(__('The picture ID %s has been disabled to your carousel.',h($id)),'notif',array('class'=>'success','type'=>'ok'));
		} else {
			$this->Session->setFlash(__('the picture ID %s was not disabled to your carousel.',h($id)),'notif',array('class'=>'danger','type'=>'sign'));
		}

		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('No Carousel by that ID was found.',true),'notif',array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
}
}
