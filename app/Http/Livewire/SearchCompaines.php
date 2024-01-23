<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Company;
use Livewire\WithPagination;
use DB;
use Auth;
use App\Technology;

class SearchCompaines extends Component
{
    use WithPagination;
     public $technology = '';
    public $companytype = '';
    public $company = '';
    public $perPage = 10;
    public $sortField;
    public $sortAsc = false;
    public $search = null;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }
    public function mount()
    {
        $this->technology =\Request::segment(2);
        $this->companytype =\Request::segment(3);
        
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = $this->search;
        $technology = $this->technology;
        $companytype = $this->companytype;
        $company = $this->company;
        $sortField = $this->sortField?$this->sortField:'id';
        $tech = explode(',', Auth::user()->technology);
        $companyT = explode(',', Auth::user()->company_type);
        $technologies = Technology::whereIn('id',$tech)->get();
        $companytypes = DB::table('company_types')->whereIn('type',$companyT)->get();
                           
        $this->companies =  Company::whereIn('technology_id',$tech)
                                    ->whereIn('company_type',$companyT)
                                    ->when($technology  != null, function ($query) use ($technology) {
                                              return $query->where('technology_id', $technology);
                                             })
                                    ->when($companytype  != null, function ($query) use ($companytype) {
                                              return $query->where('company_type', $companytype);
                                         })
                                    ->when($company  != null, function ($query) use ($company) {
                                              return $query->where('comp_name','like', '%' . $company. '%');
                                         })
                                    ->orderBy($sortField, $this->sortAsc ? 'asc' : 'desc')
                                    ->paginate($this->perPage);
        return view('livewire.search-compaines',[
            'companies'=>$this->companies,'technologies'=>$technologies,'companytypes'=>$companytypes
        ]);
    }
}
