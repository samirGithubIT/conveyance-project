@extends('backEnd.layouts.masters')
@section('page-title', 'Vouchers')

@section('content')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body d-flex">
                        {{-- approval table --}}
        <div class="col-4 me-5">

                   @if ($conveyance_voucher->approval == 'cancelled')
                   
                    <p class="alert alert-danger py-4">Invoice has been cancelled</p>

                   @elseif ($conveyance_voucher->approval == 'approved')
                     <p class="alert alert-success py-4">invoice Approved</p>
                    @else

                   <form action="{{ route('admin.voucher.approve') }}" method="post" class="mt-3">
                    @csrf

                 <div class="user">
                    <input type="hidden" name="conveyanceVoucher_id" value="{{ $conveyance_voucher->id }}"> 
                 </div>
                 
                <div class="my-4">
                    <label for="" class="form-label">Select Approval status</label>

                    <select name="approval" id="#" class="form-select">
                        <option value="">-- SELECT --</option>

                        @foreach ( approvalStatusOption() as $approval)
                        <option value="{{ $approval }}" 

                                @if ($conveyance_voucher->approval == $approval)
                                    selected
                                @endif>

                            {{ $approval }} </option>
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

        {{-- status table --}}
        <div class="col-4">

                    @if ($conveyance_voucher->approval == 'cancelled')
                    <p class="alert alert-danger py-4">Sorry you Can't paid </p>

                   @elseif ($conveyance_voucher->status == 'paid')
                    <p class="alert alert-success py-4">Paid Successfully</p>
                   @else

                   <form action="{{ route('admin.voucher.status') }}" method="post" class="mt-3">
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
                <div class="card-header d-flex justify-content-between bg-light-subtle">
                  
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
                                <th>Approval Status</th> 
                                <th>Payment Status</th> 
                                <th>Action</th>
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
                                        <td>{!! approvalStatus($conveyance_voucher->approval) !!}</td>
                                        <td>
                                            @if ($conveyance_voucher->approval == 'cancelled')
    
                                            <h5 class="text-danger bg-dark badge">Your invoice has cancelled</h5>  
                                             
                                            @else
                                            
                                            {!! paymentStatus($conveyance_voucher->status) !!}
    
                                            @endif
    
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.conveyance-voucher.edit', $conveyance_voucher->id) }}" class="btn btn-outline-info">Edit</a>
                                        </td>
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