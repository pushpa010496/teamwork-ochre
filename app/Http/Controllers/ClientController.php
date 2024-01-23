<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Client;
use \Session;
use Ntrust;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $model;
    public function __construct(Client $model)
    {
                $this->middleware('auth');

                $this->model = $model;
    }
    public function index()
    {
          $clients=Client::get();

         return view('clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         request()->validate([
            'client_name' => 'required',
            'email' => 'email|required',
            'country' => 'required',
            'phone' => 'required',
            'website' => 'required',            
            'active_flag' => 'required'
        ]);

         $client = new Client();
        
         $client->client_name = ucfirst($request->client_name);
         $client->email = $request->email;
         $client->country = ucfirst($request->country);
        @$client->fax = $request->fax;
         $client->contact_name = ucfirst($request->contact_name);
         $client->phone = $request->phone;
         $client->website = $request->website;
        @$client->address = $request->address;
         $client->active_flag = $request->active_flag;
         $client->created_by = $request->user()->id;  
        
         $client->save();
        
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {        
        return response(view('clients.modal_edit', compact('client'))->render());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Client $client)
    {
         request()->validate([
            'client_name' => 'required',
            'email' => 'email|required',
            'country' => 'required',
            'phone' => 'required',
            'website' => 'required',            
            'active_flag' => 'required'
        ]);

         $client->client_name = ucfirst($request->client_name);
         $client->email = $request->email;
         $client->country = ucfirst($request->country);
         @$client->fax = $request->fax;
         $client->contact_name = ucfirst($request->contact_name);
         $client->phone = $request->phone;
         $client->website = $request->website;
         @$client->address = $request->address;
         $client->active_flag = $request->active_flag;
         $client->updated_by = $request->user()->id;  
        
         $client->save();

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {

        $status=$client->active_flag;

        if($status=='1'){

        $client->active_flag = 0;
        $message="De-Activated";

        }
        else{

         $client->active_flag = 1;
         $message="Activated";

        }
         $client->save();

        Session::flash('message_type', 'negative');
        Session::flash('message_icon', 'hide');
        Session::flash('message_header', 'Success');
        Session::flash('message', 'The Category ' . $client->dept_name . ' was'.$message);

        return redirect()->route('clients.index');
    }
   
}
