<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

use App\ContactMessage;
use App\Http\Requests\ContactMessageRequest;
use Illuminate\Http\Request;



class HomePagesController extends Controller
{

    private $postRepository;
    private $tagRepositroy;
    private $categoryRepository;

    public function __construct(PostRepositoryInterface $postRepository,
                                TagRepositoryInterface $tagRepositroy,
                                CategoryRepositoryInterface $categoryRepository){

        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepositroy;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(){

        $data = [
            'posts' => $this->postRepository->all(),
            'categories' => $this->categoryRepository->all(),
            'tags' => $this->tagRepository->all()
        ];


        return view('homePages.index', $data);
    }

    public function contact(){

        return view('homePages.contact');
    }

    public function storeMessage(ContactMessageRequest $request){

        ContactMessage::create([
            'email' => $request->input('email'),
            'content' => $request->input('content')
        ]);

        return redirect('/contact')
            ->with('success','Message sent');

    }

    public function admin(){
        return view('homePages.admin');
    }

    public function show($time, $title){

        $title =  preg_replace('/[\s-_]/',' ',$title);
        $data = [
            'post' => $this->postRepository->getTimeTitle($time, $title),
            'categories' => $this->categoryRepository->all(),
            'tags' => $this->tagRepository->all()
        ];

        return view('homePages.show', $data)
            ->with('title',$title);
    }

    public function postsWithCategory($category_name)
    {
        $data =  $this->postRepository->postsWithCategory($category_name);

        return view('homePages.postCategory', $data);
    }


    public function postsWithTag($tag_name){

        $data = $this->postRepository->postsWithTag($tag_name);

        return view('homePages.postTag', $data);

    }

}
