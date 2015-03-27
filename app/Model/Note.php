<?php

App::uses('AppModel', 'Model');

/**
 * Note Model
 *
 * @property NoteType $NoteType
 * @property Fraction $Fraction
 * @property FiscalYear $FiscalYear
 * @property NoteStatus $NoteStatus
 */
class Note extends AppModel {

    public $actsAs = array('Containable');

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';

    /**
     * order field
     *
     * @var string
     */
    public $order = array("Note.document_date" => "asc", "Note.document" => "asc");

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'note_type_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'document' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => true,
                'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'fraction_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'fiscal_year_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                'allowEmpty' => true,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'entity_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                'allowEmpty' => true,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'budget_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                'allowEmpty' => true,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'amount' => array(
            'money' => array(
                'rule' => array('money'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'pending_amount' => array(
            'money' => array(
                'rule' => array('money'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'title' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'document_date' => array(
            'date' => array(
                'rule' => array('date'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'due_date' => array(
            'date' => array(
                'rule' => array('date'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'payment_date' => array(
            'date' => array(
                'rule' => array('date'),
                //'message' => 'Your custom message here',
                'allowEmpty' => false,
                'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'note_status_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'receipt_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                'allowEmpty' => true,
                'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'NoteType' => array(
            'className' => 'NoteType',
            'foreignKey' => 'note_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Fraction' => array(
            'className' => 'Fraction',
            'foreignKey' => 'fraction_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'FiscalYear' => array(
            'className' => 'FiscalYear',
            'foreignKey' => 'fiscal_year_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Entity' => array(
            'className' => 'Entity',
            'foreignKey' => 'entity_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Budget' => array(
            'className' => 'Budget',
            'foreignKey' => 'budget_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'NoteStatus' => array(
            'className' => 'NoteStatus',
            'foreignKey' => 'note_status_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Receipt' => array(
            'className' => 'Receipt',
            'foreignKey' => 'receipt_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

    public function beforeDelete($cascade = true) {
        if (in_array($this->field('note_status_id'),array(2,3))){
            return false;
        }
        if ($this->field('receipt_id') != null){
            return false;
        }
        $this->receipt_id=$this->field('note_status_id');
        $this->budget_id=$this->field('budget_id');
        return true;
    }
    
    public function afterDelete() {
       $this->_updateReceiptAmount($this->receipt_id);
       $this->_updateBudgetAmount($this->budget_id);
    }

    function deletable($id = null) {
        $this->noAfterFind = true;

        if (!empty($id)) {
            $this->id = $id;
        }

        $id = $this->id;
        if (!$this->exists()) {
            return false;
        }

        $result = true;

        return $this->beforeDelete(false);
    }

    function editable($record = null) {
        if (isset($record['note_status_id']) && in_array($record['note_status_id'],array(2,3)) && $record['receipt_id']!='') {
            return false;
        }
        return true;
    }

    /**
     * afterFind callback
     * 
     * @param array $results
     * @param boolean $primary
     * @access public
     * @return array
     */
    public function afterFind($results, $primary = false) {
        //debug($this->noAfterFind);
        if ($this->noAfterFind) {
            $this->noAfterFind = false;
            return $results;
        }

        if (isset($results[0]['Note'])) {
            foreach ($results as $key => $val) {
                if (isset($results[$key]['Note']['id'])) {
                    $results[$key]['Note']['deletable'] = $this->deletable($results[$key]['Note']['id']);
                    $results[$key]['Note']['editable'] = $this->editable($results[$key]['Note']);
                }
            }
        }
        if (isset($results['id'])) {
            $results['editable'] = $this->editable($results);
            $results['deletable'] = $this->deletable($results['id']);
        }

        return $results;
    }

   
    /**
     * afterSave callback
     * 
     * @param boolean $primary
     * @param array $options
     * @access public
     * @return null
     */
    public function afterSave($created = null, $options = array()) {

        if ($created == null) {
            $this->_updateReceiptAmount($this->field('receipt_id'));
        }
        $this->_updateBudgetAmount($this->field('budget_id'));
    }

     // Update Receipt Amount
    private function _updateReceiptAmount($id=null) {
       
      
        if ($id != null) {
            $totalDebit = $this->find('first', array(
                'fields' => array('SUM(Note.amount) AS total'),
                'conditions' => array('Note.receipt_id' => $id, 'Note.note_type_id' => '2'))
            );
            $totalCredit = $this->find('first', array(
                'fields' => array('SUM(Note.amount) AS total'),
                'conditions' => array('Note.receipt_id' => $id, 'Note.note_type_id' => '1'))
            );
            $total = $totalDebit[0]['total'] - $totalCredit[0]['total'];
            $this->Receipt->id = $id;
            $this->Receipt->saveField('total_amount', $total);
        }
    }

    // Update Budget Amount
    private function _updateBudgetAmount($id=null) {
        
        
        if ($id != null) {
            $totalDebit = $this->find('first', array(
                'fields' => array('SUM(Note.amount) AS total'),
                'conditions' => array('Note.budget_id' => $id, 'Note.note_type_id' => '2') )
            );
            $totalCredit = $this->find('first', array(
                'fields' =>array('SUM(Note.amount) AS total'),
                'conditions' => array('Note.budget_id' => $id, 'Note.note_type_id' => '1'))
            );
            $total = $totalDebit[0]['total'] - $totalCredit[0]['total'];
            $this->Budget->id = $id;
            $this->Budget->saveField('amount', $total);
        }
    }

}