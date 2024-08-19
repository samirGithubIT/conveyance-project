@extends('backEnd.layouts.masters')
@section('page-title', 'Vouchers')

@section('content')

<div class="container">
    <div class="row">
        
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                   @if ($conveyance_voucher->status == 'paid')
                    <p class="alert alert-success py-4">Paid Successfully</p>
                   @else

                   <form action="{{ route('admin.voucher.accept') }}" method="post" class="mt-3">
                    @csrf

                 <div class="user">
                    <input type="hidden" name="conveyanceVoucher_id" value="{{ $conveyance_voucher->id }}"> 
                 </div>
                 
                <div class="my-4">
                    <label for="" class="form-label">Select PaymentStatus</label>

                    <select name="status" id="#" class="form-select">
                        <option value="">-- SELECT --</option>

                        @foreach ( paymentStatusOption() as $status)
                        <option value="{{ $status }}" 

                                @if ($conveyance_voucher->status == $status)
                                    selected
                                @endif>

                            {{ $status }} </option>
                        @endforeach

                    </select>

                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-outline-primary">Done</button>
            </form>    
                   @endif

                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  
                        <h3>List of Reports</h3>
                        <a href="{{ route('admin.conveyance-voucher.index') }}" class="btn btn-outline-success">Go Back</a>
                    
                </div>
                <div class="card-body">
                   
                    <table class="table table-stripped table-hover">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Date</th>
                                <th>Name</th>  
                                <th>From</th>  
                                <th>To</th>  
                                <th>Mode of Conveyance</th>  
                                <th>People with you</th>  
                                <th>Amount TK.</th>  
                                <th>remarks</th>  
                                <th>Payment Status</th> 
                            </tr>
                        </thead>
                        <tbody>
                                  <tr>
                                        <td>{{ $conveyance_voucher->id }}</td>
                                        <td>{{ $conveyance_voucher->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $conveyance_voucher->user->name }}</td>
                                        <td>{{ $conveyance_voucher->from_location }}</td>
                                        <td>{{ $conveyance_voucher->to_location }}</td>
                                        <td>{{ $conveyance_voucher->conveyance->name }}</td>
                                        <td>{{ $conveyance_voucher->companions_count }}</td>
                                        <td>{{ $conveyance_voucher->amount }}</td>
                                        <td>{{ $conveyance_voucher->remarks }}</td>
                                        <td>{!! paymentStatus($conveyance_voucher->status) !!}</td>
                                 </tr>  
                        </tbody>
                    </table>
    
                    {{-- for paginate --}}
                    {{-- {!! $conveyance_reports->links() !!} --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection