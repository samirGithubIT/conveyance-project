@extends('frontEnd.layout.master')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>welcome to the voucher</h4> <br>
            <h5>please enter your details in this voucher</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('voucher-from.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="" class="form-label"> Select Date </label>
                    <input type="date" name="date" id="" class="form-control">

                    @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Employee</label>
                    <input type="text" name="employee_id" class="form-control" >
                        {{-- <option value="{{ $employee->id }}">{{ $employee->name }} - ({{ $employee->designation->name }})</option> --}}
                        {{-- @if ($employee->emolyee_id == $emolyee->id)
                        selected
                        @endif --}}

                    @error('employee_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label"> From -</label>
                    <input type="text" name="from_location" id="" class="form-control">

                    @error('from_location')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label"> - To </label>
                    <input type="text" name="to_location" id="" class="form-control">

                    @error('to_location')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

               <div class="mb-3">
                    <label for="" class="form-label">Select Mode of Conveyance</label>
                    <select name="conveyance_id" id="#" class="form-select">
                        <option value="">-- SELECT --</option>
                        @foreach ( $conveyance_list as $modeOfConvience_id => $name)

                        <option value="{{ $modeOfConvience_id }}">{{ $name }}</option>
                            
                        @endforeach
                    </select>

                    @error('conveyance_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="mb-3">
                    <label for="" class="form-label"> Amount tk. </label>
                    <input type="text" name="amount" id="" class="form-control">

                    @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label"> Remarks (optional) </label>
                    <input type="text" name="remarks" id="" class="form-control">

                    @error('remarks')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary py-2">Add</button>

            </form>
        </div>
    </div>
</div>

@endsection