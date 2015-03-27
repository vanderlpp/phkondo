<?php

App::uses('AppController', 'Controller');
App::uses('Note', 'Model');

/**
 * FractionOwnersController Controller
 *
 * @property Owner $Note
 * @property PaginatorComponent $Paginator
 */
class FractionOwnersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'RequestHandler');

    /**
     * Uses
     *
     * @var array
     */
    public $uses = array('Fraction');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Fraction->recursive=1;
        $fraction = $this->Fraction->find('first', array('conditions' => array('Fraction.id' => $this->Session->read('Condo.Fraction.ViewID'))));
        $entitiesInFraction = Set::extract('/Entity/id', $fraction);
        $this->Fraction->Entity->recursive=1;
        $entities = $this->Fraction->Entity->find('list', array('order' => 'Entity.name', 'conditions' => array('Entity.entity_type_id' => '1', array('NOT' => array('Entity.id' => $entitiesInFraction)))));
        $this->set(compact('fraction', 'entities'));
        $this->Session->delete('Condo.Owner');
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Fraction->Entity->exists($id)) {
            $this->Session->setFlash(__('Invalid owner'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        }
        $entitiesFraction = $this->Fraction->EntitiesFraction->find('first', array('conditions' => array('EntitiesFraction.fraction_id' => $this->Session->read('Condo.Fraction.ViewID'), 'EntitiesFraction.entity_id' => $id)));
        if (count($entitiesFraction) == 0) {
            $this->Session->setFlash(__('The owner could not be found at this fraction. Please, try again.'), 'flash/error');
            $this->redirect(array('controller' => 'entities', 'action' => 'view', $id));
        }

        $options = array('conditions' => array(
                'Entity.id' => $id,
                ));
        $entity = $this->Fraction->Entity->find('first', $options);

        $this->set(compact('entity', 'entitiesFraction'));
        $this->Session->write('Condo.Owner.ViewID', $id);
        $this->Session->write('Condo.Owner.ViewName', $entity['Entity']['name']);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Entity']['entity_type_id'] = '1';
            $this->Fraction->Entity->create();
            if ($this->Fraction->Entity->save($this->request->data)) {
                $this->Session->setFlash(__('The owner has been saved'), 'flash/success');
            } else {
                $this->Session->setFlash(__('The owner could not be saved. Please, try again.'), 'flash/error');
                $this->redirect(array('action' => 'index'));
            }
            $this->Fraction->EntitiesFraction->create();
            $this->request->data['EntitiesFraction']['fraction_id'] = $this->Session->read('Condo.Fraction.ViewID');
            $this->request->data['EntitiesFraction']['entity_id'] = $this->Fraction->Entity->id;
            if ($this->Fraction->EntitiesFraction->save($this->request->data)) {
                $this->Session->setFlash(__('The owner has been saved and related'), 'flash/success');
            } else {
                $this->Session->setFlash(__('The owner has been saved but could not be related. Please, try again.'), 'flash/error');
            }
            $this->redirect(array('action' => 'view', $this->Fraction->Entity->id));
        }
    }

    /**
     * insert method
     *
     * @return void
     */
    public function insert() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['EntitiesFraction']['fraction_id'] = $this->Session->read('Condo.Fraction.ViewID');
            if (!isset($this->request->data['EntitiesFraction']['entity_id'])) {
                $this->Session->setFlash(__('Invalid owner'), 'flash/error');
                $this->redirect(array('action' => 'index'));
            }
            $this->Fraction->EntitiesFraction->create();
            if ($this->Fraction->EntitiesFraction->save($this->request->data)) {
                $this->Session->setFlash(__('The owner has been related'), 'flash/success');
            } else {
                $this->Session->setFlash(__('The owner could not be related. Please, try again.'), 'flash/error');
            }
        }
        $this->redirect(array('action' => 'index'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Fraction->Entity->exists($id)) {
            $this->Session->setFlash(__('Invalid owner'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->Fraction->Entity->save($this->request->data)) {
                $this->Session->setFlash(__('The owner has been saved'), 'flash/success');
                if ($this->Fraction->EntitiesFraction->save($this->request->data)) {
                    $this->Session->setFlash(__('The owner has been saved'), 'flash/success');
                    $this->redirect(array('action' => 'view', $id));
                } else {
                    $this->Session->setFlash(__('The owner has been saved but could not be related. Please, try again.'), 'flash/error');
                }
                
                
            } else {
                $this->Session->setFlash(__('The owner could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $options = array('conditions' => array(
                'Entity.' . $this->Fraction->Entity->primaryKey => $id,
                ));
        $fraction = $this->Fraction->Entity->find('first', $options);

        $options = array('conditions' => array(
                'EntitiesFraction.fraction_id' => $this->Session->read('Condo.Fraction.ViewID'),
                'EntitiesFraction.entity_id' => $id,
                ));
        $entitiesFraction = $this->Fraction->EntitiesFraction->find('first', $options);

        $this->Session->write('Condo.Owner.ViewID', $id);
        $this->Session->write('Condo.Owner.ViewName', $fraction['Entity']['name']);
        $this->request->data = $fraction;
        $this->request->data['EntitiesFraction'] = $entitiesFraction['EntitiesFraction'];
    }

    /**
     * current_account method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @return void
     */
    public function current_account() {
        $id = $this->Session->read('Condo.Owner.ViewID');
        $fraction_id = $this->Session->read('Condo.Fraction.ViewID');
        if (!$this->Fraction->Entity->exists($id)) {
            $this->Session->setFlash(__('Invalid owner'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        }
        $entitiesFraction = $this->Fraction->EntitiesFraction->find('first', array('conditions' => array('EntitiesFraction.fraction_id' => $fraction_id, 'EntitiesFraction.entity_id' => $id)));
        if (count($entitiesFraction) == 0) {
            $this->Session->setFlash(__('The owner could not be found at this fraction. Please, try again.'), 'flash/error');
            $this->redirect(array('controller' => 'entities', 'action' => 'view', $id));
        }
        
        $event = new CakeEvent('Phkondo.FractionOwner.currentAccount', $this, array(
            'id' => $id,
            'fraction_id'=>$fraction_id
        ));
        $this->getEventManager()->dispatch($event);
        

    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function remove($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Fraction->Entity->id = $id;
        if (!$this->Fraction->Entity->exists()) {
            $this->Session->setFlash(__('Invalid owner'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Fraction->EntitiesFraction->deleteAll(array('EntitiesFraction.entity_id' => $id, 'EntitiesFraction.fraction_id' => $this->Session->read('Condo.Fraction.ViewID')), false)) {
            $this->Session->setFlash(__('Owner removed'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Owner was not removed'), 'flash/error');
        $this->redirect(array('action' => 'view', $id));
    }

    public function beforeFilter() {
        parent::beforeFilter();
        if (!$this->Session->check('Condo.Fraction.ViewID')) {
            $this->Session->setFlash(__('Invalid fraction'), 'flash/error');
            $this->redirect(array('controller'=>'fractions','action' => 'index'));
        }
    }

    public function beforeRender() {
        $breadcrumbs = array(
            array('link' => Router::url(array('controller' => 'pages', 'action' => 'index')), 'text' => __('Home'), 'active' => ''),
            array('link' => Router::url(array('controller' => 'condos', 'action' => 'index')), 'text' => __('Condos'), 'active' => ''),
            array('link' => Router::url(array('controller' => 'condos', 'action' => 'view', $this->Session->read('Condo.ViewID'))), 'text' => $this->Session->read('Condo.ViewName'), 'active' => ''),
            array('link' => Router::url(array('controller' => 'fractions', 'action' => 'index')), 'text' => __('Fractions'), 'active' => ''),
            array('link' => Router::url(array('controller' => 'fractions', 'action' => 'view', $this->Session->read('Condo.Fraction.ViewID'))), 'text' => $this->Session->read('Condo.Fraction.ViewName'), 'active' => ''),
            array('link' => '', 'text' => __('Owners'), 'active' => 'active')
        );
        switch ($this->action) {
            case 'view':
                $breadcrumbs[5] = array('link' => Router::url(array('controller' => 'fraction_owners', 'action' => 'index')), 'text' => __('Owners'), 'active' => '');
                $breadcrumbs[6] = array('link' => '', 'text' => $this->Session->read('Condo.Owner.ViewName'), 'active' => 'active');
                break;
            case 'edit':
                $breadcrumbs[5] = array('link' => Router::url(array('controller' => 'fraction_owners', 'action' => 'index')), 'text' => __('Owners'), 'active' => '');
                $breadcrumbs[6] = array('link' => '', 'text' => $this->Session->read('Condo.Owner.ViewName'), 'active' => 'active');
                break;
        }
        $this->set(compact('breadcrumbs'));
    }

}