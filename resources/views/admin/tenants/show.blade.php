@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.tenants.index") }}">
                {{ trans('global.back') }} To {{ trans('global.tenant.title_singular') }}
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.tenant.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.tenant.fields.title') }}
                    </th>
                    <td>
                        {{ $tenant->title }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.tenant.fields.name') }}
                    </th>
                    <td>
                        {{ $tenant->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.tenant.fields.phone') }}
                    </th>
                    <td>
                        {{ $tenant->phone }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.tenant.fields.email') }}
                    </th>
                    <td>
                        {{ $tenant->email }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.tenant.fields.work_place') }}
                    </th>
                    <td>
                        {!! $tenant->work_place !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.tenant.fields.property') }}
                    </th>
                    <td>
                        {{ $tenant->property->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.tenant.fields.apartment') }}
                    </th>
                    <td>
                        {{ $tenant->apartment->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.tenant.fields.kin_name') }}
                    </th>
                    <td>
                        {{ $tenant->kin_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.tenant.fields.kin_phone') }}
                    </th>
                    <td>
                        {{ $tenant->kin_phone }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.tenant.fields.kin_address') }}
                    </th>
                    <td>
                        {{ $tenant->kin_address }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.tenant.fields.is_active') }}
                    </th>
                    <td>
                        {{ App\Tenant::IS_ACTIVE_SELECT[$tenant->is_active] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.tenant.fields.created_by') }}
                    </th>
                    <td>
                        {{ $tenant->created_by->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.tenant.fields.updated_by') }}
                    </th>
                    <td>
                        {{ $tenant->updated_by->name ?? '' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection