    @if($data)
        @foreach($data as $key => $value)
        <tr >
            <td>{{++$key}}</td>
            <td>
              <div class="font-15"><a href="{{ route('company.show',$value->company->id) }}">
              {{$value->company->comp_name}}</a>
              </div>
            </td>
            @if($value->company->services)
            <td>
                  <?php foreach(explode(',',$value->company->services) as $ser) {?>
                  <a class="btn btn-primary" href="http://teamwork.ochre-media.com/{{strtolower($ser)}}/{{$value->id}}" role="button">{{$ser}}</a>
                  <?php } ?>
            </td>
            @else
            <td></td>
            @endif
            <!--<td>{{$value->company->company_type}}</td>-->
            <td><div class="font-15">{{$value->user ? $value->user->name :''}}</div></td>
            <td><div class="font-15">{{$value->fiscal_year}}</div></td>
                @php $user= Auth::user()->roles->first(); if($user->name == 'admin' || $user->name =='manager'){ @endphp
            <td class="">
              <div class="font-15">{{$value->deal_amount}}</div>
            </td>
             @php } @endphp                                 
        </tr>
         @endforeach
          @else
              <tr>
                <td colspan="5" id="norecord">No Records found</td>

            </tr>
    @endif