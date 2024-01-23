<?php

namespace App\Http\Controllers\Jobs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class CompanyController extends Controller
{



    public function insertPlantCompaines()
    {
        try{
            $data = json_decode(file_get_contents("https://www.plantautomation-technology.com/api/compaines-list"),true);
            if($data['code'] ==200){
                $compaines = collect($data['compaines']);
                $response = $compaines->map(function($query){
                      $company =   Company::create([
                             'comp_name'=>$query['comp_name'],
                             'contact_person'=>$query['contact_name'],
                             'company_type'=>$query['profile_type'],
                             'email'=>$query['email'],
                             'phone'=>$query['phone'],
                             'start_date'=>$query['start_date'],
                             'end_date'=>$query['end_date'],
                             'website'=>$query['website'],
                             'country'=>$query['country'],
                             'website'=>$query['website'],
                             'technology_id'=>1,
                             'plant_company_id'=>$query['company_id'],
                             'active_flag'=>$query['active_flag'],
                        ]);
                });
                    $post = $compaines->pluck('company_id');
                    $data = array(
                        'company_id' => $post,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.plantautomation-technology.com/api/compaines-update');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                    $result = curl_exec($ch);
            }
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function updatePlantCompanyEnquires()
    {
        try{
                $companyId = Company::whereNotNull('plant_company_id')->pluck('plant_company_id');
                   $data = array(
                    'company_id' => $companyId,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.plantautomation-technology.com/api/compaines-enquires');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                  $result = curl_exec($ch);
                  $data = json_decode($result,true);
                  if($data['code'] ==200){
                       $enquires = collect($data['enquires']);
                       $eq = $enquires->map(function($query){
                           $company = Company::where('plant_company_id',$query['company_id'])->first();
                           $company->update(['company_enquires'=>$query['count'] ?? 0 ]);
                       });
                       return $eq;
                  }
                  
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
   


    public function insertPackageCompaines()
    {
        try{
            $data = json_decode(file_get_contents("https://www.packaging-labelling.com/api/compaines-list"),true);
            if($data['code'] ==200){
                $compaines = collect($data['compaines']);
                $response = $compaines->map(function($query){
                      $company =   Company::create([
                             'comp_name'=>$query['comp_name'],
                             'contact_person'=>$query['contact_name'],
                             'company_type'=>$query['profile_type'],
                             'email'=>$query['email'],
                             'phone'=>$query['phone'],
                             'start_date'=>$query['start_date'],
                             'end_date'=>$query['end_date'],
                             'website'=>$query['website'],
                             'country'=>$query['country'],
                             'website'=>$query['website'],
                             'technology_id'=>2,
                             'package_company_id'=>$query['company_id'],
                             'active_flag'=>$query['active_flag'],
                        ]);
                });
                    $post = $compaines->pluck('company_id');
                    $data = array(
                        'company_id' => $post,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.packaging-labelling.com/api/compaines-update');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                    $result = curl_exec($ch);
            }
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    
    public function updatePackageCompanyEnquires()
    {
        try{
                $companyId = Company::whereNotNull('package_company_id')->pluck('package_company_id');
                   $data = array(
                    'company_id' => $companyId,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.packaging-labelling.com/api/compaines-enquires');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                  $result = curl_exec($ch);
                  $data = json_decode($result,true);
                  if($data['code'] ==200){
                       $enquires = collect($data['enquires']);
                       $eq = $enquires->map(function($query){
                           $company = Company::where('package_company_id',$query['company_id'])->first();
                           $company->update(['company_enquires'=>$query['count'] ?? 0 ]);
                       });
                       return $eq;
                  }
                  
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function insertPulpCompaines()
    {
        try{
            $data = json_decode(file_get_contents("https://www.pulpandpaper-technology.com/api/compaines-list"),true);
            if($data['code'] ==200){
                $compaines = collect($data['compaines']);
                $response = $compaines->map(function($query){
                      $company =   Company::create([
                             'comp_name'=>$query['comp_name'],
                             'contact_person'=>$query['contact_name'],
                             'company_type'=>$query['profile_type'],
                             'email'=>$query['email'],
                             'phone'=>$query['phone'],
                             'start_date'=>$query['start_date'],
                             'end_date'=>$query['end_date'],
                             'website'=>$query['website'],
                             'country'=>$query['country'],
                             'technology_id'=>4,
                             'pulp_company_id'=>$query['company_id'],
                             'active_flag'=>$query['active_flag'],
                        ]);
                });
                    $post = $compaines->pluck('company_id');
                    $data = array(
                        'company_id' => $post,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.pulpandpaper-technology.com/api/compaines-update');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                    $result = curl_exec($ch);
            }
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function updatePulpCompanyEnquires()
    {
        try{
                $companyId = Company::whereNotNull('pulp_company_id')->pluck('pulp_company_id');
                   $data = array(
                    'company_id' => $companyId,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.pulpandpaper-technology.com/api/compaines-enquires');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                  $result = curl_exec($ch);
                  $data = json_decode($result,true);
                  if($data['code'] ==200){
                       $enquires = collect($data['enquires']);
                       $eq = $enquires->map(function($query){
                           $company = Company::where('pulp_company_id',$query['company_id'])->first();
                           $company->update(['company_enquires'=>$query['count'] ?? 0 ]);
                       });
                       return $eq;
                  }
                  
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function insertSteelCompaines()
    {
        try{
            $data = json_decode(file_get_contents("https://www.steel-technology.com/api/compaines-list"),true);
            if($data['code'] ==200){
                $compaines = collect($data['compaines']);
                $response = $compaines->map(function($query){
                      $company =   Company::create([
                             'comp_name'=>$query['comp_name'],
                             'contact_person'=>$query['contact_name'],
                             'company_type'=>$query['profile_type'],
                             'email'=>$query['email'],
                             'phone'=>$query['phone'],
                             'start_date'=>$query['start_date'],
                             'end_date'=>$query['end_date'],
                             'website'=>$query['website'],
                             'country'=>$query['country'],
                             'technology_id'=>5,
                             'steel_company_id'=>$query['company_id'],
                             'active_flag'=>$query['active_flag'],
                        ]);
                });
                    $post = $compaines->pluck('company_id');
                    $data = array(
                        'company_id' => $post,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.steel-technology.com/api/compaines-update');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                    $result = curl_exec($ch);
            }
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function updateSteelCompanyEnquires()
    {
        try{
                $companyId = Company::whereNotNull('steel_company_id')->pluck('steel_company_id');
                   $data = array(
                    'company_id' => $companyId,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.steel-technology.com/api/compaines-enquires');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                  $result = curl_exec($ch);
                  $data = json_decode($result,true);
                  if($data['code'] ==200){
                       $enquires = collect($data['enquires']);
                       $eq = $enquires->map(function($query){
                           $company = Company::where('steel_company_id',$query['company_id'])->first();
                           $company->update(['company_enquires'=>$query['count'] ?? 0 ]);
                       });
                       return $eq;
                  }
                  
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function insertDefenceCompaines()
    {
        try{
            $data = json_decode(file_get_contents("https://www.defence-industries.com/api/compaines-list"),true);
            if($data['code'] ==200){
                $compaines = collect($data['compaines']);
                $response = $compaines->map(function($query){
                      $company =   Company::create([
                             'comp_name'=>$query['comp_name'],
                             'contact_person'=>$query['contact_name'],
                             'company_type'=>$query['profile_type'],
                             'email'=>$query['email'],
                             'phone'=>$query['phone'],
                             'start_date'=>$query['start_date'],
                             'end_date'=>$query['end_date'],
                             'website'=>$query['website'],
                             'country'=>$query['country'],
                             'technology_id'=>3,
                             'defence_company_id'=>$query['company_id'],
                             'active_flag'=>$query['active_flag'],
                        ]);
                });
                    $post = $compaines->pluck('company_id');
                    $data = array(
                        'company_id' => $post,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.defence-industries.com/api/compaines-update');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                    $result = curl_exec($ch);
            }
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function updateDefenceCompanyEnquires()
    {
        try{
                $companyId = Company::whereNotNull('defence_company_id')->pluck('defence_company_id');
                   $data = array(
                    'company_id' => $companyId,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.defence-industries.com/api/compaines-enquires');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                  $result = curl_exec($ch);
                  $data = json_decode($result,true);
                  if($data['code'] ==200){
                       $enquires = collect($data['enquires']);
                       $eq = $enquires->map(function($query){
                           $company = Company::where('defence_company_id',$query['company_id'])->first();
                           $company->update(['company_enquires'=>$query['count'] ?? 0 ]);
                       });
                       return $eq;
                  }
                  
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function insertPharmatechCompaines()
    {
        try{
            $data = json_decode(file_get_contents("https://www.pharmaceutical-tech.com/api/compaines-list"),true);
            if($data['code'] ==200){
                $compaines = collect($data['compaines']);
                $response = $compaines->map(function($query){
                      $company =   Company::create([
                             'comp_name'=>$query['comp_name'],
                             'contact_person'=>$query['contact_name'],
                             'company_type'=>$query['profile_type'],
                             'email'=>$query['email'],
                             'phone'=>$query['phone'],
                             'start_date'=>$query['start_date'],
                             'end_date'=>$query['end_date'],
                             'website'=>$query['website'],
                             'country'=>$query['country'],
                             'website'=>$query['website'],
                             'technology_id'=>9,
                             'pharmaceutical_company_id'=>$query['company_id'],
                             'active_flag'=>$query['active_flag'],
                        ]);
                });
                    $post = $compaines->pluck('company_id');
                    $data = array(
                        'company_id' => $post,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.pharmaceutical-tech.com/api/compaines-update');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                    $result = curl_exec($ch);
            }
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function updatePharmatechCompanyEnquires()
    {
        try{
                $companyId = Company::whereNotNull('pharmaceutical_company_id')->pluck('pharmaceutical_company_id');
                   $data = array(
                    'company_id' => $companyId,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.pharmaceutical-tech.com/api/compaines-enquires');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                  $result = curl_exec($ch);
                  $data = json_decode($result,true);
                  if($data['code'] ==200){
                       $enquires = collect($data['enquires']);
                       $eq = $enquires->map(function($query){
                           $company = Company::where('pharmaceutical_company_id',$query['company_id'])->first();
                           $company->update(['company_enquires'=>$query['count'] ?? 0 ]);
                       });
                       return $eq;
                  }
                  
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function insertAutomotiveCompaines()
    {
        try{
            $data = json_decode(file_get_contents("https://www.automotive-technology.com/api/compaines-list"),true);
            if($data['code'] ==200){
                $compaines = collect($data['compaines']);
                $response = $compaines->map(function($query){
                      $company =   Company::create([
                             'comp_name'=>$query['comp_name'],
                             'contact_person'=>$query['contact_name'],
                             'company_type'=>$query['profile_type'],
                             'email'=>$query['email'],
                             'phone'=>$query['phone'],
                             'start_date'=>$query['start_date'],
                             'end_date'=>$query['end_date'],
                             'website'=>$query['website'],
                             'country'=>$query['country'],
                             'website'=>$query['website'],
                             'technology_id'=>8,
                             'automotive_company_id'=>$query['company_id'],
                             'active_flag'=>$query['active_flag'],
                        ]);
                });
                    $post = $compaines->pluck('company_id');
                    $data = array(
                        'company_id' => $post,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.automotive-technology.com/api/compaines-update');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                    $result = curl_exec($ch);
            }
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function updateAutomotiveCompanyEnquires()
    {
        try{
                $companyId = Company::whereNotNull('automotive_company_id')->pluck('automotive_company_id');
                   $data = array(
                    'company_id' => $companyId,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.automotive-technology.com/api/compaines-enquires');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                  $result = curl_exec($ch);
                  $data = json_decode($result,true);
                  if($data['code'] ==200){
                       $enquires = collect($data['enquires']);
                       $eq = $enquires->map(function($query){
                           $company = Company::where('automotive_company_id',$query['company_id'])->first();
                           $company->update(['company_enquires'=>$query['count'] ?? 0 ]);
                       });
                       return $eq;
                  }
                  
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function insertHospialsCompaines()
    {
        try{
            $data = json_decode(file_get_contents("https://www.hospitals-management.com/api/compaines-list"),true);
            if($data['code'] ==200){
                $compaines = collect($data['compaines']);
                $response = $compaines->map(function($query){
                      $company =   Company::create([
                             'comp_name'=>$query['comp_name'],
                             'contact_person'=>$query['contact_name'],
                             'company_type'=>$query['profile_type'],
                             'email'=>$query['email'],
                             'phone'=>$query['phone'],
                             'start_date'=>$query['start_date'],
                             'end_date'=>$query['end_date'],
                             'website'=>$query['website'],
                             'country'=>$query['country'],
                             'website'=>$query['website'],
                             'technology_id'=>6,
                             'hospital_company_id'=>$query['company_id'],
                             'active_flag'=>$query['active_flag'],
                        ]);
                });
                    $post = $compaines->pluck('company_id');
                    $data = array(
                        'company_id' => $post,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.hospitals-management.com/api/compaines-update');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                    $result = curl_exec($ch);
            }
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function updateHospitalsCompanyEnquires()
    {
        try{
                $companyId = Company::whereNotNull('hospital_company_id')->pluck('hospital_company_id');
                   $data = array(
                    'company_id' => $companyId,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.hospitals-management.com/api/compaines-enquires');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                  $result = curl_exec($ch);
                  $data = json_decode($result,true);
                  if($data['code'] ==200){
                       $enquires = collect($data['enquires']);
                       $eq = $enquires->map(function($query){
                           $company = Company::where('hospital_company_id',$query['company_id'])->first();
                           $company->update(['company_enquires'=>$query['count'] ?? 0 ]);
                       });
                       return $eq;
                  }
                  
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function insertSportsCompaines()
    {
        try{
            $data = json_decode(file_get_contents("https://www.sportsvenue-technology.com/api/compaines-list"),true);
            if($data['code'] ==200){
                $compaines = collect($data['compaines']);
                $response = $compaines->map(function($query){
                      $company =   Company::create([
                             'comp_name'=>$query['comp_name'],
                             'contact_person'=>$query['contact_name'],
                             'company_type'=>$query['profile_type'],
                             'email'=>$query['email'],
                             'phone'=>$query['phone'],
                             'start_date'=>$query['start_date'],
                             'end_date'=>$query['end_date'],
                             'website'=>$query['website'],
                             'country'=>$query['country'],
                             'website'=>$query['website'],
                             'technology_id'=>7,
                             'sports_company_id'=>$query['company_id'],
                             'active_flag'=>$query['active_flag'],
                        ]);
                });
                    $post = $compaines->pluck('company_id');
                    $data = array(
                        'company_id' => $post,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.sportsvenue-technology.com/api/compaines-update');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                    $result = curl_exec($ch);
            }
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function updateSportsCompanyEnquires()
    {
        try{
                $companyId = Company::whereNotNull('sports_company_id')->pluck('sports_company_id');
                   $data = array(
                    'company_id' => $companyId,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.sportsvenue-technology.com/api/compaines-enquires');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                  $result = curl_exec($ch);
                  $data = json_decode($result,true);
                  if($data['code'] ==200){
                       $enquires = collect($data['enquires']);
                       $eq = $enquires->map(function($query){
                           $company = Company::where('sports_company_id',$query['company_id'])->first();
                           $company->update(['company_enquires'=>$query['count'] ?? 0 ]);
                       });
                       return $eq;
                  }
                  
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function insertPlasticsCompaines()
    {
        try{
            $data = json_decode(file_get_contents("https://www.plastics-technology.com/api/compaines-list"),true);
            if($data['code'] ==200){
                $compaines = collect($data['compaines']);
                $response = $compaines->map(function($query){
                      $company =   Company::create([
                             'comp_name'=>$query['comp_name'],
                             'contact_person'=>$query['contact_name'],
                             'company_type'=>$query['profile_type'],
                             'email'=>$query['email'],
                             'phone'=>$query['phone'],
                             'start_date'=>$query['start_date'],
                             'end_date'=>$query['end_date'],
                             'website'=>$query['website'],
                             'country'=>$query['country'],
                             'website'=>$query['website'],
                             'technology_id'=>10,
                             'plastics_company_id'=>$query['company_id'],
                             'active_flag'=>$query['active_flag'],
                        ]);
                });
                    $post = $compaines->pluck('company_id');
                    $data = array(
                        'company_id' => $post,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.plastics-technology.com/api/compaines-update');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                    $result = curl_exec($ch);
            }
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    
    public function updatePlasticsCompanyEnquires()
    {
        try{
                $companyId = Company::whereNotNull('plastics_company_id')->pluck('plastics_company_id');
                dd($companyId);
                   $data = array(
                    'company_id' => $companyId,
                    );
                    $payload = json_encode($data);
                    $ch = curl_init('https://www.plastics-technology.com/api/compaines-enquires');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    // Set HTTP Header for POST request 
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($payload))
                    );
                    // Submit the POST request
                  $result = curl_exec($ch);
                  $data = json_decode($result,true);
                  dd($data);
                  if($data['code'] ==200){
                       $enquires = collect($data['enquires']);
                       $eq = $enquires->map(function($query){
                           $company = Company::where('plastics_company_id',$query['company_id'])->first();
                           $company->update(['company_enquires'=>$query['count'] ?? 0 ]);
                       });
                       return $eq;
                  }
                  
        } catch (RequestException $e) {
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }

}
