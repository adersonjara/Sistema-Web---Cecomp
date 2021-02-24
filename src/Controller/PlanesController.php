<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Planes Controller
 *
 * @property \App\Model\Table\PlanesTable $Planes
 *
 * @method \App\Model\Entity\Plane[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlanesController extends AppController
{

    public $paginate = [
        'limit' => 10
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
            if(in_array($this->request->action, ['index','view','edit','add','delete','impresion']))
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
        $planes = $this->paginate($this->Planes);

        $this->set(compact('planes'));
    }

    public function view($id = null)
    {
        $plane = $this->Planes->get($id, [
            'contain' => ['Sesiones']
        ]);

        $this->set('plane', $plane);
    }

    /**
     * View method
     *
     * @param string|null $id Plane id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $plane = $this->Planes->newEntity();
        if ($this->request->is('post')) {
            $plane = $this->Planes->patchEntity($plane, $this->request->getData());
            if ($this->Planes->save($plane)) {
                $this->Flash->success('El Plan de estudios se ha creado Correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El Plan de estudios no pudo ser creado, Inténtelo nuevamente!');
        }
        $this->set(compact('plane'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Plane id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $plane = $this->Planes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $plane = $this->Planes->patchEntity($plane, $this->request->getData());
            if ($this->Planes->save($plane)) {
                $this->Flash->success('El Plan de estudios se ha editado Correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El Plan de estudios no pudo ser editado, Inténtelo nuevamente!');
        }
        $this->set(compact('plane'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Plane id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $plane = $this->Planes->get($id);
        if ($this->Planes->delete($plane)) {
            $this->Flash->success('El Plan de estudios se ha eliminado Correctamente');
        } else {
            $this->Flash->error('El Plan de estudios no pudo ser eliminado, Inténtelo nuevamente!');
        }

        return $this->redirect(['action' => 'index']);
    }

    public function impresion($filename,$id=null)
    {

        $this->loadModel('Planes');
        $planes = $this->Planes->find('all');

        $this->loadModel('Sesiones');
        $sesiones = $this->Sesiones->find('all');

       

        $this->loadModel('Subsesiones');
        $subsesiones = $this->Subsesiones->find('all');


        $this->viewBuilder()
            ->className('Dompdf.Pdf')
            ->layout('Dompdf.default')
            ->options(['config' => [
                'filename' => $filename,
                'render' => 'browser',
                'paginate' => [
                'text' => "{PAGE_NUM}",
                'x' => 550,
                'y' => 5,
        ],
            ]]);

        $this->set(compact('planes','sesiones','subsesiones','filename'));

        
    }

}
