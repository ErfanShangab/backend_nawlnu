@extends('admin.default')

@section('page-header')
     مدينة  :    @if($item->town_id =='1')
     الخرطوم      
  @elseif($item->town_id =='2')
       أمدرمان  
      @elseif($item->town_id =='3')
      بحري  
    @endif

  
@endsection
@section('content')

@include('admin.partials.towns_buttons')


    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <tbody>

                <tr>
                    <th> رقم الطلبية  </th>
                    <td><a href="{{ route(ADMIN . '.orders.show', $item->id) }}">{{ $item->id  }}</a></td>
                    <th>اسم الزبون</th>
                    <td>{{ $item->Customer->User->name }}</td>
                    <th> رقم الهاتف   </th>
                    <td>{{ $item->Customer->User->phone }}</td>
                </tr>
                <tr>
                    <th> اسم العميل   </th>
                    <td>{{ $item->Client->User->name }}</td>
                    <th> نوع العميل     </th>
                    <td>{{ $item->type }}</td>
                    <th> التكلفة     </th>
                    <td>{{ $item->cost }}</td>

                </tr>
                <tr>
                    <th> اسم الكابتن     </th>
                    <td>{{ $item->Driver->User->name }}</td>
                    <th> رقم هاتف الكابتن     </th>
                    <td>{{ $item->Driver->User->phone }}</td>
                    <th> الحالة     </th>
                    <td>{{ $item->status }}</td>
                
                </tr>
                <tr>
                
                    <th> الكمية     </th>
                    <td>{{ $item->quantity}}</td>
                

                    <th> السداد     </th>

                    <td class="text-center">
                        @if($item->is_payed ==0)
                          لم يسدد    
                       @elseif($item->is_payed ==1)
                           تم السداد
                         @endif

                         <th> التفاصيل     </th>
                         <td>{{ $item->order}}</td>
                     
     
                      
                    </td>

                
                   
                </tr>

                <tr>
                
                  
                <th> التاريخ     </th>
                <td>{{ $item->created_at }}</td>
                <th>  الطلبية  </th>
                <td>{{ $item->order }}</td>
                <tr>
              
                   
                   
                </tr>

                    
            </tbody>
           
           
        
        </table>
    </div>

@endsection