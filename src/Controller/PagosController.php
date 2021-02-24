<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pagos Controller
 *
 * @property \App\Model\Table\PagosTable $Pagos
 *
 * @method \App\Model\Entity\Pago[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PagosController extends AppController
{
    public $paginate = [
        'limit' => 20
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

       // $pagos = $this->paginate($this->Pagos);
        // Use the ArticlesTable to find tagged articles.
        $pagos = $this->Pagos->find()->contain(['Cursos']);;
        $pagos = $this->paginate($pagos);
        $this->set(compact('pagos'));
    }

    /**
     * View method
     *
     * @param string|null $id Pago id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pago = $this->Pagos->get($id, [
            'contain' => ['Cursos']
        ]);

        $this->set('pago', $pago);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pago = $this->Pagos->newEntity();
        if ($this->request->is('post')) {
            $pago = $this->Pagos->patchEntity($pago, $this->request->getData());
            if ($this->Pagos->save($pago)) {
                $this->Flash->success('El Pago se ha creado Correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El Pago no pudo ser creado, Inténtelo nuevamente!');
        }
        $cursos = $this->Pagos->Cursos->find('list', ['limit' => 200]);
        $this->set(compact('pago', 'cursos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pago id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pago = $this->Pagos->get($id, [
            'contain' => ['Cursos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pago = $this->Pagos->patchEntity($pago, $this->request->getData());
            if ($this->Pagos->save($pago)) {
                $this->Flash->success('El Pago se ha editado Correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El Pago no pudo ser editado, Inténtelo nuevamente!');
        }
        $cursos = $this->Pagos->Cursos->find('list', ['limit' => 200]);
        $this->set(compact('pago', 'cursos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pago id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pago = $this->Pagos->get($id);
        if ($this->Pagos->delete($pago)) {
            $this->Flash->success('El Pago se ha eliminado Correctamente');
        } else {
            $this->Flash->error('El Pago no pudo ser eliminado, Inténtelo nuevamente!');
        }

        return $this->redirect(['action' => 'index']);
    }

    public function impresion($filename,$id=null)
    {
        
        
        $this->loadModel('Cursos');
        $cursos = $this->Cursos->find('all');
        /*$this->loadModel('Pagos');
        $pagos = $this->Pagos->find('all');*/

        $pagos = $this->Pagos->find()->contain(['Cursos']);;
        
        $this->loadModel('CursosPagos');
        $cursospagos = $this->CursosPagos->find('all');

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

        $this->set(compact('pagos','cursos','cursospagos','filename'));

        
    }
}
