<?php
use App\Event;
use Illuminate\Http\JsonResponse;
use App\Company;

function addEventTrigger($company,$sevice,$type,$start,$end)
{
   return Event::create([
            'company_id'=>$company,
            'service_id'=>$sevice,
            'type'=>$type,
            'start_date'=>$start,
            'end_date'=>$end,
        ]);
}
function updateEventTrigger($sevice,$type,$start,$end)
{
  //return $type;
   $event = Event::where('type',$type)->where('service_id',$sevice)->first();
   return $event->update([
        'start_date'=>$start,
         'end_date'=>$end,
   ]);
}
function fiscalYear()
{
  if(date('m') >= 06) {
            $d = date('Y-m-d', strtotime('+1 years'));
           return date('Y') .'-'.date('Y', strtotime($d));
         } else {
           $d = date('Y-m-d', strtotime('-1 years'));
           return date('Y', strtotime($d)).'-'.date('Y');
         }
}


function getSelectMonths($month)
{
  $months=
    [
      'jan'=>'January',
      'feb'=>'February',
      'march'=>'March',
      'apr'=>'April',
      'may'=>'May',
      'june'=>'June',
      'july'=>'july',
      'aug'=>'August',
      'sep'=>'September',
      'oct'=>'October',
      'nov'=>'November',
      'dec'=>'December'
    ];
    return $month;
}
function getMonths()
{
  return $months=[
      'jan'=>'January',
      'feb'=>'February',
      'march'=>'March',
      'apr'=>'April',
      'may'=>'May',
      'june'=>'June',
      'july'=>'july',
      'aug'=>'August',
      'sep'=>'September',
      'oct'=>'October',
      'nov'=>'November',
      'dec'=>'December'
    ];
}
if (!function_exists('success')) {
    function success(array $attributes = [], $status = JsonResponse::HTTP_OK)
    {
        $attributes['success'] = true;
        return new JsonResponse($attributes, $status);
    }
}
if (!function_exists('error')) {
    function error(array $attributes = [], $status = JsonResponse::HTTP_OK)
    {
        $attributes['success'] = false;
        return new JsonResponse($attributes, $status);
    }
}

if (!function_exists('companyReports')) {
    function companyReports($id,$type)
    {
       return Company::where('technology_id',$id)
                 ->where('company_type',$type)
                 ->count();
    }
}

if (!function_exists('companyCount')) {
    function companyCount($id,array $type)
    {
       return Company::where('technology_id',$id)
                 ->whereIn('company_type',$type)
                 ->count();
    }
}
?>