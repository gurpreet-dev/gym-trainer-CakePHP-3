<?php

namespace App\Controller;
use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class TrainerController extends AppController
{
	public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'view']);
        $this->authcontent();
    }
	
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index(){
	
	 	$conn = ConnectionManager::get('default');
		
		$this->loadModel('Users');
				
		if(!$this->request->getQuery('latitude')){
			return $this->redirect('/');
		}
		
		if($this->request->getQuery('page')){
			$page = $this->request->getQuery('page');
		}else{
			$page = 1;
		}
		
		$item_per_page = 6;
		
		$lat = $this->request->getQuery('latitude');
		$long = $this->request->getQuery('longitude');
		
		if($this->request->getQuery('search_name')){
			$query="SELECT *, get_distance_in_miles_between_geo_locations('".$lat."','".$long."',`latitude`,`longitude`) as distance FROM users WHERE name LIKE '%".$this->request->getQuery('search_name')."%' AND role = 'trainer' AND latitude != '' HAVING distance < 5 ORDER BY distance";
		}else{
			$query="SELECT *, get_distance_in_miles_between_geo_locations('".$lat."','".$long."',`latitude`,`longitude`) as distance FROM users WHERE role = 'trainer' AND latitude != '' HAVING distance < 5 ORDER BY distance";
		}
		
		$position = ($page - 1) * $item_per_page;
			
		$query .= " LIMIT $position, $item_per_page";
		
		$data = $conn->execute($query); 
		$trainers = $data->fetchAll('assoc');

   		$this->set('trainers', $trainers);
		
		if($this->request->getQuery('search_name')){
			$query2="SELECT *, get_distance_in_miles_between_geo_locations('".$lat."','".$long."',`latitude`,`longitude`) as distance FROM users WHERE name LIKE '%".$this->request->getQuery('search_name')."%' AND role = 'trainer' AND latitude != '' HAVING distance < 5 ORDER BY distance";
		}else{
			$query2="SELECT *, get_distance_in_miles_between_geo_locations('".$lat."','".$long."',`latitude`,`longitude`) as distance FROM users WHERE role = 'trainer' AND latitude != '' HAVING distance < 5 ORDER BY distance";
		}
		
		$data = $conn->execute($query2); 
		$trainer_count = $data->fetchAll('assoc');
		
		$pages = ceil(count($trainer_count)/$item_per_page);
		
		$url = '';
		
		$url = '?search='.$this->request->getQuery('search').'&latitude='.$this->request->getQuery('latitude').'&longitude='.$this->request->getQuery('longitude');
		
		
		$url2 = $url;
		if($this->request->getQuery('search_name')){
			$url2 .= '&search_name='.$this->request->getQuery('search_name');
		}
		
		$this->set('latitude', $lat);
		$this->set('longitude', $long);
		$this->set('current_page', $page);
		$this->set('pages', $pages);
		$this->set('url', $url);
		$this->set('url2', $url2);
		
	}
	
	public function view($id = null){
	
		$this->loadModel('Users');
		$this->loadModel('Reviews');
		
		$id = base64_decode($id);
		$id = substr($id, 7);
		
		$trainer = $this->Users->get($id, [
			'contain' => ['Galleries', 'Reviews']
		]);
		
		$reviews = $this->Reviews->find('all',[
			'conditions' => ['Reviews.trainer_id' => $id, 'Reviews.user_id' => $this->Auth->user('id')]
		]);
		
		$reviews = $reviews->all()->toArray();
		
		$this->set('trainer', $trainer);
		$this->set('_serialize', ['trainer']);
		
		$this->set('reviews', $reviews);
		$this->set('_serialize', ['reviews']);
		
		/**************************/
		
		 $this->paginate = [
			'conditions' => ['Reviews.trainer_id' => $id],
			'contain'	=>	['Users'],
			'limit'		=>	10,
			'order' 	=> ['Reviews.id' => 'desc']
		];
		$this->set('allreviews', $this->paginate($this->Reviews)->toArray());
		
	}
}	
