@extends('backEnd.layouts.masters')
@section('page-title', 'Vouchers')

@section('content')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 d-flex">
                        <div>
                            <label for="" class="form-label">Select PaymentStatus</label>
        
                            <select name="status" id="#" class="form-select">
                                <option value="">-- SELECT --</option>
        
                                @foreach ( paymentStatusOption() as $status)
                                <option value="{{ $status }}" > {{ $status }} </option>
                                @endforeach
        
                            </select>
        
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
              
                    <h3>List of Reports</h3>
                    <a href="{{ route('admin.conveyance-voucher.create') }}" class="btn btn-outline-primary">Add a new Voucher Data</a>
                
            </div>
            <div class="card-body">
               
                <table class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Payment Status</th>  
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $conveyance_vouchers as $conveyance_voucher )
                              <tr>
                                    <td>{{ $conveyance_voucher->id }}</td>
                                    <td>{{ $conveyance_voucher->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $conveyance_voucher->user->name }}</td>
                                    <td>{!! paymentStatus($conveyance_voucher->status) !!}</td>
                                    
                                    <td>
                                        <div class="actions">
                                            <a href="{{ route('admin.conveyance-voucher.show', $conveyance_voucher->id) }}" class="btn btn-outline-warning">Show</a>
                                            <a href="{{ route('admin.conveyance-voucher.edit', $conveyance_voucher->id) }}" class="btn btn-outline-info">Edit</a>
                                            {{-- delete method --}}
                                            <a href="" class="btn btn-outline-danger"
                                                onclick="
                                                    event.preventDefault();
                                                    document.getElementById('deleteVoucher-{{ $conveyance_voucher->id }}').submit()
                                                "
                                            >Delete</a> 
                                            
                                           <form action="{{ route('admin.conveyance-voucher.destroy' , $conveyance_voucher->id) }}" method="post" id="deleteVoucher-{{ $conveyance_voucher->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                             </tr>  
                        @endforeach
                    </tbody>
                </table>

                {{-- for paginate --}}
                {{-- {!! $conveyance_reports->links() !!} --}}
            </div>
        </div>
    </div>
</div>

@endsection