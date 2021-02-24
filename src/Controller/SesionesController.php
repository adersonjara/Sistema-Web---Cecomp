<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sesiones Controller
 *
 * @property \App\Model\Table\SesionesTable $Sesiones
 *
 * @method \App\Model\Entity\Sesione[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SesionesController extends AppController
{

    public $paginate = [
        'limit' => 8,
        'contain' => 'Planes'
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
        //$this->Auth->allow(['index','add','edit','view']);
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
        
        $sesiones = $this->paginate($this->Sesiones);

        $this->set(compact('sesiones'));
    }

    /**
     * View method
     *
     * @param string|null $id Sesione id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sesione = $this->Sesiones->get($id, [
            'contain' => ['Planes', 'Subsesiones']
        ]);

        $this->set('sesione', $sesione);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sesione = $this->Sesiones->newEntity();
        if ($this->request->is('post')) {
            $sesione = $this->Sesiones->patchEntity($sesione, $this->request->getData());
            if ($this->Sesiones->save($sesione)) {
                $this->Flash->success('El Tema se ha creado Correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El Tema no pudo ser creado, Inténtelo nuevamente!');
        }
        $planes = $this->Sesiones->Planes->find('list', ['limit' => 200]);
        $this->set(compact('sesione', 'planes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sesione id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sesione = $this->Sesiones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sesione = $this->Sesiones->patchEntity($sesione, $this->request->getData());
            if ($this->Sesiones->save($sesione)) {
                $this->Flash->success('El Tema se ha editado Correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El Tema no pudo ser editado, Inténtelo nuevamente!');
        }
        $planes = $this->Sesiones->Planes->find('list', ['limit' => 200]);
        $this->set(compact('sesione', 'planes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sesione id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sesione = $this->Sesiones->get($id);
        if ($this->Sesiones->delete($sesione)) {
            $this->Flash->success('El Tema se ha eliminado Correctamente');
        } else {
            $this->Flash->error('El Tema no pudo ser eliminado, Inténtelo nuevamente!');
        }

        return $this->redirect(['action' => 'index']);
    }
}
