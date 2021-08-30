@extends('layouts.frontend')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                </div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif



                    @if(!empty($circular))
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr hidden>
                                <th>
                                    {{ trans('cruds.circular.fields.id') }}
                                </th>
                                <td>
                                    {{ $circular->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.circular.fields.cirucular_name') }}
                                </th>
                                <td>
                                    {{ $circular->cirucular_name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.circular.fields.reference_number') }}
                                </th>
                                <td>
                                    {{ $circular->reference_number }}
                                </td>
                            </tr>
                            <tr hidden>
                                <th>
                                    {{ trans('cruds.circular.fields.reference_date') }}
                                </th>
                                <td>
                                    {{ $circular->reference_date }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.circular.fields.academic_year') }}
                                </th>
                                <td>
                                    {{ $circular->academic_year->academic_year ?? '' }}
                                </td>
                            </tr>
                            <tr hidden>
                                <th>
                                    {{ trans('cruds.circular.fields.policy') }}
                                </th>
                                <td>
                                    {{ $circular->policy->policy_name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.circular.fields.sec_stipend_amount') }}
                                </th>
                                <td>
                                    {{ $circular->sec_stipend_amount }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.circular.fields.hsec_stipend_amount') }}
                                </th>
                                <td>
                                    {{ $circular->hsec_stipend_amount }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.circular.fields.hons_stipend_amount') }}
                                </th>
                                <td>
                                    {{ $circular->hons_stipend_amount }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.circular.fields.application_deadline') }}
                                </th>
                                <td>
                                    {{ $circular->application_deadline }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.circular.fields.institution_head_deadline') }}
                                </th>
                                <td>
                                    {{ $circular->institution_head_deadline }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.circular.fields.circular_file') }}
                                </th>
                                <td>
                                    @if($circular->circular_file)
                                    <a href="{{ $circular->circular_file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            <tr hidden>
                                <th>
                                    {{ trans('cruds.circular.fields.circular_status') }}
                                </th>
                                <td>
                                    <input type="checkbox" disabled="disabled" {{ $circular->circular_status ? 'checked' : '' }}>
                                </td>
                            </tr>


                        </tbody>

                    </table>
                    <a class="btn btn-success pull-right" href="{{route('frontend.application.apply',$circular->id)}}">Apply </a>

                    @else
                    {{ trans('global.zero_circluar') }}
                    {{ trans('global.zero_circluar_notice') }}

                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection