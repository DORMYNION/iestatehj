@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.landlord.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.landlords.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('global.landlord.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($landlord) ? $landlord->title : '') }}">
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.landlord.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.landlord.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($landlord) ? $landlord->name : '') }}">
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.landlord.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('global.landlord.fields.phone') }}*</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($landlord) ? $landlord->phone : '') }}">
                @if($errors->has('phone'))
                    <p class="help-block">
                        {{ $errors->first('phone') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.landlord.fields.phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.landlord.fields.email') }}</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($landlord) ? $landlord->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.landlord.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address_office') ? 'has-error' : '' }}">
                <label for="address_office">{{ trans('global.landlord.fields.address_office') }}*</label>
                <textarea id="address_office" name="address_office" class="form-control ">{{ old('address_office', isset($landlord) ? $landlord->address_office : '') }}</textarea>
                @if($errors->has('address_office'))
                    <p class="help-block">
                        {{ $errors->first('address_office') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.landlord.fields.address_office_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address_residence') ? 'has-error' : '' }}">
                <label for="address_residence">{{ trans('global.landlord.fields.address_residence') }}</label>
                <textarea id="address_residence" name="address_residence" class="form-control ">{{ old('address_residence', isset($landlord) ? $landlord->address_residence : '') }}</textarea>
                @if($errors->has('address_residence'))
                    <p class="help-block">
                        {{ $errors->first('address_residence') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.landlord.fields.address_residence_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('kin_name') ? 'has-error' : '' }}">
                <label for="kin_name">{{ trans('global.landlord.fields.kin_name') }}</label>
                <input type="text" id="kin_name" name="kin_name" class="form-control" value="{{ old('kin_name', isset($landlord) ? $landlord->kin_name : '') }}">
                @if($errors->has('kin_name'))
                    <p class="help-block">
                        {{ $errors->first('kin_name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.landlord.fields.kin_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('kin_phone') ? 'has-error' : '' }}">
                <label for="kin_phone">{{ trans('global.landlord.fields.kin_phone') }}</label>
                <input type="text" id="kin_phone" name="kin_phone" class="form-control" value="{{ old('kin_phone', isset($landlord) ? $landlord->kin_phone : '') }}">
                @if($errors->has('kin_phone'))
                    <p class="help-block">
                        {{ $errors->first('kin_phone') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.landlord.fields.kin_phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('kin_address') ? 'has-error' : '' }}">
                <label for="kin_address">{{ trans('global.landlord.fields.kin_address') }}</label>
                <textarea id="kin_address" name="kin_address" class="form-control ">{{ old('kin_address', isset($landlord) ? $landlord->kin_address : '') }}</textarea>
                @if($errors->has('kin_address'))
                    <p class="help-block">
                        {{ $errors->first('kin_address') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.landlord.fields.kin_address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('officer_id') ? 'has-error' : '' }}">
                <label for="officer">{{ trans('global.landlord.fields.officer') }}*</label>
                <select name="officer_id" id="officer" class="form-control select2">
                    @foreach($officers as $id => $officer)
                        <option value="{{ $id }}" {{ (isset($landlord) && $landlord->officer ? $landlord->officer->id : old('officer_id')) == $id ? 'selected' : '' }}>{{ $officer }}</option>
                    @endforeach
                </select>
                @if($errors->has('officer_id'))
                    <p class="help-block">
                        {{ $errors->first('officer_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('created_by_id') ? 'has-error' : '' }}">
                <label for="created_by">{{ trans('global.landlord.fields.created_by') }}*</label>
                <select name="created_by_id" id="created_by" class="form-control select2">
                    @foreach($created_bies as $id => $created_by)
                        <option value="{{ $id }}" {{ (isset($landlord) && $landlord->created_by ? $landlord->created_by->id : old('created_by_id')) == $id ? 'selected' : '' }}>{{ $created_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by_id'))
                    <p class="help-block">
                        {{ $errors->first('created_by_id') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection