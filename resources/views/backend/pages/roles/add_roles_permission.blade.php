@extends('dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <a href="{{ route('all.roles.permission') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Back</a>
                            </ol>
                        </div>
                        <h4 class="page-title">Add Role In Permission</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">


                <div class="col-lg-8 col-xl-12">
                    <div class="card">
                        <div class="card-body">



                            <!-- end timeline content-->

                            <div class="tab-pane" id="settings">
                                <form id="myForm" method="post" action="{{ route('role.permission.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Add Role In Permission</h5>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="firstname" class="form-label">All Roles </label>
                                                <select name="role_id" class="form-select" id="example-select">
                                                    <option selected disabled >Select Roles  </option>
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}"> {{ $role->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" value="" id="customckeck15">
                                            <label class="form-check-label" for="customckeck15">Select All</label>
                                        </div>

                                        <hr>

                                        @foreach($permission_groups as $key=>$group)
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check mb-2 form-check-primary">
                                                    <input class="form-check-input" type="checkbox" value="" id="customckeck{{$key}}">
                                                    <label class="form-check-label" for="customckeck{{$key}}">{{ $group->group_name }}</label>
                                                </div>

                                            </div>

                                            @php
                                                $permission_groupby_name = App\Models\User::getpermissiongroupbyname($group->group_name);
                                            @endphp


                                            <div class="col-9">
                                                @foreach($permission_groupby_name as $name)
                                                <div class="form-check mb-2 form-check-primary">
                                                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $name->id }}" id="customckeck2{{$name->id}}">
                                                    <label class="form-check-label" for="customckeck2{{$name->id}}">{{ $name->name }}</label>
                                                </div>
                                                @endforeach
                                                    <br>
                                            </div>

                                        </div> <!-- end row -->
                                        @endforeach

                                    </div> <!-- end row -->



                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end settings content-->


                        </div>
                    </div> <!-- end card-->

                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

<script type="text/javascript">
    $('#customckeck15').click(function (){
        if($(this).is(':checked')){
            $('input[type = checkbox]').prop('checked',true);
        }else {
            $('input[type = checkbox]').prop('checked',false);
        }
    })
</script>
    <style>
        .form-check-label{
            text-transform: capitalize;
        }
    </style>

@endsection
