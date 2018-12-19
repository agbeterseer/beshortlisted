<div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item ">
                            <a href="{{route('admin_dashboard')}}" class="nav-link nav-toggle start active open" >
                                <i class="icon-home"></i>
                                <span class="title">Admin Dashboard</span>
                                <span class="selected"></span>
                          
                            </a>
                      
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Features</h3>
                        </li>

                                <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle"  >
                                <i class=""></i>
                                <span class="title">Activity Log </span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{route('log.activity')}}" class="nav-link " data-toggle="tooltip" data-placement="top" title="logActivity">
                                        <span class="title">View User Activities</span>
                                    </a>
                                </li>
                   
                       
                            </ul>
          
                        </li>
                          <li class="nav-item   start active open">
                            <a href="javascript:;" class="nav-link nav-toggle"  >
                                <i class="icon-wallet"></i>
                                <span class="title">Menu System </span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                        <li class="nav-item ">
                                    <a href="{{route('menu.index')}}" class="nav-link"  data-toggle="tooltip" data-placement="top" title="menu system">
                                        <span class="title">Show Menu</span>
                                    </a>
                        </li> 
                   
                       
                            </ul>
          
                        </li>
                
                            <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle"  >
                                <i class="icon-user"></i>
                                <span class="title">User Account </span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{route('role.index')}}" class="nav-link " data-toggle="tooltip" data-placement="top" title="From Creating Roles, Assing Permissions to Roles...!">
                                        <span class="title">Manage Roles</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="{{ route('user.index') }}" class="nav-link " data-toggle="tooltip" data-placement="top" title="List of Users, and their roles">
                                        <span class="title">Manage Users</span>
                                    </a>
                                </li> 
                            <li class="nav-item">
                                    <a href="{{ route('profile.user_profile') }}" class="nav-link " data-toggle="tooltip" data-placement="top" title="user profile">
                                        <span class="title">User Profile</span>
                                    </a>
                                </li> 
                            </ul>
                        </li>
                             <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Staff Management</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                    <li class="nav-item  ">
                                    <a href="{{ route('auth.register') }}" class="nav-link " data-toggle="tooltip" data-placement="top" title="For new Employee, use this link to add new staff to the platform">
                                        <span class="title">Add New Staff</span>
                                    </a>
                                </li>
                            <li class="nav-item">
                   <a href="{{ route('processemployee.recently_created')}}" class="nav-link " data-toggle="tooltip" data-placement="top" title="List of Employee just Created">
                                        <span class="title">
                                              Recently created List
                                        </span>
                                    </a>
                                </li>
                             <li class="nav-item">
                   <a href="{{ route('admin.processemployee.review_on_board_process')}}" class="nav-link " data-toggle="tooltip" data-placement="top" title="List of Employee waiting your Approval">
                                        <span class="title">
                                              Confirm New Staff
                                        </span>
                                    </a>
                                </li>
                             <li class="nav-item">
                                    <a href="{{route('admin.index')}}" class="nav-link " data-toggle="tooltip" data-placement="top" title="List of all Employee of vairous Oganisations"> 
                                        <span class="title">
                                            
                                           List Of Staff By Organisation
                                        </span>
                                    </a>
                                </li> 
								 <li class="nav-item">
                                    <a href="{{route('show_finance.previlages')}}" class="nav-link " data-toggle="tooltip" data-placement="top" title="the finance person should have this privilage so payslip can carry their signature">
                                        <span class="title">Add finance privilage</span>
                                    </a>
                                </li> 
                            <!--     <li class="nav-item">
                                    <a href="#" class="nav-link ">
                                        <span class="title">Employee Performance</span>
                                    </a>
                                </li> --> 
                            </ul>
                        </li>
                                   <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-docs"></i>
                                <span class="title">Probation</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                 
                                <li class="nav-item  ">
                                    <a href="{{route('show_probation.list')}}" class="nav-link ">
                                        <span class="title"> Employees on Probation</span>
                                    </a>
                                </li>
          
                               
                            </ul>
                        </li>
                            <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                            
                                <i class="icon-bar-chart"></i>
                                <span class="title">Finance</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('payslip.index')}}" class="nav-link "  data-toggle="tooltip" data-placement="top" title="Add new payslip to the paltform">
                                        <span class="title">Create Payslip </span>
                                    </a>
                                </li>
                                  <li class="nav-item ">
                                    <a href="{{url('/admin/finance/search_employee')}}" class="nav-link"  data-toggle="tooltip" data-placement="top" title="Do you want to Modify Salaries? Here is the link">
                                        <span class="title">Salary adjustments</span>
                                    </a>
                                </li> 
                                <li class="nav-item ">
                                    <a href="{{url('/finance/organisation')}}" class="nav-link"  data-toggle="tooltip" data-placement="top" title=" Add salaries, income and deductions to payslip">
                                        <span class="title">Configure Employee Payslip</span>
                                    </a>
                                </li>
   
                                <li class="nav-item ">
                                    <a href="{{url('/admin/employees-due_for_payment')}}" class="nav-link"  data-toggle="tooltip" data-placement="top" title="Send payslip to payroll">
                                        <span class="title">Add Payslip To Payroll</span>
                                    </a>
                                </li> 
                                <li class="nav-item ">
                                    <a href="{{url('/admin/finance-payroll')}}" class="nav-link"  data-toggle="tooltip" data-placement="top" title="List of Payroll">
                                        <span class="title">Payroll</span>
                                    </a>
                                </li>   
                          
                      
                            </ul>
                        </li>
                            <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-globe"></i>
                                <span class="title">Manage Client </span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('organization.index')}}" class="nav-link" data-toggle="tooltip" data-placement="top" title="Add Clients Here">
                                        <span class="title">Clients</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a href="?p=" class="nav-link nav-toggle">
                                <i class="icon-wallet"></i>
                                <span class="title">Communication</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{url('/admin/questions')}}" class="nav-link " data-toggle="tooltip" data-placement="top" title="Employee Feedback and Response section">
                                        <span class="title">Respond To Employee Question</span>
                                    </a>
                                </li>  
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-bulb"></i>
                                <span class="title">Leave Mangement</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('leave.show_organisation')}}" class="nav-link " data-toggle="tooltip" data-placement="top" title="List of Employee awaiting leave approval">
                                        <span class="title">
                                        Approve Leave Request </span>
                                    </a>
                                </li>
                            </ul>
                                 <ul class="sub-menu"> 
                                <li class="nav-item  ">
                                    <a href="" class="nav-link">
                                        <span class="title">Leave Track</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
