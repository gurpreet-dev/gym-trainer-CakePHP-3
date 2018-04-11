<?php
namespace App\Controller\Admin;



use App\Controller\AppController;

use Cake\Event\Event;

use Cake\Core\Configure;

use Cake\Error\Debugger;

/**
 * Links Controller
 *
 * @property \App\Model\Table\LinksTable $Links
 *
 * @method \App\Model\Entity\Link[] paginate($object = null, array $settings = [])
 */
class LinksController extends AppController
{	

	public function beforeFilter(Event $event) {

        parent::beforeFilter($event);

        if ($this->request->params['prefix'] == 'admin') {

            $this->viewBuilder()->setLayout('admin');

        }

        $this->Auth->allow();

        $this->authcontent();

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $links = $this->paginate($this->Links);

        $this->set(compact('links'));
        $this->set('_serialize', ['links']);
    }

    /**
     * View method
     *
     * @param string|null $id Link id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $link = $this->Links->get($id, [
            'contain' => []
        ]);

        $this->set('link', $link);
        $this->set('_serialize', ['link']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $link = $this->Links->newEntity();
        if ($this->request->is('post')) {
            $link = $this->Links->patchEntity($link, $this->request->getData());
            if ($this->Links->save($link)) {
                $this->Flash->success(__('The link has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The link could not be saved. Please, try again.'));
        }
        $this->set(compact('link'));
        $this->set('_serialize', ['link']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Link id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $link = $this->Links->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $link = $this->Links->patchEntity($link, $this->request->getData());
            if ($this->Links->save($link)) {
                $this->Flash->success(__('The link has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The link could not be saved. Please, try again.'));
        }
        $this->set(compact('link'));
        $this->set('_serialize', ['link']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Link id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $link = $this->Links->get($id);
        if ($this->Links->delete($link)) {
            $this->Flash->success(__('The link has been deleted.'));
        } else {
            $this->Flash->error(__('The link could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
