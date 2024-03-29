@extends('admin.default')

@section('page-header')
  الاعدادات المتقدمة
@endsection
{{-- <small>{{ trans('app.manage') }}</small> --}}
@section('content')

    <div class="mB-20">
        <a href="{{ route(ADMIN . '.configs.create') }}" class="btn btn-info">
       إضافة  جديد 
        </a>
    </div>

    {{-- {{ trans('app.add_button') }} --}}
    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>البند</th>
                    {{-- <th>  القيمة</th> --}}
                    <th>  سعر التوصيلة</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>الإسم</th>
                    {{-- <th>القيمة  </th> --}}
                    <th>  سعر التوصيلة</th>
                    <th>التحكم</th>
                </tr>
            </tfoot>
            
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->name}}</td>
                        {{-- <td>{{ $item->value }}</td> --}}
                        <td>{{ $item->trip_price }}</td>

                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="{{ route(ADMIN . '.configs.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li>
                                {{-- <li class="list-inline-item">
                                    {!! Form::open([
                                        'class'=>'delete',
                                        'url'  => route(ADMIN . '.configs.destroy', $item->id), 
                                        'method' => 'DELETE',
                                        ]) 
                                    !!}

                                        <button class="btn btn-danger btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i></button>
                                        
                                    {!! Form::close() !!}
                                </li> --}}
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        
        </table>
    </div>

@endsection
