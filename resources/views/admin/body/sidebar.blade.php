<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!-- User details -->
   

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
                <a href="{{route('dashboard')}}" class="waves-effect">
                    <i class="ri-dashboard-line"></i>
                    <!-- <span class="badge rounded-pill bg-success float-end">3</span> -->
                    <span>Dashboard</span>
                </a>
            </li>
         
            <!-- Home Slider -->
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Home Slide Setup</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    
                    <li><a href="{{ route('home.slide') }}">Home Slide</a></li>
                </ul>
            </li>

            <!-- About Page -->
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-layout-3-line"></i>
                    <span>About Page Setup</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li>  <a href="{{ route('home.about') }}" class="has-arrow">About Page </a> </li>
                    <li>  <a href="{{ route('about.multi.image') }}" class="has-arrow">About Multi Image </a> </li>
                    <li>  <a href="{{ route('all.multi.image') }}" class="has-arrow">All Multi Image </a> </li>
                   
                </ul>
            </li>

            <!-- Portfolio -->
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-layout-3-line"></i>
                    <span>Portfolio Page Setup</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li>  <a href="{{ route('all.portfolio') }}" class="has-arrow">All Portfolio </a> </li>
                    <li>  <a href="{{ route('add.portfolio') }}" class="has-arrow">Add Portfolio </a> </li>                  
                   
                </ul>
            </li>

            <li class="menu-title">Pages</li>

            <!-- Blog Category -->
            <li> 
                
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>Blog Category</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.blog.category')}}">All Blog Category</a></li>
                    <li><a href="{{ route('add.blog.category')}}">Add Blog Category</a></li>                   
                </ul>
            </li>

            <!-- Blog Category -->
            <li> 
                
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>Blogs</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.blog')}}">All Blog </a></li>
                    <li><a href="{{ route('add.blog') }}">Add Blog </a></li>                
                </ul>
            </li>
            
            <!-- Blog Category -->
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Footer</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href=" {{ route('footer.info')}}">Footer Section</a></li>
               
                </ul>
            </li>

            <!-- Blog Category -->
            <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-profile-line"></i>
                <span> Contact Message </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href=" {{ route('contact.messages')}}"> Messages </a></li>
            
            </ul>
        </li>          

        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>