<!--                         <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-briefcase"></i>
                                <span class="title">Payroll</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                 
                                <li class="nav-item  ">
                                    <a href="table_bootstrap.html" class="nav-link ">
                                        <span class="title">Bootstrap Tables</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li> -->
                        <li class="nav-item  ">
                            <a href="?p=" class="nav-link nav-toggle">
                                <i class="icon-wallet"></i>
                                <span class="title">Benefit Adminstration</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{route('benefit.index')}}" class="nav-link " data-toggle="tooltip" data-placement="top" title="Search of Employee WITH PFA">
                                        <span class="title">Search for benefits</span>
                                    </a>
                                </li>
                                  <li class="nav-item  ">
                                    <a href="{{route('benefit.employees')}}" class="nav-link" data-toggle="tooltip" data-placement="top" title="List of Employee WITH PFA">
                                        <span class="title">Group Life Insurance </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
 <!--                
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-pointer"></i>
                                <span class="title">Notification</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                       
                                <li class="nav-item  ">
                                    <a href="maps_vector.html" class="nav-link ">
                                        <span class="title">Vector Maps</span>
                                    </a>
                                </li>
                            </ul>
                        </li> -->

                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-pointer"></i>
                                <span class="title">Disciplinary History</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('disciplinary.index')}}" class="nav-link " data-toggle="tooltip" data-placement="top" title="Here you will see Employees who have been disciplined">
                                        <span class="title">List Disciplinary History</span>
                                    </a>
                                </li>
                                      <li class="nav-item ">
                                    <a href="{{route('disciplinary.create')}}" class="nav-link " data-toggle="tooltip" data-placement="top" title="Upload Disciplinary form  to an Employee ">
                                        <span class="title">Add Disciplinary form</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Uploads</h3>
                        </li>
                    <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Signatures</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{route('signadmin.create')}}" class="nav-link " data-toggle="tooltip" data-placement="top" title="All Management will upload thier Signature here">
                                        <span class="title">Upload Signature</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                         <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-docs"></i>
                                <span class="title">Help</span>
                                <span class="arrow"></span>
                            </a>
                 <!--            <ul class="sub-menu">
                                 
                                <li class="nav-item  ">
                                    <a href="charts_google.html" class="nav-link ">
                                        <span class="title">Google Charts</span>
                                    </a>
                                </li>
                                 
                               
                            </ul> -->
                        </li>
                      <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-docs"></i>
                                <span class="title">Exit Policy</span>
                                <span class="arrow"></span>
                            </a>

                            <ul class="sub-menu"> 
                          <!--     <li class="nav-item ">
                                    <a href=" " class="nav-link ">
                                        <span class="title">Initiate Exit Check List</span>
                                    </a>
                                </li> -->
                                     <li class="nav-item active open">
                                    <a href="{{route('all.checklist')}}" class="nav-link ">
                                        <span class="title">List All Exit Check List</span>
                                    </a>
                                </li>
                                 
<!--                                 <li class="nav-item">
                                    <a href="" class="nav-link ">
                                        <span class="title">Exit Check List</span>
                                    </a>
                                </li> -->
                                                                  
                               
                            </ul>
                        </li>
               

<!-- icon-wrench" -->
                         
                
                    </ul>


                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>