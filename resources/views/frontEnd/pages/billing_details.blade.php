@extends('frontEnd.layout.master')

@section('content')

    <div class="container" style="margin-top: 180px">
        <div class="row">
            <div class="col-12">
                 <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Billing Details of <strong>{{ Auth::user()->name }}</strong></h5>
                        {{-- <h5>Payment Status : {{  $conveyance->status }} --}}
                            {{-- @foreach ( $conveyance as $payment_status )
                            {{  $payment_status->status }}
                            @endforeach --}}
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Date</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Mode of Conveyance</th>
                                    <th>Amount TK. </th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($conveyance as $voucher )
                                   <tr>
                                    <td>{{ $voucher->id }}</td>
                                    <td>{{ $voucher->date }}</td>
                                    <td>{{ $voucher->from_location }}</td>
                                    <td>{{ $voucher->to_location }}</td>
                                    <td>{{ $voucher->conveyance->name }}</td>
                                    <td>{{ $voucher->amount }}</td>
                                    <td>{{ $voucher->remarks }}</td>
                                   </tr>
                               @endforeach
                            </tbody>
                        </table>
                        <div class="button">
                            <a href="{{ url('/') }}" class="btn btn-outline-success px-3"> Go To Back </a>
                        </div>
                    </div>
                 </div>
            </div>
    </div>

@endsection