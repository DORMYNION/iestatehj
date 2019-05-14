@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.vacancy.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.vacancies.update", [$vacancy->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('properties') ? 'has-error' : '' }}">
                <label for="property">{{ trans('global.vacancy.fields.property') }}*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="properties[]" id="properties" class="form-control select2" multiple="multiple">
                    @foreach($properties as $id => $property)
                        <option value="{{ $id }}" {{ (in_array($id, old('properties', [])) || isset($vacancy) && $vacancy->properties->contains($id)) ? 'selected' : '' }}>{{ $property }}</option>
                    @endforeach
                </select>
                @if($errors->has('properties'))
                    <p class="help-block">
                        {{ $errors->first('properties') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.vacancy.fields.property_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_vacant') ? 'has-error' : '' }}">
                <label for="is_vacant">{{ trans('global.vacancy.fields.is_vacant') }}*</label>
                <select id="is_vacant" name="is_vacant" class="form-control">
                    <option value="" disabled {{ old('is_vacant', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Vacancy::IS_VACANT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_vacant', $vacancy->is_vacant) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_vacant'))
                    <p class="help-block">
                        {{ $errors->first('is_vacant') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('property_tags') ? 'has-error' : '' }}">
                <label for="property_tag">{{ trans('global.vacancy.fields.property_tag') }}*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="property_tags[]" id="property_tags" class="form-control select2" multiple="multiple">
                    @foreach($property_tags as $id => $property_tag)
                        <option value="{{ $id }}" {{ (in_array($id, old('property_tags', [])) || isset($vacancy) && $vacancy->property_tags->contains($id)) ? 'selected' : '' }}>{{ $property_tag }}</option>
                    @endforeach
                </select>
                @if($errors->has('property_tags'))
                    <p class="help-block">
                        {{ $errors->first('property_tags') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.vacancy.fields.property_tag_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.vacancy.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($vacancy) ? $vacancy->description : '') }}</textarea>
                @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.vacancy.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('rent') ? 'has-error' : '' }}">
                <label for="rent">{{ trans('global.vacancy.fields.rent') }}*</label>
                <input type="number" id="rent" name="rent" class="form-control" value="{{ old('rent', isset($vacancy) ? $vacancy->rent : '') }}" step="0.01">
                @if($errors->has('rent'))
                    <p class="help-block">
                        {{ $errors->first('rent') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.vacancy.fields.rent_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('updated_by_id') ? 'has-error' : '' }}">
                <label for="updated_by">{{ trans('global.vacancy.fields.updated_by') }}</label>
                <select name="updated_by_id" id="updated_by" class="form-control select2">
                    @foreach($updated_bies as $id => $updated_by)
                        <option value="{{ $id }}" {{ (isset($vacancy) && $vacancy->updated_by ? $vacancy->updated_by->id : old('updated_by_id')) == $id ? 'selected' : '' }}>{{ $updated_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('updated_by_id'))
                    <p class="help-block">
                        {{ $errors->first('updated_by_id') }}
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