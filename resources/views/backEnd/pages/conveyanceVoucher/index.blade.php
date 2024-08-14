@extends('backEnd.layouts.masters')
@section('page-title', 'Vouchers')

@section('content')

<div class="container">
    <div class="row">
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
                            <th>From -</th>  
                            <th>- To</th>  
                            <th>Mode of Conveyance</th>  
                            <th>Amount TK.</th>  
                            <th>remarks</th>  
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $conveyance_vouchers as $conveyance_voucher )
                              <tr>
                                    <td>{{ $conveyance_voucher->id }}</td>
                                    <td>{{ $conveyance_voucher->date }}</td>
                                    <td>{{ $conveyance_voucher->user->name }}</td>
                                    <td>{{ $conveyance_voucher->from_location }}</td>
                                    <td>{{ $conveyance_voucher->to_location }}</td>
                                    <td>{{ $conveyance_voucher->conveyance->name }}</td>
                                    <td>{{ $conveyance_voucher->amount }}</td>
                                    <td>{{ $conveyance_voucher->remarks }}</td>
                                    
                                    <td>
                                        <div class="actions">
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