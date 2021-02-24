<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Anuncios Controller
 *
 * @property \App\Model\Table\AnunciosTable $Anuncios
 *
 * @method \App\Model\Entity\Anuncio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnunciosController extends AppController
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
        
        $anuncios = $this->paginate($this->Anuncios);

        $this->set(compact('anuncios'));
    }

    /**
     * View method
     *
     * @param string|null $id Anuncio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $anuncio = $this->Anuncios->get($id, [
            'contain' => ['Cursos']
        ]);

        $this->set('anuncio', $anuncio);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $anuncio = $this->Anuncios->newEntity();
        if ($this->request->is('post')) {
            $anuncio = $this->Anuncios->patchEntity($anuncio, $this->request->getData());
            if ($this->Anuncios->save($anuncio)) {
                $this->Flash->success('El anuncio se ha creado Correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El curso no pudo ser creado, Inténtelo nuevamente!');
        }
        $cursos = $this->Anuncios->Cursos->find('list', ['limit' => 200]);
        $this->set(compact('anuncio', 'cursos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Anuncio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $anuncio = $this->Anuncios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $anuncio = $this->Anuncios->patchEntity($anuncio, $this->request->getData());
            if ($this->Anuncios->save($anuncio)) {
                $this->Flash->success('El anuncio se ha editado Correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El curso no pudo ser editado, Inténtelo nuevamente!');
        }
        $cursos = $this->Anuncios->Cursos->find('list', ['limit' => 200]);
        $this->set(compact('anuncio', 'cursos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Anuncio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $anuncio = $this->Anuncios->get($id);
        if ($this->Anuncios->delete($anuncio)) {
            $this->Flash->success('El anuncio se ha eliminado Correctamente');
        } else {
            $this->Flash->error('El anuncio no pudo ser eliminado, Inténtelo nuevamente!');
        }

        return $this->redirect(['action' => 'index']);
    }

    public function impresion($filename,$id=null)
    {
        
        $anuncios = $this->paginate($this->Anuncios);
        

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

        $this->set(compact('anuncios','filename'));

        
    }
}
