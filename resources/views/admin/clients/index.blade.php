@extends('admin.default')

@section('page-header')
    إدارة الموردين 
@endsection
{{-- <small>{{ trans('app.manage') }}</small> --}}
@section('content')

    @include('admin.partials.client_buttons')


 
    {{-- {{ trans('app.add_button') }} --}}
    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>الإسم</th>
                    <th>البريد الإلكتروني</th>
                    <th> رقم الهاتف   </th>

                    <th>التحكم</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>الإسم</th>
                    <th>البريد الإلكتروني</th>
                    <th> رقم الهاتف   </th>

                    <th>التحكم</th>
                </tr>
            </tfoot>
            
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td><a href="{{ route(ADMIN . '.clients.show', $item->id) }}">{{ $item->User->name }}</a></td>
                        <td>{{ $item->User->email }}</td>
                        <td>{{ $item->User->f_phone }}</td>


                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="{{ route(ADMIN . '.clients.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li>
                                <li class="list-inline-item">
                                    {!! Form::open([
                                        'class'=>'delete',
                                        'url'  => route(ADMIN . '.clients.destroy', $item->id), 
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





@extends('admin.default')

@section('page-header')
    إدارة العملاء 
@endsection
{{-- <small>{{ trans('app.manage') }}</small> --}}
@section('content')

    


 
    {{-- {{ trans('app.add_button') }} --}}
    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>الإسم</th>
                    <th>البريد الإلكتروني</th>
                    <th> رقم الهاتف   </th>

                    <th>التحكم</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>الإسم</th>
                    <th>البريد الإلكتروني</th>
                    <th> رقم الهاتف   </th>

                    <th>التحكم</th>
                </tr>
            </tfoot>
            
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td><a href="{{ route(ADMIN . '.clients.show', $item->id) }}">{{ $item->User->name }}</a></td>
                        <td>{{ $item->User->email }}</td>
                        <td>{{ $item->User->phone }}</td>


                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="{{ route(ADMIN . '.clients.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li>
                                <li class="list-inline-item">
                                    {!! Form::open([
                                        'class'=>'delete',
                                        'url'  => route(ADMIN . '.clients.destroy', $item->id), 
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