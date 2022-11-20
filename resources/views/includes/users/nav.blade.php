				
				
				<nav id="primary-menu">
                    
                    	<ul>
                        	<li><a href="{{ route('student.home')}}"><div>Home</div></a></li>
                            
                            <li><a href="#"><div>Apply</div></a>
                                <ul>
                                    <li><a href="{{ route('student.undergrad')}}"><div>UTME</div></a></li>
                                    <li><a href="{{ route('student.de')}}"><div>Direct Entry</div></a></li>
                                    <li><a href="{{ route('student.transfer')}}"><div>Transfer</div></a></li>
                                    <li><a href="{{ route('student.pg')}}"><div>PG</div></a></li>
                                </ul>
                            </li>
                            
                            <li><a href="https://www.veritas.edu.ng" target="_blank"><div>Veritas Website</div></a></li>
                            
                           <li>
       								<a href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                  				<form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
      							</li>
                            
						</ul>

					</nav>
					
				