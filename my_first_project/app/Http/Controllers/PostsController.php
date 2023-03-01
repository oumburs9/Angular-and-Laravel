<?php


namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //
       $posts = Post::all();

        return view('posts.index',compact('posts'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        //

        $input =$request->all();

        if($file= $request->file('file')){

           $name = $file->getClientOriginalName();

           $file->move('images',$name);

           $input['path']=$name;

        }

        Post::create($input);











        // $file = $request->file('file');

        // echo '<br>';

        // return $file->getClientOriginalName();




        // return $request->get('title');

        // $this->validate($request,[
        //     'title'=>'required',
        //     // 'body'=>'required'
        // ]);

       Post::create($request->all());

       return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::findOrFail($id);
        

        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::findOrFail($id);

        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $post = Post::findOrFail($id);

        $post->update($request->all());
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();
    }
    public function contact(){

        $people = ['jab','bon','uk'];


        return view('contact',compact('people'));

    }

    public function show_post($id){
        // return view('post') -> with('id',$id);

        return view('post',compact('id'));

    }
}
