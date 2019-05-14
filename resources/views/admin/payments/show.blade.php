@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.payment.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Property
                    </th>
                    <td>
                        @foreach($payment->properties as $id => $property)
                            <span class="label label-info label-many">{{ $property->name }}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>
                        Landlord
                    </th>
                    <td>
                        @foreach($payment->landlords as $id => $landlord)
                            <span class="label label-info label-many">{{ $landlord->name }}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>
                        Tenant
                    </th>
                    <td>
                        @foreach($payment->tenants as $id => $tenant)
                            <span class="label label-info label-many">{{ $tenant->name }}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.apartmernt') }}
                    </th>
                    <td>
                        {{ $payment->apartmernt->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.annual_charge') }}
                    </th>
                    <td>
                        ${{ $payment->annual_charge }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.service_charge') }}
                    </th>
                    <td>
                        ${{ $payment->service_charge }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.legal_fee') }}
                    </th>
                    <td>
                        ${{ $payment->legal_fee }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.caution_deposit') }}
                    </th>
                    <td>
                        ${{ $payment->caution_deposit }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.agency_fee') }}
                    </th>
                    <td>
                        ${{ $payment->agency_fee }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.management_fee') }}
                    </th>
                    <td>
                        ${{ $payment->management_fee }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.amount_paid') }}
                    </th>
                    <td>
                        ${{ $payment->amount_paid }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.landlord_account') }}
                    </th>
                    <td>
                        ${{ $payment->landlord_account }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.company_account') }}
                    </th>
                    <td>
                        ${{ $payment->company_account }}
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
                        Confirm Staff
                    </th>
                    <td>
                        @foreach($payment->confirm_staffs as $id => $confirm_staff)
                            <span class="label label-info label-many">{{ $confirm_staff->name }}</span>
                        @endforeach
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
                <tr>
                    <th>
                        {{ trans('global.payment.fields.is_confirmed_gm') }}
                    </th>
                    <td>
                        {{ App\Payment::IS_CONFIRMED_GM_SELECT[$payment->is_confirmed_gm] }}
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
                        {{ App\Payment::IS_CONFIRMED_CEO_SELECT[$payment->is_confirmed_ceo] }}
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
                </tr>
                <tr>
                    <th>
                        {{ trans('global.payment.fields.is_cancelled') }}
                    </th>
                    <td>
                        {{ App\Payment::IS_CANCELLED_SELECT[$payment->is_cancelled] }}
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
                </tr>
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
                <tr>
                    <th>
                        {{ trans('global.payment.fields.updated_by') }}
                    </th>
                    <td>
                        {{ $payment->updated_by->name ?? '' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection