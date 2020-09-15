<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNewsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
//require "../PhpOrient/vendor/autoload.php";
//require "../PhpOrient/vendor/autoloadconex.php";
//use PhpOrient\PhpOrient;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$news = News::get();
        //$mutable = Carbon::now();       
        $news = DB::table('newsSS')
        ->orderBy('created_at', 'desc')
        ->limit(12)        
        ->join('types','types.id','=','news.type_id')
        ->join('users','users.id','=','news.user_id')
        ->select('news.id','news.title','news.subtitle','news.body','news.file','news.created_at','types.name as type_id','users.name as autor')        
                
        ->get();
        //$mutable = Carbon::now();
        /*return $news; */     
        return view('news.index')->with('news', $news);
        //return view('newss.partials.table')->with('news',$news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        //Quitar espacios en blanco repetidos dentro de la cadena
        $title = preg_replace("/\s\s+/", " ", $request->input('title'));
        $subtitle = preg_replace("/\s\s+/", " ", $request->input('subtitle'));
        $body = preg_replace("/\s\s+/", " ", $request->input('body'));
        $urlf = $request->input('urlf');
        //Preguntar si tiene archivo adjunto
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            //return $name;
        }else{
            //$urlf = "https://www.youtube.com/watch?v=v2_MLFVdlQM";

                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $urlf, $match);

                $name = $match[1];

            //echo $youtube_id;
            /*function id_youtube($urlf) {
                $patron = '^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})?$';
                $array = preg_match($patron, $urlf, $match);
                if (false !== $array) {
                    $name = $match;
                    //return $match[1];

                }
                return false;
            }
            echo id_youtube($urlf); // Imprime: 9WZn9PkTDJY*/

            /*function getYouTubeIdFromURL($urlf) {
                $url_string = parse_url($urlf, PHP_URL_QUERY);
                parse_str($url_string, $args);
                return isset($args['v']) ? $args['v'] : false;
            }
            //$name = $args;

            $name = getYouTubeIdFromURL($urlf);*/
            //echo $name;
            /*$name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);*/
            //return $name;
        }
        //return $request;
        //Almacenar valores
        $news = new News;
        $news->type_id  = $request->input('type');
        $news->country_id = $request->input('country');
        $news->region_id = $request->input('state');
        $news->city_id = $request->input('city');
        $news->user_id = Auth::user()->id;       
        $news->title = $title;
        $news->subtitle = $subtitle;        
        $news->body  = $body;     
        $news->file = $name;
        $news->save();
        return redirect()->route('news.index');       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news, $id)
    {
        //Devolver una sola noticia
        //$user = DB::table('users')->find(3);
        $id = Crypt::decryptString($id);
        $news = News::find($id);
        $newsid = $news->id;
        $newsone = DB::table('news')
        ->join('types', 'types.id', '=', 'news.type_id')
        ->join('users', 'users.id', '=', 'news.user_id')
        ->select('news.id','news.title','news.subtitle','news.body','news.file','news.created_at','types.name as type_id','users.name as autor')
        ->where('news.id', '=', $newsid)
        ->get();

        //Devolver las ultimas 5 noticias
        $newsall = DB::table('news')
        ->orderBy('created_at', 'desc')
        ->limit(6)
        ->join('types', 'types.id', '=', 'news.type_id')
        ->join('users', 'users.id', '=', 'news.user_id')
        ->select('news.id','news.title','news.subtitle','news.body','news.file','news.created_at','types.name as type_id','users.name as autor')        
        ->get();

        //Retornar a la vista show dos variables
        return view('news.show')->with('newsone', $newsone)->with('newsall', $newsall);       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decryptString($id);
        $news = News::find($id);        
        return view('news.edit')->with('news', $news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*$id = Crypt::decryptString($id);*/
        $news = News::findOrFail($id);
        //Quitar espacios en blanco repetidos dentro de la cadena
        $title = preg_replace("/\s\s+/", " ", $request->input('title'));
        $subtitle = preg_replace("/\s\s+/", " ", $request->input('subtitle'));
        $body = preg_replace("/\s\s+/", " ", $request->input('body'));

        if ($request->hasFile('file')) {            
            //Estas 2 lineas encuentra/elimina la foto actual o antigua            
            $file_path = public_path().'/images/'.$news->file;
            \File::delete($file_path);
            $file = $request->file('file');                    
            $name = time().$file->getClientOriginalName();                      
            $file->move(public_path().'/images/', $name);            
            $news->title = $title;
            $news->subtitle = $subtitle;        
            $news->body  = $body;           
            $news->file = $name;
            $news->save();
            return redirect()->route('news.index');           
        }else{                    
            $news->title = $title;
            $news->subtitle = $subtitle;        
            $news->body  = $body;                   
            $news->save();
            return redirect()->route('news.index');
        }     
        return redirect()->route('news.index');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return $id;
        News::destroy($id);
        //Session::flash('message','La noticia fue eliminada');
        return redirect()->route('news.index');
    }
    public function upload_video(Request $request)
    {
        $data=$request->all();
        $rules=[
            'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required'];
            $validator = Validator($data,$rules);
            if ($validator->fails()){
                return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
            }else{
                $video=$data['video'];
                $input = time().$video->getClientOriginalExtension();
                $destinationPath = 'uploads/videos';
                $video->move($destinationPath, $input);
                $user['video'] = $input;
                $user['created_at']  = date('Y-m-d h:i:s');
                $user['updated_at']  = date('Y-m-d h:i:s');
                $user['user_id']     =session('user_id');
                DB::table('user_videos')->insert($user);
                return redirect()->back()->with('upload_success','upload_success');
            }
    }    
}
