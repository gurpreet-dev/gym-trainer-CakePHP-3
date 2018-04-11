<?php
namespace App\Controller\Admin;
use Cake\Event\Event;
use App\Controller\AppController;

/**
 * Homesections Controller
 *
 * @property \App\Model\Table\HomesectionsTable $Homesections
 *
 * @method \App\Model\Entity\Homesection[] paginate($object = null, array $settings = [])
 */
class HomesectionsController extends AppController
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
        $homesections = $this->Homesections->find()->toArray();

        $this->set(compact('homesections'));
        $this->set('_serialize', ['homesections']);
    }

    /**
     * View method
     *
     * @param string|null $id Homesection id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $homesection = $this->Homesections->get($id, [
            'contain' => []
        ]);

        $this->set('homesection', $homesection);
        $this->set('_serialize', ['homesection']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $homesection = $this->Homesections->newEntity();
        if ($this->request->is('post')) {
            $homesection = $this->Homesections->patchEntity($homesection, $this->request->getData());
            if ($this->Homesections->save($homesection)) {
                $this->Flash->success(__('The homesection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }else{
            	$this->Flash->error(__('The homesection could not be saved. Please, try again.'));
			}	
        }
        $this->set(compact('homesection'));
        $this->set('_serialize', ['homesection']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Homesection id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $homesection = $this->Homesections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $homesection = $this->Homesections->patchEntity($homesection, $this->request->getData());
            if ($this->Homesections->save($homesection)) {
                $this->Flash->success(__('The homesection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }else{
            	$this->Flash->error(__('The homesection could not be saved. Please, try again.'));
			}	
        }
        $this->set(compact('homesection'));
        $this->set('_serialize', ['homesection']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Homesection id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $homesection = $this->Homesections->get($id);
        if ($this->Homesections->delete($homesection)) {
            $this->Flash->success(__('The homesection has been deleted.'));
        } else {
            $this->Flash->error(__('The homesection could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
