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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Paid Salary History </a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Paid Salary History</h4>
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

                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Paid Salary History</h5>

                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Employee Name :    </label>
                                                <strong  style="color:#000;">{{ $paysalary->employee->name }}</strong>

                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Salary Month :  </label>
                                                <strong style="color: #000;">{{ date("F", strtotime('-1 month')) }}</strong>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Employe Salary :   </label>
                                                <strong style="color: #000;">{{ $paysalary->paid_amount }}</strong>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Advnace Salary :   </label>
                                                <strong style="color: #000;">{{ $paysalary->advance_salary }}</strong>
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Due Salary :    </label>
                                                <strong style="color: #000;">{{ $paysalary->due_salary }}</strong>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Salary Status :   </label>
                                                <strong style="color: green;"> Paid </strong>
                                            </div>
                                        </div>

                                    </div> <!-- end row -->

                                    <div class="text-end">
                                        <a href="{{ route('month.salary') }}" type="btn" class="btn btn-success waves-effect waves-light mt-2">Back</a>
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
