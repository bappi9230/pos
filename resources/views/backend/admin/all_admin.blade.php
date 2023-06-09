@extends('dashboard')
@section('admin')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <a href="{{ route('add.admin') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Add Admin </a>
                            </ol>
                        </div>
                        <h4 class="page-title">All Admin <span class="badge badge-pill bg-danger">{{ count($all_admin_user) }}</span></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>

                                </thead>

                                <tbody>
                                @foreach($all_admin_user as $key=>$item)

                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><img src="{{asset($item->photo)}}" style="width: 50px;height: 40px"></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>
                                            @foreach($item->roles as $role)
                                                <span class="badge badge-pill bg-success">{{ $role->name }} </span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.admin.user',$item->id) }}" class="btn btn-info sm" title="Edit" ><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.delete.user',$item->id) }}" class="btn btn-danger sm" title="Delete" id="delete" ><i class="fa fa-trash" ></i></a>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->




        </div> <!-- container -->

    </div> <!-- content -->


@endsection

