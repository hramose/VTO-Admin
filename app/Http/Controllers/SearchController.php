<?php namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\SearchRequest;
use App\Repositories\BlogRepository;
use App\Repositories\UserRepository;

class SearchController extends Controller {

	/**
	 * The BlogRepository instance.
	 *
	 * @var App\Repositories\BlogRepository
	 */
	protected $blog_gestion;

	/**
	 * The UserRepository instance.
	 *
	 * @var App\Repositories\UserRepository
	 */
	protected $user_gestion;

	/**
	 * The pagination number.
	 *
	 * @var int
	 */
	protected $nbrPages;

	/**
	 * Create a new BlogController instance.
	 *
	 * @param  App\Repositories\BlogRepository $blog_gestion
	 * @param  App\Repositories\UserRepository $user_gestion
	 * @return void
	*/
	public function __construct(
		BlogRepository $blog_gestion,
		UserRepository $user_gestion)
	{
		$this->user_gestion = $user_gestion;
		$this->blog_gestion = $blog_gestion;
		$this->nbrPages = 2;


	}	



	/**
	 * Find search in blog
	 *
	 * @param  App\Http\Requests\SearchRequest $request
	 * @return Response
	 */
	public function search(SearchRequest $request)
	{
		$search = $request->input('search');
		$posts = $this->blog_gestion->search($this->nbrPages, $search);
		$links = $posts->setPath('')->appends(compact('search'))->render();
		$info = trans('front/blog.info-search') . '<strong>' . $search . '</strong>';
		
		return view('back.search.index', compact('posts', 'links', 'info'));
	}

}
