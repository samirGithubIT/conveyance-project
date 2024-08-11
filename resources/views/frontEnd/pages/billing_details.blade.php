@extends('frontEnd.layout.master')

@section('content')

    <div class="container" style="margin-top: 180px">
        <div class="row">
            <div class="col-12">
                 <div class="card">
                    <div class="card-header">
                        <h5>Billing Details of <strong>{{ Auth::user()->name }}</strong></h5>
                    </div>
                    <div class="card-body">
                            
                                {{-- <form action="" method="post">
                                    @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" >Name of Employee</label>
                                        <input type="text" name="employee_name" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="">Designation</label>
                                        <input type="text" name="designation_name" class="form-control">
                                    </div>

                                </div>
                                </form> --}}

                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <td>Date</td>
                                    <td>from</td>
                                    <td>to</td>
                                    <td>Mode of Conveyance</td>
                                    <td>Amount TK. </td>
                                    <td>Remarks</td>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($conveyance as $voucher )
                                   <tr>
                                    <td>{{ $voucher->date }}</td>
                                    <td>{{ $voucher->from }}</td>
                                    <td>{{ $voucher->to }}</td>
                                    <td>{{ $voucher->conveyance->name }}</td>
                                    <td>{{ $voucher->amount }}</td>
                                    <td>{{ $voucher->remark }}</td>
                                   </tr>
                               @endforeach
                            </tbody>
                        </table>

                        <button type="submit" class="btn btn-outline-primary my-5">Submit</button>
                    </div>
                 </div>
            </div>
    </div>

@endsection