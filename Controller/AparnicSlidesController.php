<?php
App::uses('AparnicSliderAppController', 'AparnicSlider.Controller');
/**
 * AparnicSlides Controller
 *
 * @property AparnicSlide $AparnicSlide
 * @property PaginatorComponent $Paginator
 */
class AparnicSlidesController extends AparnicSliderAppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index($sliderId = null) {
            if(!$sliderId || !$this->AparnicSlide->AparnicSlider->exists($sliderId)){
                $this->redirect(array(
                    'admin' => true,
                    'plugin' => 'aparnic_slider',
                    'controller' => 'aparnic_sliders',
                    'action' => 'index'
                ));
            }
            $this->paginate['AparnicSlide']['recursive'] = 0;
            $this->paginate['AparnicSlide']['conditions']['AparnicSlide.aparnic_slider_id'] = $sliderId;
            $this->set('aparnicSlides', $this->paginate());
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($sliderId = null) {
            if(!$sliderId){
                $this->redirect($this->referer());
            }
            if ($this->request->is('post')) {
                $this->AparnicSlide->create();
                if ($this->AparnicSlide->save($this->request->data)) {
                    $this->Session->setFlash(__d('croogo', 'The aparnic slide has been saved'), 'default', array('class' => 'success'));
                    $this->redirect(array('action' => 'index', $sliderId));
                } else {
                    $this->Session->setFlash(__d('croogo', 'The aparnic slide could not be saved. Please, try again.'), 'default', array('class' => 'error'));
                }
            }
            $aparnicSliderId = $sliderId;
            $this->set(compact('aparnicSliderId'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($sliderId = null, $id = null) {
		if (!$sliderId || !$this->AparnicSlide->AparnicSlider->exists($sliderId)) {
			throw new NotFoundException(__d('croogo', 'Invalid aparnic slider'));
		}
		if (!$this->AparnicSlide->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid aparnic slide'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AparnicSlide->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The aparnic slide has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'edit', $sliderId, $id));
			} else {
				$this->Session->setFlash(__d('croogo', 'The aparnic slide could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('AparnicSlide.' . $this->AparnicSlide->primaryKey => $id));
			$this->request->data = $this->AparnicSlide->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->AparnicSlide->id = $id;
		if (!$this->AparnicSlide->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid aparnic slide'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AparnicSlide->delete()) {
			$this->Session->setFlash(__d('croogo', 'Aparnic slide deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Aparnic slide was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
