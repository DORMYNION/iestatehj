@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12 ">
            <a class="btn btn-success" href="{{ route("admin.payments.index") }}">
                {{ trans('global.back') }} To {{ trans('global.payment.title_singular') }}
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.payment.title') }}
    </div>
    <div class="card-body">
        @can('payment_confirm')
            @if( $auth->roles[0]['title'] === 'Admin' || $auth->roles[0]['title'] === 'Ceo' || $auth->roles[0]['title'] === 'Gm' || $auth->roles[0]['title'] === 'Accountant')
                @if( $payment->is_confirmed !== "Confirmed")
                    <a class="btn form-control btn btn-success" href="{{ route('admin.payments.edit', $payment->id) }}">
                        {{ trans('global.confirm') }}
                    </a>
                @endif
            @endif
        @endcan
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.property') }}
                    </th>
                    <td>
                        {{ $payment->property->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.landlord') }}
                    </th>
                    <td>
                        {{ $payment->landlord->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.tenant') }}
                    </th>
                    <td>
                        {{ $payment->tenant->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.apartment') }}
                    </th>
                    <td>
                        {{ $payment->apartment->description ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.annual_charge') }}
                    </th>
                    <td>
                        NGN {{ $payment->annual_charge }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.service_charge') }}
                    </th>
                    <td>
                        NGN {{ $payment->service_charge ?? 0 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.legal_fee') }}
                    </th>
                    <td>
                        NGN {{ $payment->legal_fee  ?? 0 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.caution_deposit') }}
                    </th>
                    <td>
                        NGN {{ $payment->caution_deposit  ?? 0 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.agency_fee') }}
                    </th>
                    <td>
                        NGN {{ $payment->agency_fee ?? 0  }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.management_fee') }}
                    </th>
                    <td>
                        NGN {{ $payment->management_fee ?? 0  }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.amount_paid') }}
                    </th>
                    <td>
                        NGN {{ $payment->amount_paid }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.landlord_account') }}
                    </th>
                    <td>
                        NGN {{ $payment->landlord_account  ?? 0  }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.company_account') }}
                    </th>
                    <td>
                        NGN {{ $payment->company_account  ?? 0  }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.payment_date') }}
                    </th>
                    <td>
                        {{ $payment->payment_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.rent_from') }}
                    </th>
                    <td>
                        {{ $payment->rent_from }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.rent_to') }}
                    </th>
                    <td>
                        {{ $payment->rent_to }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.payment_type') }}
                    </th>
                    <td>
                        {{ App\Payment::PAYMENT_TYPE_SELECT[$payment->payment_type] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.bank_name') }}
                    </th>
                    <td>
                        {{ $payment->bank_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.cheque_no') }}
                    </th>
                    <td>
                        {{ $payment->cheque_no }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.document') }}
                    </th>
                    <td>
                        {{ $payment->document }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.note') }}
                    </th>
                    <td>
                        {!! $payment->note !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.is_confirmed') }}
                    </th>
                    <td>
                        {{ App\Payment::IS_CONFIRMED_SELECT[$payment->is_confirmed] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.is_confirm_by') }}
                    </th>
                    <td>
                        {{ $payment->is_confirm_by->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.is_confirmed_date') }}
                    </th>
                    <td>
                        {{ $payment->is_confirmed_date }}
                    </td>
                </tr>
                {{-- <tr>
                    <th>
                        {{ trans('global.payment.fields.is_confirmed_gm') }}
                    </th>
                    <td>
                        {{ isset($property->is_confirmed_gm_select) ?  App\Payment::IS_CONFIRMED_GM_SELECT[$payment->is_confirmed_gm] : 'Pending' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.is_confirmed_gm_name') }}
                    </th>
                    <td>
                        {{ $payment->is_confirmed_gm_name->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.is_confirmed_gm_date') }}
                    </th>
                    <td>
                        {{ $payment->is_confirmed_gm_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.is_confirmed_ceo') }}
                    </th>
                    <td>
                        {{ isset($property->is_confirmed_ceo_select) ?  App\Payment::IS_CONFIRMED_CEO_SELECT[$payment->is_confirmed_ceo] : "Pending"}}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.is_confirmed_ceo_name') }}
                    </th>
                    <td>
                        {{ $payment->is_confirmed_ceo_name->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.is_confirmed_ceo_date') }}
                    </th>
                    <td>
                        {{ $payment->is_confirmed_ceo_date }}
                    </td>
                </tr> --}}
                {{-- <tr>
                    <th>
                        {{ trans('global.payment.fields.is_cancelled') }}
                    </th>
                    <td>
                        {{ isset($property->is_confirmed_ceo_select) ?  App\Payment::IS_CANCELLED_SELECT[$payment->is_cancelled] : "" }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.date_cancelled') }}
                    </th>
                    <td>
                        {{ $payment->date_cancelled }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.cancelled_by') }}
                    </th>
                    <td>
                        {{ $payment->cancelled_by->name ?? '' }}
                    </td>
                </tr> --}}
                <tr>
                    <th>
                        {{ trans('global.payment.fields.is_full_payment') }}
                    </th>
                    <td>
                        {{ App\Payment::IS_FULL_PAYMENT_SELECT[$payment->is_full_payment] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.is_part_payment') }}
                    </th>
                    <td>
                        {{ App\Payment::IS_PART_PAYMENT_SELECT[$payment->is_part_payment] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.created_by') }}
                    </th>
                    <td>
                        {{ $payment->created_by->name ?? '' }}
                    </td>
                </tr>
                {{-- <tr>
                    <th>
                        {{ trans('global.payment.fields.updated_by') }}
                    </th>
                    <td>
                        {{ $payment->updated_by->name ?? '' }}
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
</div>

@endsection
