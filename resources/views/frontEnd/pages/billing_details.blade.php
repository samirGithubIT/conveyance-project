@extends('frontEnd.layout.master')

@section('content')

    <div class="container" style="margin-top: 180px">
        <div class="row">
            <div class="card">
                <div class="card-body">
                        <form action="{{ route('voucher.search') }}" method="get">
                            <div class="row d-flex">
                                <div class="col-auto">
                                    {{-- filtering --}}
                                    <label for="" class="form-label">Choose your PaymentStatus</label>
                
                                    <select name="status" id="#" class="form-select">
                                        <option value="">-- SELECT --</option>
                
                                        @foreach ( paymentStatusOption() as $status)
                                        <option value="{{ $status }}"
    
                                        {{-- selected rakhar jonne --}}
                                         {{  request()->status == $status ? 'selected' : '' }}
                                        
                                        > {{ $status }} </option>
                                        @endforeach
                
                                    </select>
                
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                                    <div class="col-auto">
                                        <button class="btn btn-outline-info mt-4" type="submit">Search</button>
                                    </div>
                            </div>
                                
                        </form>
                </div>
            </div>
                 <div class="card">
                    <div class="card-header d-flex justify-content-between bg-light-subtle m-2">
                        <h5>Billing Details of <strong>{{ Auth::user()->name }}</strong></h5>
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
                                    <th>People with you</th>
                                    <th>Payment Status</th>
                                    <th>Amount TK. </th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($conveyance as $voucher )
                                   <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $voucher->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $voucher->from_location }}</td>
                                    <td>{{ $voucher->to_location }}</td>
                                    <td>{{ $voucher->conveyance->name }}</td>
                                    <td>{{ $voucher->companions_count }}</td>
                                    <td>{!! paymentStatus($voucher->status) !!}</td>
                                    <td>{{ $voucher->amount }}</td>
                                    <td>{{ $voucher->remarks }}</td>
                                   </tr>
                               @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="7" style="text-align: right"><strong>Total Amount</strong> :</th>

                                    <td colspan="2" class="bg-light-subtle">{{ $conveyance->sum('amount') }}</td> 
                                </tr>
                            </tfoot>
                        </table>
                        <div class="button d-flex">
                            <a href="{{ url('/') }}" class="btn btn-outline-success px-3"> Go To Back </a>
                            <a href="{{ route('voucher.pdf', $voucher->user_id ) }}" class="btn btn-outline-warning px-4 ms-4"> Print </a>
                        </div>
                    </div>
                 </div>
            </div>
    </div>

@endsection