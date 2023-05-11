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
                                <a href="{{ route('add.roles.permission') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Add Role & Permission </a>
                            </ol>
                        </div>
                        <h4 class="page-title">All Permission</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <table class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Permission Name </th>
                                    <th>Permissions Name</th>
                                    <th width="18%">Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($roles as $key=> $role)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $role->name }}</td>

                                        <td>
                                            @foreach($role->permissions as $permission)
                                                <span class="badge badge-pill bg-success"> {{ $permission->name }}</span>
                                            @endforeach
                                        </td>
                                        <td width="18%">
                                            <a href="{{ route('admin.edit.role.permission',$role->id) }}" class="btn btn-blue waves-effect waves-light" title="Edit Item"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('delete.role.permission',$role->id) }}" class="btn btn-danger waves-effect waves-light" id="delete" title="Delete Item"><i class="fa fa-trash"></i></a>
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
