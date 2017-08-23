<?php

namespace App\Http\Controllers;

use App\datatable;
use Illuminate\Http\Request;
use DB;

class DatatableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
         $results = DB::select('select * from datatables');
         return view('datatables.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function save(){
        $data= new datatable;
        $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.github.com/search/repositories?q=stars%3A%3E%3D500%20fork%3Atrue%20language%3Aphp&sort=stars&order=desc",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 8627c311-ab97-2362-baaf-43cd1d6505ad",
    "user-agent: Awesome-Octocat-App"
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    $test_data = json_decode( $response, true);
   // echo '<pre>'; print_r($test_data); echo '</pre>';
    foreach ($test_data['items'] as $key => $value1) {
        $url=strval( $value1['url']);
        DB::insert('insert into datatables (repository_id, name,url,created_date,pushed_date,description,stars) values (?, ?,?,?,?,?,?)', array($value1['id'],$value1['name'],$value1['url'],$value1['created_at'],$value1['pushed_at'],$value1['description'],$value1['stargazers_count']));
    }
    return view('datatables.index');
    
    }

    public function singleshow($id){
        $user = DB::table('datatables')->where('repository_id', $id)->first();
         return view('datatables.details',compact('user'));

    }

    public function edit($id){
        $users = DB::table('datatables')->where('repository_id', $id)->first();
         return view('datatables.edit',compact('users'));
    }

    public function saveedit(Request $request){
        DB::table('datatables')->where('repository_id', $request->repository_id)->update(array('repository_id' => $request->repository_id,'name'=>$request->name,'url'=>$request->url,'created_date'=>$request->created_date,'pushed_date'=>$request->pushed_date,'description'=>$request->description,'stars'=>$request->stars));
        $results = DB::select('select * from datatables');
         return view('datatables.index',compact('results'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\datatable  $datatable
     * @return \Illuminate\Http\Response
     */
    public function show(datatable $datatable)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\datatable  $datatable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, datatable $datatable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\datatable  $datatable
     * @return \Illuminate\Http\Response
     */
    public function destroy(datatable $datatable)
    {
        //
    }
}
