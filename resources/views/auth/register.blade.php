<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        body {
            background: linear-gradient(to right, #0e4e57, #1b4ea7);
            color: #ffffff;
            margin-top: 180px;
        }
        .card {
            background: rgba(164, 255, 228, 0.15);
            border: none;
            backdrop-filter: blur(10px);
        }
        .card-header {
            background: rgba(255, 255, 255, 0.25);
            font-weight: bold;
            text-align: center;
        }
        .btn-primary {
            background-color: #6a11cb;
            border-color: #6a11cb;
        }
        .btn-primary:hover {
            background-color: #2575fc;
            border-color: #2575fc;
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #ffffff;
        }
        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.25);
            border-color: #6a11cb;
            box-shadow: none;
        }
        .text-sm {
            color: #ffffff;
        }
        .text-sm:hover {
            color: #2575fc;
        }
    </style>
</head>
<body>

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-4">
                <div class="card-header mb-4">
                    {{ __('Please register') }}
                </div>
                <div class="boxese">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <!-- Name -->
                            <div class="mb-3">
                                <x-input-label for="name" :value="__('Name')" class="form-label" />
                                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="text-danger mt-2" />
                            </div>
    
                            <!-- Email Address -->
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('Email')" class="form-label" />
                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="text-danger mt-2" />
                            </div>
    
                            <!-- Employee ID -->
                            <div class="mb-3">
                                <x-input-label for="identity" :value="__('identity')" class="form-label" />
                                <x-text-input id="identity" class="form-control" type="text" name="identity" :value="old('identity')" required autocomplete="Employee ID" />
                                <x-input-error :messages="$errors->get('identity')" class="text-danger mt-2" />
                            </div>
    
                            <!-- Department -->
                            <div class="mb-3">
                                <x-input-label for="department_id" :value="__('Department')" class="form-label" />
                                <select name="department_id" id="department" class="form-select">
                                    <option value="">-- SELECT --</option>
                                    
                                    @foreach ( $department_list as $department_id => $name)
            
                                    <option value="{{ $department_id }}">{{ $name }}</option>
                                        
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('department_id')" class="text-danger mt-2" />
                            </div>
                            <!-- Designation -->
                            <div class="mb-3">
                                <x-input-label for="designation_id" :value="__('Designation')" class="form-label" />
                                <select name="designation_id" id="designation" class="form-select">
                                    <option value="">-- SELECT --</option>
                                </select>
                                <x-input-error :messages="$errors->get('designation_id')" class="text-danger mt-2" />
                            </div>
    
                            <!-- Password -->
                            <div class="mb-3">
                                <x-input-label for="password" :value="__('Password')" class="form-label" />
                                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="text-danger mt-2" />
                            </div>
    
                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />
                                <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger mt-2" />
                            </div>
    
                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
    
                                <x-primary-button class="btn btn-primary ms-4">
                                    {{ __('Register') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- jqury CDN --}}
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

{{-- ajax  --}}
    <script>
        $(function(){

           var departmentEl = $('#department')
           var designationEl = $('#designation')

           $(departmentEl).change(function(e){
            var dept_id = e.target.value

            $.get('/data/department/'+ dept_id +'/designations', function(data){
                $(designationEl).html(data)
            })
           })

        })
    </script>


</body>
</html>


