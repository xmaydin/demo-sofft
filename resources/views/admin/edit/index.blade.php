@extends('admin.includes.app')
@section('content')

    <div class="row">
        <div class="col-md-12 table-bordered" style="margin-top: 60px; padding: 20px; background-color: #f8f8f8">
            @if(session("status"))
                <div class="alert alert-info" role="alert">
                    {{session("status")}}
                </div>
            @endif
            <form method="post" action=" {{ route('admin.edit.post', ['id' => $personel[0]['id']]) }}">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{$personel[0]['name']}}">
                    @error('name')
                    <li style="color: darkred">{{ $message }}</li>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Position</label>
                    <input type="text" class="form-control" name="position" placeholder="Position" value="{{ $personel[0]['position'] }}">
                    @error('position')
                    <li style="color: darkred">{{ $message }}</li>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Office</label>
                    <input type="text" class="form-control" name="office" placeholder="Office" value="{{ $personel[0]['office'] }}">
                    @error('office')
                    <li style="color: darkred">{{ $message }}</li>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" class="form-control" name="age" placeholder="Age" value="{{ $personel[0]['age'] }}">
                    @error('age')
                    <li style="color: darkred">{{ $message }}</li>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Salary</label>
                    <input type="text" class="form-control" name="salary" placeholder="Salary" value=" {{ $personel[0]['salary'] }}">
                    @error('salary')
                    <li style="color: darkred">{{ $message }}</li>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-md">Submit</button>
            </form>
        </div>
    </div>
@endsection
