<?php

namespace App\Controller;



use App\Controller\AppController;

use Cake\Event\Event;

use Cake\Routing\Router;

use Cake\Mailer\Email;

use Cake\Auth\DefaultPasswordHasher;

/**

 * Users Controller

 *

 * @property \App\Model\Table\UsersTable $Users

 *

 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])

 */

class UsersController extends AppController

{

	

	public function beforeFilter(Event $event) {

        parent::beforeFilter($event);



        $this->Auth->allow(['index', 'add', 'login', 'home', 'forgot', 'reset', 'contact']);

        $this->authcontent();

    }

	

    /**

     * Index method

     *

     * @return \Cake\Http\Response|void

     */

    public function index()

    {
	
        $users = $this->paginate($this->Users);



        $this->set(compact('users'));

        $this->set('_serialize', ['users']);

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

        $this->set('_serialize', ['user']);

    }



    /**

     * Add method

     *

     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.

     */

    public function add()

    {

	

		if($this->Auth->user()){

			return $this->redirect(['action' => 'home']);

		}

	

        $user = $this->Users->newEntity();

	

        if ($this->request->is('post')) {

		

			$post = $this->request->getData();

			//echo "<pre>"; print_r($post); echo "</pre>"; exit;

			$post['status'] = '1';
			
			$post['name'] = $post['first_name'].' '.$post['last_name'];


            $user = $this->Users->patchEntity($user, $post);
			
			$new_user = $this->Users->save($user);
			
            if ($new_user) {
				
				if(isset($post['supplement'])){
					if($post['supplement'] == 'yes' || $post['supplement'] == 'Contact me with more info'){
					
						$ms = 'A new trainer has been registered recently with email ID <strong>'.$post['email'].'</strong> and Trainer is Interested in making extra money with supplements.';
						
						$ms .= '<br>';
						
						$ms .= '<table border="0"><tr><th scope="row" align="left">Name</th><td>'.$post['name'].'</td></tr><tr><th scope="row" align="left">Email</th><td>'.$post['email'].'</td></tr><tr><th scope="row" align="left">Phone</th><td>'.$post['phone'].'</td></tr><tr><th scope="row" align="left">Address</th><td>'.$post['address'].'</td></tr><tr><th scope="row" align="left">State</th><td>'.$post['state'].'</td></tr><tr><th scope="row" align="left">Zip</th><td>'.$post['zip'].'</td></tr></table>';
					 
						$email = new Email('default');
						$email->from(['contact@patrainer.com' => 'Patrainer'])
								->emailFormat('html')
								->template('default', 'default')
								->to('contact@patrainer.com')
								->subject('Regarding User Registration')
								->send($ms);
					}else{
						$ms = 'A new trainer has been registered recently with email ID <strong>'.$post['email'].'</strong>';
						
						$ms .= '<br>';
						
						$ms .= '<table border="0"><tr><th scope="row" align="left">Name</th><td>'.$post['name'].'</td></tr><tr><th scope="row" align="left">Email</th><td>'.$post['email'].'</td></tr><tr><th scope="row" align="left">Phone</th><td>'.$post['phone'].'</td></tr><tr><th scope="row" align="left">Address</th><td>'.$post['address'].'</td></tr><tr><th scope="row" align="left">State</th><td>'.$post['state'].'</td></tr><tr><th scope="row" align="left">Zip</th><td>'.$post['zip'].'</td></tr></table>';
					 
						$email = new Email('default');
						$email->from(['contact@patrainer.com' => 'Patrainer'])
								->emailFormat('html')
								->template('default', 'default')
								->to('contact@patrainer.com')
								->subject('Regarding User Registration')
								->send($ms);
					}
				}		
			

                $this->Flash->success(__('Registered Successfully.'));
			
			
				/************************************/
				/*				 Login				*/
				/************************************/
				
				if(!filter_var($this->request->data['email'], FILTER_VALIDATE_EMAIL)===false){

					$this->Auth->config('authenticate', [

						'Form'=>['fields'=>['username'=>'email', 'password'=>'password']]

					]);

					$this->Auth->constructAuthenticate();

					$this->request->data['email'] = $this->request->data['email'];

					//unset($this->request->data['username']);

				}
				
				$user = $this->Auth->identify();
				
				if ($user) {
					$this->Auth->setUser($user);
					
					return $this->redirect(['action' => 'edit', $new_user->id]);
					
				}
				
				/************************************/
				/*			Login (END)				*/
				/************************************/


                //return $this->redirect(['action' => 'add']);

            }else{

            	$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}	

        }

		

        $this->set(compact('user'));

        $this->set('_serialize', ['user']);
		
		$this->loadModel('Countries');
		
		$countries = $this->Countries->find()->toArray();
		
		$this->set(compact('countries'));

        $this->set('_serialize', ['countries']);

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
			
			//echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit;
			
			$post = $this->request->data;
			
			if($this->request->data['form_type'] == 'basic'){
				if($this->request->data['image']['name'] != ''){
					
					if($user->image != ''){
						unlink(WWW_ROOT.'images/users/'.$user->image);
					}	
				
					$image = $this->request->data['image'];
					$name = time().$image['name'];
					$tmp_name = $image['tmp_name'];
					$upload_path = WWW_ROOT.'images/users/'.$name;
					move_uploaded_file($tmp_name, $upload_path);
					
					$post['image'] = $name;
				
				}else{
					unset($this->request->data['image']);
					$post = $this->request->data;
				}
			
						
				$post['name'] = $post['first_name'].' '.$post['last_name'];
			}
            $user = $this->Users->patchEntity($user, $post);

            if ($this->Users->save($user)) {

                $this->Flash->success(__('The user has been saved.'));

            }else{

            	$this->Flash->error(__('The user could not be saved. Please, try again.'));
			
			}
        }
		
		
		$this->loadModel('Countries');
		
