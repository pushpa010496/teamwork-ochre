<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \Excel;
use Auth;
use App\Company;
use App\Technology;

class ImportExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
         $tech = explode(',',Auth::user()->technology);
         $companyType = explode(',',Auth::user()->company_type);
         $data =Company::whereIn('technology_id',$tech)->whereIn('company_type',$companyType)->orderBy('id','desc')->get();
       return view('company.import_excel', compact('data'));
    }
    public function exportCompaimes(Request $request)
    {
        $tech = explode(',',Auth::user()->technology);
        $companyType = explode(',',Auth::user()->company_type);
        $companyT = explode(',', Auth::user()->company_type);
        $technologies = Technology::whereIn('id',$tech)->get();
        $companytypes = DB::table('company_types')->whereIn('type',$companyT)->get();
        $compaines =Company::whereIn('technology_id',$tech)->whereIn('company_type',$companyType)->orderBy('id','desc')->get();
        if(\Request::isMethod('post')){
            // dd($request->company_type);
            $technology = $request->technology_id;
            $companytype = $request->company_type;
            //  $technology = $request->technology;
            // $companytype = $request->companytype;
            //   $technology =json_encode($request->technology);
            //  $companytype = json_encode($request->companytype);
            $result = Company::when(!empty($technology), function($query) use($technology){
                                    return $query->whereIn('technology_id',$technology);
                                })
                                ->when(!empty($companytype),function($query) use($companytype){
                                    return $query->whereIn('company_type',$companytype);
                                })
                                ->get();
                                
                    $rd=[];
                    $rd[] = [
                    		'comp_name',
                    		'contact_person',
                    		'email',
                    		'phone',
                    		'country',
                    		'website',
                            'address',
                    		'company_type',
                            'technology',
                            'start_date',
                            'end_date',
                            'enquires'
                    	];
                        
                    	foreach($result as $key=>$value){

                            if($value->technology_id=='1'){
                                   $technology = 'Plant Automation Technology';
                            }elseif ($value->technology_id=='2') {
                                 $technology = 'Packaging and Labelling';
                            }elseif ($value->technology_id=='3') {
                                 $technology = 'Defence Industries';
                            }elseif ($value->technology_id=='4') {
                                 $technology = 'Pulp and Paper Technology';
                            }elseif ($value->technology_id=='5') {
                                 $technology = 'Steel Technology';
                            }elseif ($value->technology_id=='6') {
                                 $technology = 'Hospitals Management';
                            }elseif ($value->technology_id=='7') {
                                $technology = 'Sports Venue Technology';
                            }elseif ($value->technology_id=='8') {
                                 $technology = 'Automotive Technology';
                            }elseif ($value->technology_id=='9') {
                                 $technology = 'Pharmaceutical Tech';
                            }elseif ($value->technology_id=='10') {
                                 $technology = 'Plastics Technology';
                            }elseif ($value->technology_id=='11') {
                                 $technology = 'Broadcast Technology';
                            }elseif ($value->technology_id=='12') {
                                 $technology = 'Asianhhm';
                            }else{
                                 $technology = 'Pfa';
                            }
                        $rd[] = [ 
                                $value->comp_name,
                                $value->contact_person,
                                $value->email,
                                $value->phone,
                                $value->country,
                                $value->website,
                                $value->address,
                                $value->company_type,
                                $technology,
                                $value->profile ? $value->profile->start_date : '' ,
                                $value->profile ? $value->profile->end_date : '',
                                $value->profile ? $value->company_enquires : '' ,
                            ];
                        }
                          // Generate and return the spreadsheet
                Excel::create('Compaine-list', function($excel) use ($rd) {
                    // Set the spreadsheet title, creator, and description
                    $excel->setCreator('IT Department')->setCompany('Ochre Media Pvt Ltd');
                    $excel->setDescription('Compaines data Report');
            
                    // Build the spreadsheet, passing in the payments array
                    $excel->sheet('TeamWork', function($sheet) use ($rd) {
            
                        $sheet->fromArray($rd, null, 'A1', false, false);
                        $sheet->freezeFirstRow();
                       // $sheet->setAutoFilter('A1:AH1');
                       
                        $sheet->row(1, function($row) {
            			// call cell manipulation methods
            			$row->setBackground('#FFFF00');
            			});
            			$sheet->cell('A1:AH1', function($cell) {
            			    // manipulate the cell
            			    $cell->setFontColor('#FF0000');
            			});
                    });
            
                })->download('xlsx');
        }
        return view('company.export_excel',compact('compaines','technologies','companytypes'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function import(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('select_file')->getRealPath();

     $data = \Excel::load($path)->get();

   

     if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {

        $insert_data[] = array(
        'comp_name'=> $value['name'],    
        'email'=> $value['Email'],  
        'phone'=>$value['Phone'],  
        'start_date'=> date("Y-m-d H:i:s",strtotime($value['Start_Date'])),
        'end_date'=> date("Y-m-d H:i:s",strtotime($value['End_Date'])),   
        'country'=> $value['Country'],    
        'website'=> $value['Website'],  
        'services'=> $value['Services'], 
        'technology'=> $value['Technology'],    
        'address'=> $value['address'],    
        'company_type'=> $value['company_type'],
        'active_flag'=>$value['Active'],
        'author_id'=> $request->user()->id,

         
        );


      /* foreach($value as $row)
       {

       print_r($row);


        
       }*/
      }

      if(!empty($insert_data))
      {
       DB::table('companies')->insert($insert_data);
      }
     }
     return back()->with('success', 'Excel Data Imported successfully.');
    }
}
