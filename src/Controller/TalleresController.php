<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Talleres Controller
 *
 * @property \App\Model\Table\TalleresTable $Talleres
 *
 * @method \App\Model\Entity\Tallere[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TalleresController extends AppController
{
    public $paginate = [
        'limit' => 10,
        'contain' => ['Cursos']
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
        $talleres = $this->paginate($this->Talleres);

        $this->set(compact('talleres'));
    }

    /**
     * View method
     *
     * @param string|null $id Tallere id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tallere = $this->Talleres->get($id, [
            'contain' => ['Cursos']
        ]);

        $this->set('tallere', $tallere);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tallere = $this->Talleres->newEntity();
        if ($this->request->is('post')) {
            $tallere = $this->Talleres->patchEntity($tallere, $this->request->getData());
            if ($this->Talleres->save($tallere)) {
                $this->Flash->success('El Taller se ha creado Correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El Taller no pudo ser creado, Inténtelo nuevamente!');
        }
        $cursos = $this->Talleres->Cursos->find('list', ['limit' => 200]);
        $this->set(compact('tallere', 'cursos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tallere id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tallere = $this->Talleres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tallere = $this->Talleres->patchEntity($tallere, $this->request->getData());
            if ($this->Talleres->save($tallere)) {
                $this->Flash->success('El Taller se ha editado Correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El Taller no pudo ser editado, Inténtelo nuevamente!');
        }
        $cursos = $this->Talleres->Cursos->find('list', ['limit' => 200]);
        $this->set(compact('tallere', 'cursos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tallere id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tallere = $this->Talleres->get($id);
        if ($this->Talleres->delete($tallere)) {
            $this->Flash->success('El Taller se ha eliminado Correctamente');
        } else {
            $this->Flash->error('El Taller no pudo ser eliminad, Inténtelo nuevamente!');
        }

        return $this->redirect(['action' => 'index']);
    }

    public function impresion($filename,$id=null)
    {
        
        $talleres = $this->paginate($this->Talleres);
        

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

        $this->set(compact('talleres','filename'));

        
    }
}