		$countries = $this->Countries->find('all');
		$countries = $countries->all();
		
		$this->set(compact('countries'));

        $this->set(compact('user'));

        $this->set('_serialize', ['user']);

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

            $this->Flash->success(__('The user has been deleted.'));

        } else {

            $this->Flash->error(__('The user could not be deleted. Please, try again.'));

        }



        return $this->redirect(['action' => 'index']);

    }

	

	public function login(){

		if ($this->request->is('post')) {

		

			$this->request->session()->delete('user_id');

			if ($this->request->data['username'] == '') {

				$response['isSucess'] = "false";

				$response['msg'] = "Please enter your username!";

			} else if ($this->request->data['password'] == '') {

				$response['isSucess'] = "false";

				$response['msg'] = "Please enter your password!";

			} else {

			

			

				if(!filter_var($this->request->data['username'], FILTER_VALIDATE_EMAIL)===false){

					$this->Auth->config('authenticate', [

						'Form'=>['fields'=>['username'=>'email', 'password'=>'password']]

					]);

					$this->Auth->constructAuthenticate();

					$this->request->data['email'] = $this->request->data['username'];

					unset($this->request->data['username']);

				}

			

				$user = $this->Auth->identify();

				if ($user) {

					if ($user['status'] == 0) {

						$this->Auth->logout();

						$response['data'] = "no data";

						// $response['user'] = $user['email_status'];

						$response['isSucess'] = "false";

						$response['msg'] = "You are not active yet";

					} else {

						$this->Auth->setUser($user);

						

						if($this->Auth->user('role') == 'admin'){

							$this->Auth->logout();

							$response['data'] = "no data";

							$response['isSucess'] = "false";

							$response['msg'] = "Wrong username && password! please try again!";

						}else{				

							$response['data'] = $this->Auth->user();

							$response['isSucess'] = "true";

							$response['msg'] = "Logged In successfully";

						}

					}

				} else {

					$response['data'] = "no data";

					$response['isSucess'] = "false";

					$response['msg'] = "Wrong username && password! please try again!";

				}

			}

		} else {

			return $this->redirect(['controller' => 'users', 'action' => 'add']);

		}

		$this->set(compact('response'));

		$this->set('_serialize', ['response']);

	}

	

	public function logout() {

        if ($this->Auth->logout()) {

            return $this->redirect(['action' => 'home']);

        }

    }

	

	public function home(){

		$this->loadModel('Homesections');
		$this->loadModel('Countries');
		$this->loadModel('Cities');
		
		$homesections = $this->Homesections->find()->toArray();

        $this->set(compact('homesections'));
        $this->set('_serialize', ['homesections']);
		
		//$countries = $this->Countries->find()->toArray();
		$cities = $this->Cities->find()->toArray();

        $this->set(compact('cities'));
        $this->set('_serialize', ['cities']);
		
		$trainers = $this->Users->find('all',[
			'conditions' => ['Users.role' => 'trainer', 'Users.status' => 1],
			'order'		=> ['Users.id' => 'desc'],
			'limit'		=>	5
		]);
		
		$trainers = $trainers->all()->toArray();

        $this->set(compact('trainers'));
        $this->set('_serialize', ['trainers']);

	}

	

	public function forgot(){

		if($this->Auth->user()){
			$this->redirect('/');
		}
	

		if($this->request->is('post')){

			$email = $this->request->data['email'];

			

			$user = $this->Users->find('all', ['conditions' => ['Users.email' => $email]]);

			$user = $user->first();

			$burl = Router::fullbaseUrl();

			if(empty($user)){

				$this->Flash->error(__('Please Enter valid Email Address'));

			}else{

				if($user->email){

					$hash = md5(time() . rand(111999999999999999999999999, 99999999999999999999999999999999999999999));

                    $url = Router::url(['controller' => 'Users', 'action' => 'reset' . '/' . $hash]);

					

					$this->Users->updateAll(array('tokenhash' => $hash), array('id' => $user->id));

					$ms = "Trainer<br/>";

					$ms.='<a href=' . $burl . $url . '>Click here to reset your password</a><br/>';

					$email = new Email('default');

					$email->from(['ayache10@hotmail.com' => 'Patrainer'])

							->emailFormat('html')

							->template('default', 'default')

							->to($user->email)

							->subject('Reset Your Password')

							->send($ms);

					

					$this->Flash->success(__('Check your email to reset your password'));		

				}else{

					$this->Flash->error(__('Email is Invalid'));	

				}

			}

		}

	}
	
	public function reset($token){
	
		if($this->Auth->user()){
			$this->redirect('/');
		}
	
		$query = $this->Users->find('all', ['conditions' => ['Users.tokenhash' => $token]]);
		$data = $query->first();
		if ($data) {
			if ($this->request->is(['patch', 'post', 'put'])) {
				if ($this->request->data['password1'] != $this->request->data['password']) {
					$this->Flash->success(__('New password & confirm password does not match!'));
					return;
					//$this->redirect(['action' => 'reset/' . $token]);
				}
				$this->request->data['tokenhash'] = md5(time() . rand(111999999999999999999999999999, 999999999999999999999999999999999));
				$user = $this->Users->get($data->id, [
					'contain' => []
				]);
				$user = $this->Users->patchEntity($user, $this->request->getData());
				
				if ($this->Users->save($user)) {
					$this->Flash->success(__('Your password has been changed'));
					return;
					//$this->redirect(['action' => 'reset/' . $token]);
				} else {
					$this->Flash->success(__('Invalid Password, try again'));
					return;
					//$this->redirect(['action' => 'reset/' . $token]);
				}
			}
		} else {
			$this->Flash->success(__('Invalid Token, try again'));
			return;
		}
		$this->set(compact('response'));
		$this->set('_serialize', ['response']);		
	}
	
	public function changepassword(){
		$id = $this->Auth->user('id');
		
		$user = $this->Users->get($id, [
			'contain' => []
		]);
		
		if($this->request->is(['patch', 'post', 'put'])){
			if(isset($this->request->data['password1'])){		
				if($this->request->data['password'] != $this->request->data['password1']){
					$this->Flash->error(__('New And Confirm Password Does Not Match'));
					return;
				}
			}
			if((new DefaultPasswordHasher)->check($this->request->data['opassword'], $user['password']))
			{				
				$user = $this->Users->patchEntity($user, $this->request->data);
				if($this->Users->save($user)){
					$this->Flash->error(__('Password Changed Successfully'));
					
					if(isset($_GET['route'])){
						return $this->redirect(['action' => 'edit', $id]);
					}else{
						return $this->redirect(['action' => 'changepassword']);
					}
				} else {
					$this->Flash->success(__('Invalid Password, try again'));
					if(isset($_GET['route'])){
						return $this->redirect(['action' => 'edit', $id]);
					}else{
						return $this->redirect(['action' => 'changepassword']);
					}	
				}
			}else {
				$this->Flash->success(__('Old password did not match'));
				if(isset($_GET['route'])){
					return $this->redirect(['action' => 'edit', $id]);
				}else{
					return $this->redirect(['action' => 'changepassword']);
				}	
			}
		}
	}
	
	public function trainer(){
	
		if($this->Auth->user('role') != 'trainer'){
			$this->redirect('/');
		}
	
		$id = $this->Auth->user('id');
		
		$user = $this->Users->get($id, [
			'contains' => []
		]);
		
		$this->set('user', $user);
		$this->set('_serialize', ['user']);	
		
		$this->loadModel('Galleries');
		
		$gallery = $this->Galleries->find('all',[
			'conditions' => ['user_id' => $this->Auth->user('id')]
		]);
		
		$gallery = $gallery->all();
		
		$this->set('galleries', $gallery);
		$this->set('_serialize', ['galleries']);	
	}
	
	public function traineredit(){
		
		if($this->Auth->user('role') != 'trainer'){
			$this->redirect('/');
		}
		
		$id = $this->Auth->user('id');
		
		$user = $this->Users->get($id, [
			'contains' => []
		]);
		
		$column = $this->request->query('view');
		
		if($this->request->is(['patch', 'put', 'post'])){
		
			$post[$column] =  json_encode($this->request->data['content']);
		
			$user = $this->Users->patchEntity($user, $post);
			
			if($this->Users->save($user)){
				$this->Flash->success(__('Your Info has been Updated Successfully'));
				return $this->redirect(['action' => 'trainer']);
			}else{
				$this->Flash->error(__('Error in info Updation'));
				return $this->redirect(['action' => 'trainer']);
			}
		}
		
		
		$this->loadModel('Galleries');
		
		$gallery = $this->Galleries->find('all',[
			'conditions' => ['user_id' => $this->Auth->user('id')]
		]);
		
		$gallery = $gallery->all();
		
		$this->set('galleries', $gallery);
		$this->set('_serialize', ['galleries']);	
		
		$this->set('content', $user[$column]);
		$this->set('_serialize', ['content']);	
	}
	
	public function addGallery(){
	
		$this->loadModel('Galleries');
		
		$gallery = $this->Galleries->newEntity();
	
		if($this->request->is(['patch', 'put', 'post'])){
			
			$file = $this->request->data['file'];
			$name = time().$file['name'];
			$tmp_name = $file['tmp_name'];
			$upload_path = WWW_ROOT.'images/gallery/'.$name;
			move_uploaded_file($tmp_name, $upload_path);
			
			$this->request->data['file'] = $name;
			$this->request->data['format'] = $file['type'];
			$this->request->data['user_id'] = $this->Auth->user('id');
			
			$gallery = $this->Galleries->patchEntity($gallery, $this->request->data);
			
			if($this->Galleries->save($gallery)){
				$this->Flash->success(__('You file has been uploaded successfully'));
				return $this->redirect(["controller" => "users", "action" => "trainer"]);
			}else{
				$this->Flash->success(__('Error in file upload. Please try again later'));
				return $this->redirect(["controller" => "users", "action" => "trainer"]);
			}
		}
	}
	
	public function removeGallery($id){
	
		$id = base64_decode($id);
		
		$this->loadModel('Galleries');
		
		$gallery = $this->Galleries->get($id, [
			'contains' => []
		]);
		
		unlink(WWW_ROOT.'images/gallery/'.$gallery->file);
		
		$result = $this->Galleries->delete($gallery);
		
		if($result){
			$this->Flash->success(__('You file has been deleted successfully'));
			return $this->redirect(["controller" => "users", "action" => "trainer"]);
		}else{
			$this->Flash->success(__('Error in file deletion. Please try again later'));
			return $this->redirect(["controller" => "users", "action" => "trainer"]);
		}
		
	}
	
	public function contact(){
	
	
		$this->loadModel('Contacts');
	
		$contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {
        
        
            $contact = $this->Contacts->patchEntity($contact, $this->request->data);
            if ($this->Contacts->save($contact)) {
			
				$ms = '<table width="200" border="1"><tr><th scope="row">Name</th><td>'.$this->request->data['name'].'</td></tr><tr><th scope="row">Email</th><td>'.$this->request->data['email'].'</td></tr><tr><th scope="row">Subject</th><td>'.$this->request->data['subject'].'</td></tr><th scope="row">Message</th><td>'.$this->request->data['message'].'</td></tr></table>';

			
				$email = new Email('default');

					$email->from(['contact@patrainer.com' => 'Trainer'])

							->emailFormat('html')

							->template('default', 'default')

							->to('contact@patrainer.com')

							->subject('Contact Us Enquiry')

							->send($ms);
			
			
                $this->Flash->success(__('Your Enquiry has been sent successfully.'));
            }else{
            	$this->Flash->error(__('The contact could not be saved. Please, try again.'));
			}	
        }
        $this->set(compact('contact'));
        $this->set('_serialize', ['contact']);
	}
}

