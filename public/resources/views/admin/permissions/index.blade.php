@extends('admin.default')

@section('page-header')
    Users <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')

    <div class="mB-20">
        <a href="{{ route(ADMIN . '.permissions.create') }}" class="btn btn-info">
            {{ trans('app.add_button') }}
        </a>
    </div>


    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Role Name</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Role Name</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </tfoot>

            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td><a href="{{ route(ADMIN . '.permissions.edit', $permission->id) }}">{{ $loop }}</a></td>
                        <td>{{ $permission->role->name }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-role">
                                    <a href="{{ route(ADMIN . '.permissions.edit', $permission->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li>
                                <li class="list-inline-role">
                                    {!! Form::open([
                                        'class'=>'delete',
                                        'url'  => route(ADMIN . '.permissions.destroy', $permission->id),
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