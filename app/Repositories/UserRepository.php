<?php

namespace App\Repositories;

use App\Models\User, App\Models\Role;
use Image;
use Input;

class UserRepository extends BaseRepository
{

	/**
	 * The Role instance.
	 *
	 * @var App\Models\Role
	 */	
	protected $role;

	/**
	 * Create a new UserRepository instance.
	 *
   	 * @param  App\Models\User $user
	 * @param  App\Models\Role $role
	 * @return void
	 */
	public function __construct(
		User $user, 
		Role $role)
	{
		$this->model = $user;
		$this->role = $role;
	}

	/**
	 * Save the User.
	 *
	 * @param  App\Models\User $user
	 * @param  Array  $inputs
	 * @return void
	 */
  	private function save($user, $inputs)
	{		
		if(isset($inputs['seen'])) 
		{
			$user->seen = $inputs['seen'] == 'true';		
		} else {

			$user->username = $inputs['username'];
			$user->email = $inputs['email'];

			if(isset($inputs['role'])) {
				$user->role_id = $inputs['role'];	
			} else {
				$role_user = $this->role->where('slug', 'user')->first();
				$user->role_id = $role_user->id;
			}
		}

		$user->save();
	}

	/**
	 * Get users collection paginate.
	 *
	 * @param  int  $n
	 * @param  string  $role
	 * @return Illuminate\Support\Collection
	 */
	public function index($n, $role)
	{
		if($role != 'total')
		{
			return $this->model
			->with('role')
			->whereHas('role', function($q) use($role) {
				$q->whereSlug($role);
			})		
			->oldest('seen')
			->latest()
			->paginate($n);			
		}

		return $this->model
		->with('role')		
		->oldest('seen')
		->latest()
		->paginate($n);
	}

	/**
	 * Count the users.
	 *
	 * @param  string  $role
	 * @return int
	 */
	public function count($role = null)
	{
		if($role)
		{
			return $this->model
			->whereHas('role', function($q) use($role) {
				$q->whereSlug($role);
			})->count();			
		}

		return $this->model->count();
	}

	/**
	 * Count the users.
	 *
	 * @param  string  $role
	 * @return int
	 */
	public function counts()
	{
		$counts = [
			'admin' => $this->count('admin'),
			'redac' => $this->count('redac'),
			'user' => $this->count('user'),
			'guest' => $this->count('guest')
		];

		$counts['total'] = array_sum($counts);

		return $counts;
	}

	/**
	 * Create a user.
	 *
	 * @param  array  $inputs
	 * @param  int    $confirmation_code
	 * @return App\Models\User 
	 */
	public function store($inputs, $confirmation_code = null)
	{
		$user = new $this->model;

		$user->password = bcrypt($inputs['password']);

		if($confirmation_code) {
			$user->confirmation_code = $confirmation_code;
		} else {
			$user->confirmed = true;
		}


		/*IMAGE*/		
		$imagex = Input::get('imagex'); 
		$input = Input::all();
		        if (Input::hasFile('imagex'))
            {

            	//Store in filemanger userfiles/users
            	$image = Input::file('imagex');
				$image_filename = $image->getClientOriginalName();
				$image_path = public_path('/filemanager/userfiles/users/'.$image_filename);
				Image::make($image->getRealPath())-> resize(200, 200)-> save($image_path);
				$url = "/filemanager/userfiles/users";
       
             
            }
            else
            {
             $url =$url;
             $image_filename = "empty.png";
            }
          


		$user->imagepath = $url ;
		$user->imagefilename = $image_filename;    
	    $this->save($user, $inputs);
		/*IMAGE END*/	


		$this->save($user, $inputs);

		return $user;
	}

	/**
	 * Update a user.
	 *
	 * @param  array  $inputs
	 * @param  App\Models\User $user
	 * @return void
	 */
	public function update($inputs, $user)
	{		
		$user->confirmed = isset($inputs['confirmed']);



		/*IMAGE*/		
// upload file is here than START
	
	
		$input = Input::all();
		        if (Input::hasFile('imagey'))
            {

            	//Store in filemanger userfiles/users
            	$image = Input::file('imagey');
				$image_filename = $image->getClientOriginalName();
				$image_path = public_path('/filemanager/userfiles/users/'.$image_filename);
				Image::make($image->getRealPath())-> resize(200, 200)-> save($image_path);
				$url = "/filemanager/userfiles/users";
       			
             
            }
            else
            // upload file is here than END  
            { 
            	$url = "/filemanager/userfiles/users";
            	$image_filename =Input::get('imagefilename_old');;
			
			 }


	         //Update Store
			$user->imagepath = $url ;
			$user->imagefilename = $image_filename;    
		   
			/*IMAGE END*/	


		$this->save($user, $inputs);
	}

	/**
	 * Get statut of authenticated user.
	 *
	 * @return string
	 */
	public function getStatut()
	{
		return session('statut');
	}

	/**
	 * Valid user.
	 *
     * @param  bool  $valid
     * @param  int   $id
	 * @return void
	 */
	public function valid($valid, $id)
	{
		$user = $this->getById($id);

		$user->valid = $valid == 'true';

		$user->save();
	}

	/**
	 * Destroy a user.
	 *
	 * @param  App\Models\User $user
	 * @return void
	 */
	public function destroyUser(User $user)
	{
		$user->comments()->delete();
		
		$user->delete();
	}

	/**
	 * Confirm a user.
	 *
	 * @param  string  $confirmation_code
	 * @return App\Models\User
	 */
	public function confirm($confirmation_code)
	{
		$user = $this->model->whereConfirmationCode($confirmation_code)->firstOrFail();

		$user->confirmed = true;
		$user->confirmation_code = null;
		$user->save();
	}

}
