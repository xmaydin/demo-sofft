@extends('admin.includes.app')
@section('content')

    <div class="row">
        <div class="col-md-12 table-bordered" style="margin-top: 60px; padding: 20px; background-color: #f8f8f8">
            <form method="post" action="">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Position</label>
                    <input type="text" class="form-control" name="position" placeholder="Position">
                </div>
                <div class="form-group">
                    <label>Office</label>
                    <input type="text" class="form-control" name="office" placeholder="Office">
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" class="form-control" name="age" placeholder="Age">
                </div>
                <div class="form-group">
                    <label>Salary</label>
                    <input type="number" class="form-control" name="salary" placeholder="Salary">
                </div>
                <button type="submit" class="btn btn-primary btn-md">Submit</button>
            </form>
        </div>
    </div>
@endsection
