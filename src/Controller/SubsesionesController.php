<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Subsesiones Controller
 *
 * @property \App\Model\Table\SubsesionesTable $Subsesiones
 *
 * @method \App\Model\Entity\Subsesione[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubsesionesController extends AppController
{

    public $components = array('RequestHandler');

    public $paginate = [
        'limit' => 10,
        'contain' => ['Sesiones']
    ];

    public $helpers = [
        'Paginator' => ['templates' => 'paginator-templates']
    ];
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');

        
    }

    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        //$this->Auth->allow(['index','add','edit','view','delete']);
    }

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['index','view','edit','add','delete']))
            {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        

        $this->loadModel('Planes');
        $planes = $this->Planes->find('all');

        $subsesiones = $this->paginate($this->Subsesiones);

        $this->set(compact('subsesiones','planes'));
    }

    /**
     * View method
     *
     * @param string|null $id Subsesione id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subsesione = $this->Subsesiones->get($id, [
            'contain' => ['Sesiones']
        ]);

        $this->set('subsesione', $subsesione);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subsesione = $this->Subsesiones->newEntity();
        if ($this->request->is('post')) {
            $subsesione = $this->Subsesiones->patchEntity($subsesione, $this->request->getData());
            if ($this->Subsesiones->save($subsesione)) {
                $this->Flash->success('El Subtema se ha creado Correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El Subtema no pudo ser creado, Inténtelo nuevamente!');
        }

        $this->loadModel('Planes');
        $planes = $this->Planes->find('all');

        $this->loadModel('Sesiones');
        $sesiones = $this->Sesiones->find('all');


        $this->set(compact('subsesione', 'sesiones','planes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Subsesione id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subsesione = $this->Subsesiones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subsesione = $this->Subsesiones->patchEntity($subsesione, $this->request->getData());
            if ($this->Subsesiones->save($subsesione)) {
                $this->Flash->success('El Subtema se ha editado Correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El Subtema no pudo ser editado, Inténtelo nuevamente!');
        }
        
        $this->loadModel('Planes');
        $planes = $this->Planes->find('all');

        $this->loadModel('Sesiones');
        $sesiones = $this->Sesiones->find('all');


        $this->set(compact('subsesione', 'sesiones','planes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Subsesione id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subsesione = $this->Subsesiones->get($id);
        if ($this->Subsesiones->delete($subsesione)) {
            $this->Flash->success('El Subtema se ha eliminado Correctamente');
        } else {
            $this->Flash->error('El Subtema no pudo ser eliminado, Inténtelo nuevamente!');
        }

        return $this->redirect(['action' => 'index']);
    }
}
