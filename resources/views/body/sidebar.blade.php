<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('backend/assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                 class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                   data-bs-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->

        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('dashboard') }}" >
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>


                @if(Auth::user()->can('pos.menu'))
                <li>
                    <a href="{{ route('pos') }}" >
                        <span class="badge bg-pink float-end">Hot</span>
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Pos </span>
                    </a>
                </li>
                @endif



                <li class="menu-title mt-2">Apps</li>



                <!--========= Start employee manage ==================-->

                @if(Auth::user()->can('employee.menu'))
                <li>
                    <a href="#employee" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Employee Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="employee">
                        <ul class="nav-second-level">

                            @if(Auth::user()->can('employee.all'))
                            <li>
                                <a href="{{ route('all.employee') }}">All Employee</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('employee.add'))
                            <li>
                                <a href="{{ route('add.employee') }}">Add Employee</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                <!--========= end employee manage ==================-->




            <!--========= start Customer manage ==================-->
                @if(Auth::user()->can('customer.menu'))
                <li>
                    <a href="#Customer" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Customer Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Customer">
                        <ul class="nav-second-level">
                            @if(Auth::user()->can('customer.all'))
                            <li>
                                <a href="{{ route('all.customer') }}">All Customer</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('customer.add'))
                            <li>
                                <a href="{{ route('add.customer') }}">Add Customer</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                <!--========= End Customer manage ==================-->


                <!--========= start Supplier manage ==================-->
                @if(Auth::user()->can('supplier.menu'))
                <li>
                    <a href="#Supplier" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Supplier Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Supplier">
                        <ul class="nav-second-level">
                            @if(Auth::user()->can('supplier.all'))
                            <li>
                                <a href="{{ route('all.supplier') }}">All Supplier</a>
                            </li>
                            @endif
                                @if(Auth::user()->can('supplier.add'))
                            <li>
                                <a href="{{ route('add.supplier') }}">Add Supplier</a>
                            </li>
                                @endif
                        </ul>
                    </div>
                </li>
                @endif
                <!--========= End Supplier manage ==================-->

                <!--========= Employee Salary manage ==================-->
                @if(Auth::user()->can('salary.menu'))
                <li>
                    <a href="#salary_manage" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Employee Salary  </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="salary_manage">
                        <ul class="nav-second-level">
                            @if(Auth::user()->can('salary.add'))
                            <li>
                                <a href="{{ route('add.advance.salary') }}">Add Advance Salary</a>
                            </li>
                            @endif

                            @if(Auth::user()->can('salary.all'))
                            <li>
                                <a href="{{ route('all.advance.salary') }}">All Advance Salary</a>
                            </li>
                            @endif

                            @if(Auth::user()->can('salary.pay'))
                            <li>
                                <a href="{{ route('pay.salary') }}">Pay Salary</a>
                            </li>
                            @endif

                            @if(Auth::user()->can('salary.paid'))
                            <li>
                                <a href="{{ route('month.salary') }}">Last Month Salary</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                <!--========= End Employee Salary manage ==================-->


                <!--========= Start Attendance manage ==================-->
                @if(Auth::user()->can('attendence.menu'))
                <li>
                    <a href="#attendence" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Employee Attendance </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="attendence">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('employee.attend.list') }}">Employee Attendence List </a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif
                <!--========= End Attendance manage ==================-->


                <!--========= Start Category manage ==================-->
                @if(Auth::user()->can('category.menu'))
                <li>
                    <a href="#category" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="category">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.category') }}">All Category </a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif
                <!--========= End Category manage ==================-->

                <!--========= Start Products manage ==================-->
                @if(Auth::user()->can('product.menu'))
                <li>
                    <a href="#Product" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Products </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Product">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.product') }}">All Product </a>
                            </li>
                            <li>
                                <a href="{{ route('add.product') }}">Add Product </a>
                            </li>
                            <li>
                                <a href="{{ route('import.product') }}">Import Product </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                <!--========= End Products manage ==================-->

                <!--========= Start Order Status  ==================-->
                @if(Auth::user()->can('orders.menu'))
                <li>
                    <a href="#orders" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Orders  </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="orders">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('pending.order') }}">Pending Orders </a>
                            </li>

                            <li>
                                <a href="{{ route('complete.product') }}">Complete Orders </a>
                            </li>
                            <li>
                                <a href="{{ route('pending.due') }}">Pending Due </a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif
                <!--========= End Order Status  ==================-->



                <!--========= Start Stoke Manage ==================-->
                @if(Auth::user()->can('stock.menu'))
                <li>
                    <a href="#stock" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Stock Manage  </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="stock">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('stock.manage') }}"> Stock </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                <!--========= End Stoke Manage  ==================-->

                <!--========= Start Role and Permission ==================-->
                @if(Auth::user()->can('roles.menu'))
                <li>
                    <a href="#permission" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Role and Permission  </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="permission">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.permission') }}"> All Permission </a>
                            </li>
                            <li>
                                <a href="{{ route('all.roles') }}">All Roles </a>
                            </li>
                            <li>
                                <a href="{{ route('add.roles.permission') }}">Add Roles & Permission </a>
                            </li>
                            <li>
                                <a href="{{ route('all.roles.permission') }}">All Roll & Permission </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                <!--========= End Role and Permission  ==================-->


                <!--========= Start All Admin User ==================-->
                @if(Auth::user()->can('setting.menu'))
                <li>
                    <a href="#admin" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Setting Admin User </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="admin">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.admin.user') }}"> All Admin</a>
                            </li>
                            <li>
                                <a href="{{ route('add.admin') }}">Add Admin </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                <!--========= End All Admin User  ==================-->


                <li class="menu-title mt-2">Custom</li>


                <!--========= Start Expense manage ==================-->
                @if(Auth::user()->can('expense.menu'))
                <li>
                    <a href="#expense" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span>Expense Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="expense">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('add.expense') }}">Add Expense </a>
                            </li>
                            <li>
                                <a href="{{ route('daily.expense') }}">Today Expense </a>
                            </li>

                            <li>
                                <a href="{{ route('monthly.expense') }}">Monthly Expense </a>
                            </li>
                            <li>
                                <a href="{{ route('yearly.expense') }}">Yearly Expense </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                <!--========= End Expense manage ==================-->


                <!--========= Start Database Backup ==================-->
                @if(Auth::user()->can('expense.menu'))
                    <li>
                        <a href="#backup" data-bs-toggle="collapse">
                            <i class="mdi mdi-email-multiple-outline"></i>
                            <span>Database Backup</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="backup">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('database.backup') }}">Backup</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                <!--========= End Expense manage ==================-->


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
