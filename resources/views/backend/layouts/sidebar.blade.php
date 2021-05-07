<div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="{{url('/')}}"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="{{route('quiz.index')}}"><i class="menu-icon icon-bullhorn"></i>View Quiz </a>
                                </li>
                                <li><a href="{{route('quiz.create')}}"><i class="menu-icon icon-inbox"></i>Create Quiz  </a></li>
                                    <!-- 19</b>  -->
                                    </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
    
                                <li><a href="{{route('question.index')}}"><i class="menu-icon icon-bullhorn"></i>View Question </a>
                                </li>
                                <li><a href="{{route('question.create')}}"><i class="menu-icon icon-inbox"></i>Create Question  </a></li>
                                    
                            </ul>
                            <ul class="widget widget-menu unstyled">
    
                                <li><a href="{{route('user.index')}}"><i class="menu-icon icon-bullhorn"></i>View User </a>
                                </li>
                                <li><a href="{{route('user.create')}}"><i class="menu-icon icon-inbox"></i>Create User  </a></li>
                                    
                            </ul>
                            
                            <ul class="widget widget-menu unstyled">
    
                                <li><a href="{{route('exam.assign')}}"><i class="menu-icon icon-bullhorn"></i>Assign Exam </a>
                                </li>
                                <li><a href="{{route('exam.view')}}"><i class="menu-icon icon-inbox"></i>View exam for User </a></li>
                                    
                            </ul>

                             <ul class="widget widget-menu unstyled">
    
                                <li><a href="{{route('examResult')}}"><i class="menu-icon icon-inbox"></i>View Result </a></li>
                                    
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                           
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                
                                <li>
                                
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="menu-icon icon-signout"></i>{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
                                </li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->