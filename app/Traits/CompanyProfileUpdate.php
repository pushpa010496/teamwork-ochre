<?php

namespace App\Traits;


trait CompanyProfileUpdate
{
    public function updatePlantCompanyProfile($company_id,$profile_type)
    {

        $data = array(
            'company_id' => $company_id,
            'profile_type'=> $profile_type
            );
            $payload = json_encode($data);
            $ch = curl_init('https://www.plantautomation-technology.com/api/compaines-profile-update');
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
          return $result;
          

    }

    public function updatePackageCompanyProfile($company_id,$profile_type)
    {

        $data = array(
            'company_id' => $company_id,
            'profile_type'=> $profile_type
            );
            $payload = json_encode($data);
            $ch = curl_init('https://www.packaging-labelling.com/api/compaines-profile-update');
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
          return $result;
          

    }
    public function updateDefenceCompanyProfile($company_id,$profile_type)
    {

        $data = array(
            'company_id' => $company_id,
            'profile_type'=> $profile_type
            );
            $payload = json_encode($data);
            $ch = curl_init('https://www.defence-industries.com/api/compaines-profile-update');
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
          return $result;
          

    }
    public function updatePulpCompanyProfile($company_id,$profile_type)
    {

        $data = array(
            'company_id' => $company_id,
            'profile_type'=> $profile_type
            );
            $payload = json_encode($data);
            $ch = curl_init('https://www.pulpandpaper-technology.com/api/compaines-profile-update');
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
          return $result;
          

    }
    public function updateSteelCompanyProfile($company_id,$profile_type)
    {

        $data = array(
            'company_id' => $company_id,
            'profile_type'=> $profile_type
            );
            $payload = json_encode($data);
            $ch = curl_init('https://www.steel-technology.com/api/compaines-profile-update');
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
          return $result;
          

    }
    public function updateHospitalCompanyProfile($company_id,$profile_type)
    {

        $data = array(
            'company_id' => $company_id,
            'profile_type'=> $profile_type
            );
            $payload = json_encode($data);
            $ch = curl_init('https://www.hospitals-management.com/api/compaines-profile-update');
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
          return $result;
          

    }
    public function updateSportsCompanyProfile($company_id,$profile_type)
    {

        $data = array(
            'company_id' => $company_id,
            'profile_type'=> $profile_type
            );
            $payload = json_encode($data);
            $ch = curl_init('https://www.sportsvenue-technology.com/api/compaines-profile-update');
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
          return $result;
          

    }
   function updateAutomotiveCompanyProfile($company_id,$profile_type)
    {

        $data = array(
            'company_id' => $company_id,
            'profile_type'=> $profile_type
            );
            $payload = json_encode($data);
            $ch = curl_init('https://www.automotive-technology.com/api/compaines-profile-update');
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
          return $result;
          

    }
    function updatePharmatechCompanyProfile($company_id,$profile_type)
    {

        $data = array(
            'company_id' => $company_id,
            'profile_type'=> $profile_type
            );
            $payload = json_encode($data);
            $ch = curl_init('https://www.pharmaceutical-tech.com/api/compaines-profile-update');
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
          return $result;
          

    }
    function updatePlasticCompanyProfile($company_id,$profile_type)
    {

        $data = array(
            'company_id' => $company_id,
            'profile_type'=> $profile_type
            );
            $payload = json_encode($data);
            $ch = curl_init('https://www.plastics-technology.com/api/compaines-profile-update');
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
          return $result;
          

    }
}

?>