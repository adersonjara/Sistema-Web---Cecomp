<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public $paginate = [
        'limit' => 5
    ];
    public $helpers = [
        'Paginator' => ['templates' => 'paginator-templates']
    ];
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');

        
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    //Lo que puede hacer sin estar authentificado.
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        //$this->Auth->allow(['add']);
    }


    //Si es usuario solo puede ver y listar los usuarios, no puede eliminar, ni editar ningun usuario
    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['index','view', 'logout','impresion']))
            {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->error('Tu usuario o contraseña son incorrectos, o están vacíos!',['key' => 'auth']);
            }
            
        }
        if ($this->Auth->user())
        {
            return $this->redirect(['controller' => 'Users', 'action' => 'index']);
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    
    public function index()
    {
        $users = $this->paginate($this->Users);
        $this->set('users',$users);
        //$this->Flash->success('Ahora estas conectado!');
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if (empty($user->role)) {
                $user->role = 'user';
            }
            if (empty($user->active)) {
                $user->active = 1;
            }

            if ($this->Users->save($user)) {
                $this->Flash->success('El usuario se ha creado correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El usuario no pudo ser creado, vuelva a intentarlo más tarde!');
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('El usuario se ha creado correctamente');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El usuario no pudo ser editado, vuelva a intentarlo más tarde!');
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('El usuario ha sido eliminado');
        } else {
            $this->Flash->error('El usuario no pudo ser eliminado, vuelva a intentarlo más tarde!');
        }

        return $this->redirect(['action' => 'index']);
    }

    public function impresion($filename,$id=null)
    {
        
        $users = $this->paginate($this->Users);
        

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

        $this->set(compact('users','filename'));

        
    }
}
