@extends('frontEnd.layout.master')

@section('content')

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-success">
                    <h4><strong>welcome to the voucher</strong></h4> <br>
                    <h5>please enter your details in this voucher</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('voucher-form.store') }}" method="POST">
                        @csrf
        
                        <div class="mb-3">
                            <label for="" class="form-label"> Select Date </label>
                            <input type="date" name="created_at" id="" class="form-control">
        
                            @error('created_at')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            {{-- user id find korar jonno --}}
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 
                        </div>
        
                       <div class="row justify-content-around">

                        <div class="mb-3 col-6">
                            <label for="" class="form-label"> From -</label>
                            <input type="text" name="from_location" id="" class="form-control" value="{{ old('from_location') }}">
        
                            @error('from_location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="mb-3 col-6">
                            <label for="" class="form-label"> - To </label>
                            <input type="text" name="to_location" id="" class="form-control" value="{{ old('to_location') }}">
        
                            @error('to_location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                       </div>
        
                       <div class="row">

                        <div class="mb-3 col-6">
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

                        <div class="mb-3 col-6">
                            <label for="" class="form-label"> People with you </label>
                            <input type="text" name="companions_count" id="" class="form-control">
        
                            @error('companions_count')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                       </div>
                       
                        <div class="mb-3">
                            <label for="" class="form-label"> Amount tk. </label>
                            <input type="text" name="amount" id="" class="form-control" value="{{ old('amount') }}">
        
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="" class="form-label"> Remarks (optional) </label>
        
                            <textarea name="remarks" id="" cols="30" class="form-control"  value="{{ old('remarks') }}"></textarea>
                        </div>
        
                        <button type="submit" class="btn btn-primary py-2 px-4">Add</button>
        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

