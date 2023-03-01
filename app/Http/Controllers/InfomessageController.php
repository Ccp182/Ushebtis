<?php

namespace App\Http\Controllers;

use App\Models\TypeMessage;
use App\Models\App;
use App\Models\Country;
use App\Models\Infomessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class InfomessageController
 * @package App\Http\Controllers
 */
class InfomessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infomessages = Infomessage::paginate();
        
        return view('infomessage.index', compact('infomessages'))
            ->with('i', (request()->input('page', 1) - 1) * $infomessages->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $infomessage = new Infomessage();
        $types = TypeMessage::pluck('name','id');
        $apps = App::pluck('name','id');
        $countries = Country::pluck('name','id');
        return view('infomessage.create', compact('infomessage','types','apps','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Infomessage::$rules);

        $infomessage = Infomessage::create($request->all());
        /*$infomessage = Infomessage::create(
            [
                'title' => $request->title,
                'body' => $request->body,
                'start_time' => date('Y-m-d H:i:s' , strtotime($request->start_time)),
                'end_time' => date('Y-m-d H:i:s' , strtotime($request->end_time)),
                'app_id' => $request->app_id
            ]
        );*/
        return redirect()->route('infomessages.index')
            ->with('success', 'Infomessage created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infomessage = Infomessage::find($id);
        
        return view('infomessage.show', compact('infomessage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infomessage = Infomessage::find($id);
        $types = TypeMessage::pluck('name','id');
        $apps = App::pluck('name','id');
        $countries = Country::pluck('name','id');
        return view('infomessage.edit', compact('infomessage','types','apps','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Infomessage $infomessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infomessage $infomessage)
    {
        request()->validate(Infomessage::$rules);

        $infomessage->update($request->all());

        return redirect()->route('infomessages.index')
            ->with('success', 'Infomessage updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $infomessage = Infomessage::find($id)->delete();

        return redirect()->route('infomessages.index')
            ->with('success', 'Infomessage deleted successfully');
    }

    public function getInfo(){
       /* $messages=Infomessage::select(["id", "title", "body", "type", "start_time", "end_time"])
        ->where([
            ['start_time','<=',date("Y-m-d H:i:s")],
            ['end_time','>',date("Y-m-d H:i:s")]
            
        ])->orderBy('created_at', 'asc')->get()->first();
*/
        $messages=Infomessage::join("type", "type.id", "=", "infomessages.type_id")
        ->where([
            ['infomessages.start_time','<=',date("Y-m-d H:i:s")],
            ['infomessages.end_time','>',date("Y-m-d H:i:s")]
            
        ])->orderBy('infomessages.created_at', 'asc')
        ->get(["infomessages.id", "infomessages.title", "infomessages.body", "type.name", "infomessages.start_time", "infomessages.end_time"])->first();
        return $this->retrieveArray($messages);
    }

    public function getInfoCountry(string $country){
    /*    $messages=Infomessage::select(["id", "title", "body", "type", "start_time", "end_time"])
    ->with('country')
    ->whereRelation('country','prefix',$country)
    ->where([
        ['start_time','<=',date("Y-m-d H:i:s")],
        ['end_time','>',date("Y-m-d H:i:s")]
    ])
    ->orwhere([
        ['start_time','<=',date("Y-m-d H:i:s")],
        ['end_time','>',date("Y-m-d H:i:s")],
        ['country_id',0]
    ])
    ->orderBy('created_at', 'asc')->get()->first();*/
        $messages=Infomessage::join("type", "type.id", "=", "infomessages.type_id")
        ->with('country')
        ->whereRelation('country','prefix',$country)
        ->where([
            ['start_time','<=',date("Y-m-d H:i:s")],
            ['end_time','>',date("Y-m-d H:i:s")]
        ])
        ->orwhere([
            ['start_time','<=',date("Y-m-d H:i:s")],
            ['end_time','>',date("Y-m-d H:i:s")],
            ['country_id',0]
        ])->orderBy('infomessages.created_at', 'asc')
        ->get(["infomessages.id", "infomessages.title", "infomessages.body", "type.name", "infomessages.start_time", "infomessages.end_time"])->first();

        unset($messages['country']);
        return $this->retrieveArray($messages);
    }

    public function getInfoApp(string $country,int $app){
        /*$messages=Infomessage::select(["id", "title", "body", "start_time", "end_time"])
        ->with('country','app')
        ->whereRelation('country','prefix',$country)
        ->whereRelation('app','id_core',$app)
        ->where([
            ['start_time','<=',date("Y-m-d H:i:s")],
            ['end_time','>',date("Y-m-d H:i:s")]
        ])
        ->orwhere([
            ['start_time','<=',date("Y-m-d H:i:s")],
            ['end_time','>',date("Y-m-d H:i:s")],
            ['country_id',0]
        ])->with('app')->whereRelation('app','id_core',$app)
        ->orderBy('created_at', 'asc')->get()->first();
        unset($messages['country']);
        unset($messages['app']);*/
        $messages=DB::select("SELECT im.id, im.title, im.body, t.name AS 'type', im.start_time, im.end_time
        FROM infomessages im
        INNER JOIN ushebtis.type t ON t.id=im.type_id
        INNER JOIN country c ON c.id=im.country_id
        INNER JOIN app a ON a.id=im.app_id
        WHERE im.start_time<=? AND im.end_time>?
        AND (c.prefix=? OR im.country_id=0)
        AND (a.id_core=? OR im.app_id=0)", [date("Y-m-d H:i:s"),date("Y-m-d H:i:s"),$country,$app]);
        $response=array();
        $response['Error']=false;
        if(!is_null($messages)){
            if(count($messages)>0){
                $response['InfoMessage']=$messages[0];
            }else{
                $response['Message']='No existe datos';
                $response['InfoMessage']=null;
            }
        }else{
            $response['Message']='No existe datos';
            $response['InfoMessage']=null;
        }
        return $response;
    }

    public function retrieveArray($messages){
        $response=array();
        $response['Error']=false;
        if(!is_null($messages)){
            $response['InfoMessage']=$messages;
            
        }else{
            $response['Message']='No existe datos';
            $response['InfoMessage']=null;
        }
        return $response;
    }
}
