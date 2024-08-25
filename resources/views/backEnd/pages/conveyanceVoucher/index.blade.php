@extends('backEnd.layouts.masters')
@section('page-title', 'Vouchers')

@section('content')

<div class="container">
    <div class="row">
        <div class="m-auto">
           {{-- filtering --}}
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.voucher.search') }}" method="get">
                    <div class="row d-flex">
                        <div class="col-auto">
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
            {{-- filtering  end--}}

        <div class="card shadow-lg">
            <div class="card-header d-flex justify-content-between bg-light-subtle">
              
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
                            <th>Approval Status</th>  
                            <th>Payment Status</th>  
                            <th> paid At </th>  
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $conveyance_vouchers as $conveyance_voucher )
                              <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $conveyance_voucher->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $conveyance_voucher->user->name }}</td>
                                    <td>{!! approvalStatus($conveyance_voucher->approval) !!}</td>
                                     {{-- approval cancel hole status --}}
                                    <td>
                                        @if ($conveyance_voucher->approval == 'cancelled')

                                        <h5 class="text-danger bg-dark badge">Your invoice has cancelled</h5>  
                                        @else
                                        
                                        {!! paymentStatus($conveyance_voucher->status) !!}
                                        @endif
                                    </td>
                                    {{-- update time of Paid  --}}
                                    <td> 
                                        @if ($conveyance_voucher->approval == 'cancelled') 
                                          
                                           <h5 class="text-danger bg-dark badge">Your invoice has cancelled</h5>  

                                        @elseif ($conveyance_voucher->approval == 'approved' && $conveyance_voucher->status == 'paid')
                                             {{ $conveyance_voucher->updated_at->format('d M Y, h:i A') }}

                                        @else
                                             <h5 class="text-warning bg-dark badge">Not Paid Yet</h5>  
                                        @endif    
                                    </td>
                                    
                                    <td>
                                        <div class="actions">
                                            <a href="{{ route('admin.conveyance-voucher.show', $conveyance_voucher->id) }}" class="btn btn-outline-warning btn-sm">Show</a>
                                            
                                            {{-- delete method --}}
                                            <a href="" class="btn btn-outline-danger btn-sm"
                                                onclick="
                                                    event.preventDefault();
                                                    Swal.fire({
                                                      title: '{{ session()->get('warning') }}',
                                                         text: 'You won\'t be able to revert this!',
                                                         icon: 'warning',
                                                         showCancelButton: true,
                                                         confirmButtonColor: '#3085d6',
                                                         cancelButtonColor: '#d33',
                                                         confirmButtonText: 'delete it!'
                                                           }).then((result) => {
                                                             if (result.isConfirmed) {
                                                                
                                                                document.getElementById('deleteVoucher-{{ $conveyance_voucher->id }}').submit();
                                                               
                                                                }
                                                            }); 
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
</div>

@endsection