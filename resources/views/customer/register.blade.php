@extends('mylayout.app')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="text-end">
                <a href="{{ Route('customer#list') }}"><button class="btn btn-primary my-2">List Page</button></a>
            </div>
            <div class="card">
                <div class="card-header fs-3 text-center bg-dark text-white">Customer Registeration Form</div>
                <div class="card-body">
                    @if (Session::has('insertSuccess'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('insertSuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('customer#create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="userName" id="" class="form-control" value="{{ old('userName') }}">
                            @if ($errors->has('userName'))
                                <p class="text-danger">{{ $errors->first('userName') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="userEmail" id="" class="form-control"
                                value="{{ old('userEmail') }}">
                            @if ($errors->has('userEmail'))
                                <p class="text-danger">{{ $errors->first('userEmail') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Address</label>
                            <textarea name="userAddress" id="" cols="30" rows="5" class="form-control">{{ old('userAddress') }}</textarea>
                            @if ($errors->has('userAddress'))
                                <p class="text-danger">{{ $errors->first('userAddress') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Gender</label>
                            <select name="userGender" id="" class="form-control" value="{{ old('userGender') }}">
                                <option value="">Choose Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="0">Others</option>
                            </select>
                            @if ($errors->has('userGender'))
                                <p class="text-danger">{{ $errors->first('userGender') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="number" name="userPhone" id="" class="form-control"
                                value="{{ old('userPhone') }}">
                            @if ($errors->has('userPhone'))
                                <p class="text-danger">{{ $errors->first('userPhone') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Date of Birth</label>
                            <input type="date" name="userDateOfBirth" id="" class="form-control"
                                value="{{ old('userDateOfBirth') }}">
                            @if ($errors->has('userDateOfBirth'))
                                <p class="text-danger">{{ $errors->first('userDateOfBirth') }}</p>
                            @endif
                        </div>
                        <div class="mb-3 float-end">
                            <input type="submit" value="Register" class="form-control btn btn-dark text-white">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
