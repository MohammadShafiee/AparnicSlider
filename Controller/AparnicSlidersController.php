<?php

App::uses('AparnicSliderAppController', 'AparnicSlider.Controller');

/**
 * AparnicSliders Controller
 *
 * @property AparnicSlider $AparnicSlider
 * @property PaginatorComponent $Paginator
 */
class AparnicSlidersController extends AparnicSliderAppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->AparnicSlider->recursive = 0;
        $this->set('aparnicSliders', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->AparnicSlider->exists($id)) {
            throw new NotFoundException(__d('croogo', 'Invalid aparnic slider'));
        }
        $options = array('conditions' => array('AparnicSlider.' . $this->AparnicSlider->primaryKey => $id));
        $this->set('aparnicSlider', $this->AparnicSlider->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->AparnicSlider->create();
            
            $this->__setModelNameForMeta();
            
            if ($this->AparnicSlider->saveWithMeta($this->request->data)) {
                $this->Session->setFlash(__d('croogo', 'The aparnic slider has been saved'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__d('croogo', 'The aparnic slider could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
        if (!$this->AparnicSlider->exists($id)) {
            throw new NotFoundException(__d('croogo', 'Invalid aparnic slider'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            $this->__setModelNameForMeta();

            if ($this->AparnicSlider->saveWithMeta($this->request->data)) {
                $this->Session->setFlash(__d('croogo', 'The aparnic slider has been saved'), 'default', array('class' => 'success'));
                $this->Croogo->redirect(array('action' => 'edit', $id));
            } else {
                $this->Session->setFlash(__d('croogo', 'The aparnic slider could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        } else {
            $options = array('conditions' => array('AparnicSlider.' . $this->AparnicSlider->primaryKey => $id));
            $this->request->data = $this->AparnicSlider->find('first', $options);
        }
    }

    //----------------------------------------------------------
    private function __setModelNameForMeta() {
        if (isset($this->request->data[$this->AparnicSlider->Meta->alias])) {
            foreach ($this->request->data[$this->AparnicSlider->Meta->alias] as &$data) {
                $data['model'] = $this->AparnicSlider->alias;
            }
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
        $this->AparnicSlider->id = $id;
        if (!$this->AparnicSlider->exists()) {
            throw new NotFoundException(__d('croogo', 'Invalid aparnic slider'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->AparnicSlider->delete()) {
            $this->Session->setFlash(__d('croogo', 'Aparnic slider deleted'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__d('croogo', 'Aparnic slider was not deleted'), 'default', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }

}
