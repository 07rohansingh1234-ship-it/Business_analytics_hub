










@extends('layouts.app')

@section('title', 'Add Department')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add New Department</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.departments.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">Department Name</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                placeholder="Enter department name">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-4">

                            <label class="form-label">Description</label>

                            <textarea
                                name="description"
                                rows="5"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Enter department description">{{ old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('admin.departments.index') }}"
                               class="btn btn-secondary">

                                Back

                            </a>

                            <button type="submit" class="btn btn-primary">

                                Add Department

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

<!-- 


<h2>ADD DEPARTMENT </h2>
<form style="padding:5px;border:1px solid black;width:40%;margin:top 5px">
    <label for="Name">Department Name :</label>
    <input type="text" name="Name">
    <br/>
      <br/>
    <label for="Description">Description : </label><br/><textarea rows=4 cols=15></textarea>
</br></br>
<button style="padding:5px;width:100px;background-color:blue;color:white;border-radius:20px;cursor:pointer;">ADD</button>
    
 -->
