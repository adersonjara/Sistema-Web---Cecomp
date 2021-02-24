<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cursos Controller
 *
 * @property \App\Model\Table\CursosTable $Cursos
 *
 * @method \App\Model\Entity\Curso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CursosController extends AppController
{


    public $components = array('RequestHandler');

    public $paginate = [
        'limit' => 10,
        'contain' => ['Planes']
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
        $this->Auth->allow(['home','presenciales','viewCource','virtuales','viewCourceVirtual']);
    }

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['index','view','edit','add','delete','home','impresion']))
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
        
        $cursos = $this->paginate($this->Cursos);

        $this->set(compact('cursos','planes'));
    }

    public function home()
    {
        $this->loadModel('Cursos');
        $cursos = $this->Cursos->find('all');
        $this->loadModel('Pagos');
        $pagos = $this->Pagos->find('all');
        $this->loadModel('CursosPagos');
        $cursospagos = $this->CursosPagos->find('all');
        $this->loadModel('Anuncios');
        $anuncios = $this->Anuncios->find('all');

        $this->loadModel('Talleres');
        $talleres = $this->Talleres->find('all');

         $this->set(compact('anuncios','talleres','cursos','pagos','cursospagos'));
    }

    public function presenciales(){
        $cursos = $this->paginate($this->Cursos);
        $this->set(compact('cursos'));

    }

    public function virtuales(){
        $this->loadModel('Pagos');
        $pagos = $this->Pagos->find('all');

        $cursos = $this->paginate($this->Cursos);
        $this->set(compact('cursos','pagos'));

    }
    

    


    /**
     * View method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Sesiones');
        $sesione = $this->Sesiones->find('all');
        $this->set('sesione', $sesione);

        $curso = $this->Cursos->get($id, [
            'contain' => ['Planes', 'Pagos', 'Anuncios', 'Talleres']
        ]);
        $this->set('curso', $curso);

        $this->set(compact('curso','sesione'));
        $this->set('_serialize', ['curso','sesione']);
    }

    public function viewCource($id = null)
    {
        $this->loadModel('Sesiones');
        $sesiones = $this->Sesiones->find('all');

       

        $this->loadModel('Subsesiones');
        $subsesiones = $this->Subsesiones->find('all');

        $cursos = $this->Cursos->get($id, [
            'contain' => ['Planes', 'Pagos']
        ]);
 
        $this->set(compact('cursos','sesiones','subsesiones'));

       



    }
    public function viewCourceVirtual($id = null)
    {
        $this->loadModel('Sesiones');
        $sesiones = $this->Sesiones->find('all');

       

        $this->loadModel('Subsesiones');
        $subsesiones = $this->Subsesiones->find('all');

        $cursos = $this->Cursos->get($id, [
            'contain' => ['Planes', 'Pagos']
        ]);
 
        $this->set(compact('cursos','sesiones','subsesiones'));

       



    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $curso = $this->Cursos->newEntity();
        if ($this->request->is('post')) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());
            if ($this->Cursos->save($curso)) {
                $this->Flash->success('El curso se ha creado Correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El curso no pudo ser creado, Inténtelo nuevamente!');
        }



        $planes = $this->Cursos->Planes->find('list', ['limit' => 200]);
        $pagos = $this->Cursos->Pagos->find('list', ['limit' => 200]);
        $this->set(compact('curso', 'planes', 'pagos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $curso = $this->Cursos->get($id, [
            'contain' => ['Pagos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());
            if ($this->Cursos->save($curso)) {
                $this->Flash->success('El curso se ha editado Correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El curso no pudo ser editado, Inténtelo nuevamente!');
        }
        $planes = $this->Cursos->Planes->find('list', ['limit' => 200]);
        $pagos = $this->Cursos->Pagos->find('list', ['limit' => 200]);
        $this->set(compact('curso', 'planes', 'pagos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $curso = $this->Cursos->get($id);
        if ($this->Cursos->delete($curso)) {
            $this->Flash->success('El curso se ha elimando Correctamente');
        } else {
            $this->Flash->error('El curso no pudo ser elimando, Inténtelo nuevamente!');
        }

        return $this->redirect(['action' => 'index']);
    }

    public function impresion($filename,$id=null)
    {
        $this->loadModel('Cursos');
        $cursos = $this->Cursos->find('all');

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

        $this->set(compact('cursos','planes','sesiones','subsesiones','filename'));

        
    }

     public function buscar(){
        $keyword = $this->request->query('keyword');

        if (!empty($keyword)) {
            $this->paginate = [
                'conditions' => [
                    'nombre LIKE' => '%'.$keyword.'%',
                ],
            ];

        }

        $cursos = $this->paginate($this->Cursos);

        $this->set(compact('cursos'));


    }


}
