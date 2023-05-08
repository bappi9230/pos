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
                                <a href="{{ route('export') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Download Xlsx</a>
                                <a href="{{ route('all.product') }}" class="btn btn-success rounded-pill waves-effect waves-light mx-1">Back</a>
                            </ol>
                        </div>
                        <h4 class="page-title">Import Product</h4>
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
                                <form id="myForm" method="post" action="{{ route('import') }}" enctype="multipart/form-data">
                                    @csrf


                                    <div class="row">


                                        <div class="col-md-12">
                                            @if(isset($errors) && $errors->any())
                                                @foreach($errors->all() as $error)
                                                    <div class="text-danger">
                                                        {{ $error }}
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="form-group mb-3">
                                                <label for="firstname" class="form-label">Xlsx file Import</label>
                                                <input type="file" name="import_file" class="form-control"   >

                                            </div>
                                        </div>


                                    </div> <!-- end row -->



                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Upload </button>
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





@endsection
