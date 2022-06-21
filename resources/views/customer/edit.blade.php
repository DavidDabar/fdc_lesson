@extends('mylayout.app')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
            <div class="card mb-5">
                <div class="card-header text-center fs-3 bg-dark text-white">
                    Customer Edit
                </div>
                @if (Session::has('updateSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('updateSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('customer#update', $customer->customer_id) }}" method="POST">
                        @csrf
                        <div class="my-3">
                            <label for="">Name </label>
                            <input type="text" name="userName" id="" class="form-control"
                                value="{{ old('userName', $customer->name) }}">
                            @if ($errors->has('userName'))
                                <p class="text-danger">{{ $errors->first('userName') }}</p>
                            @endif
                        </div>
                        <div class="my-3">
                            <label for="">Email </label>
                            <input type="email" name="userEmail" id="" class="form-control"
                                value="{{ old('userEmail', $customer->email) }}">
                            @if ($errors->has('userEmail'))
                                <p class="text-danger">{{ $errors->first('userEmail') }}</p>
                            @endif
                        </div>
                        <div class="my-3">
                            <label for="">Address </label>
                            <textarea name="userAddress" id="" cols="30" rows="4" class="form-control">{{ old('userAddress', $customer->address) }}
                                </textarea>
                            @if ($errors->has('userAddress'))
                                <p class="text-danger">{{ $errors->first('userAddress') }}</p>
                            @endif
                        </div>
                        <div class="my-3">
                            <label for="">Gender </label>
                            <select name="userGender" id="" class="form-select">
                                @if ($customer->gender == 1)
                                    <option value="">Choose Gender</option>
                                    <option value="1" selected>Male</option>
                                    <option value="2">Female</option>
                                    <option value="0">Others</option>
                                @elseif ($customer->gender == 2)
                                    <option value="">Choose Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2" selected>Female</option>
                                    <option value="0">Others</option>
                                @elseif ($customer->gender == 0)
                                    <option value="">Choose Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="0" selected>Others</option>
                                @else
                                    <option value="" selected>Choose Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="0">Others</option>
                                @endif
                            </select>
                            @if ($errors->has('userGender'))
                                <p class="text-danger">{{ $errors->first('userGender') }}</p>
                            @endif
                        </div>
                        <div class="my-3">
                            <label for="">Phone </label>
                            <input type="number" name="userPhone" id="" class="form-control"
                                value="{{ old('userPhone', $customer->phone) }}">
                            @if ($errors->has('userPhone'))
                                <p class="text-danger">{{ $errors->first('userPhone') }}</p>
                            @endif
                        </div>
                        <div class="my-3">
                            <label for="">Date of Birth </label>
                            <input type="date" name="userDateOfBirth" id="" class="form-control"
                                value="{{ old('userDateOfBirth', $customer->date_of_birth) }}">
                            @if ($errors->has('userDateOfBirth'))
                                <p class="text-danger">{{ $errors->first('userDateOfBirth') }}</p>
                            @endif
                        </div>
                        <div class="float-end">
                            <input type="submit" value="Update" class="btn btn-sm btn-danger">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="float-start">
                        <a href="{{ route('customer#list') }}"><button class="btn btn-dark btn-sm">Back</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
