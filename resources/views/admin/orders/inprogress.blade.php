@extends('admin.default')

@section('page-header')
    الطلبيات غير المسلمة   
@endsection
{{-- <small>{{ trans('app.manage') }}</small> --}}
@section('content')

@include('admin.partials.order_buttons')


    {{-- {{ trans('app.add_button') }} --}}
    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th> رقم الطلبية  </th>
                    <th>اسم الزبون</th>
                    <th> رقم الهاتف   </th>
                    <th> اسم العميل   </th>
                    <th>المدينة</th>
                    <th> الكمية     </th>
                    <th> التكلفة     </th>
                    <th> اسم الكابتن     </th>
                    <th> الحالة     </th>
                    <th> السداد     </th>
                    <th> التاريخ     </th>
                    <th>التحكم</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th> رقم الطلبية  </th>
                    <th>اسم الزبون</th>
                    <th> رقم الهاتف   </th>
                    <th> اسم العميل   </th>
                    <th>المدينة</th>
                    <th> الكمية     </th>
                    <th> التكلفة     </th>
                    <th> اسم الكابتن     </th>
                    <th> الحالة     </th>
                    <th> السداد     </th>
                    <th> التاريخ     </th>
                    <th>التحكم</th>
                </tr>
            </tfoot>
            
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td><a href="{{ route(ADMIN . '.orders.show', $item->id) }}">{{ $item->id  }}</a></td>
                        <td>{{ $item->Customer->User->name }}</td>
                        <td>{{ $item->Customer->User->f_phone }}</td>
                        <td>{{ $item->Client->User->name }}</td>
                        <td>
                            مدينة  :    @if($item->town_id =='1')
                           الخرطوم      
                          @elseif($item->town_id =='2')
                         أمدرمان  
                         @elseif($item->town_id =='3')
                          بحري  
                        @endif
                         </td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->cost }}</td>
                        <td>{{ $item->Driver->User->name }}</td>
                        <td class="text-center">
                            @if($item->status =="inprogress")
                               جاري التوصيل       
                           @elseif($item->status =="delivered")
                               تم التوصيل
                             @endif
                            
                        </td>

                        <td class="text-center">
                            @if($item->is_payes ==0)
                                تم السداد          
                           @elseif($item->is_payes ==1)
                               غير مسدد
                             @endif
                            
                        </td>


                        <td>{{ $item->created_at }}</td>

                        <td>
                            <ul class="list-inline">
                                {{-- <li class="list-inline-item">
                                    <a href="{{ route(ADMIN . '.customers.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li> --}}
                                <li class="list-inline-item">
                                    {!! Form::open([
                                        'class'=>'delete',
                                        'url'  => route(ADMIN . '.orders.destroy', $item->id), 
                                        'method' => 'DELETE',
                                        ]) 
                                    !!}

                                        <button class="btn btn-danger btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i></button>
                                        
                                    {!! Form::close() !!}
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        
        </table>
    </div>

    
@endsection