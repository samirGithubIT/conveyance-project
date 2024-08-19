@extends('backEnd.layouts.masters')
@section('page-title', 'Vouchers')

@section('content')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.voucher.search') }}" method="get">
                    <div class="row d-flex">
                        <div class="col-auto">
                                {{-- filtering --}}
                                <label for="" class="form-label">Select PaymentStatus</label>
            
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
                            <label for="" class="form-label">Select Name</label>
            
                                <select name="user_id" id="user_id" class="form-select">
                                    <option value="">-- SELECT --</option>
            
                                    @foreach ( App\Models\User::all() as $user)
                                    <option value="{{ $user->id }}" 
                                        
                                     {{-- selected rakhar jonne --}}
                                     {{  request()->user_id == $user->id ? 'selected' : '' }}

                                        > {{ $user->name }} </option>
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
            <div class="card-header d-flex justify-content-between">
              
                    <h3>List of Reports</h3>
                    <a href="{{ route('admin.conveyance-voucher.create') }}" class="btn btn-outline-primary">Add a new Voucher Data</a>
                
            </div>
            <div class="card-body">
               
                <table class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th>Check</th>
                            <th>SL.</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Payment Status</th>  
                            <th> paid At </th>  
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $conveyance_vouchers as $conveyance_voucher )
                              <tr>
                                    <td><input type="checkbox" name="" id="" value="{{ $conveyance_voucher->id }}"></td>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $conveyance_voucher->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $conveyance_voucher->user->name }}</td>
                                    <td>{!! paymentStatus($conveyance_voucher->status) !!}</td>
                                    <td> 
                                        @if ($conveyance_voucher->status == 'paid')
                                            {{ $conveyance_voucher->updated_at->format('d M Y, h:i A') }}
                                        @else
                                            <h5 class="text-warning bg-dark badge">Not Paid Yet</h5>    
                                        @endif    
                                    </td>
                                    
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