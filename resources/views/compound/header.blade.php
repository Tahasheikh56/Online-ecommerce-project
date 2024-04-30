 <!-- ***** Header Area Start ***** -->
 <header class="header-area header-sticky">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <nav class="main-nav">
                     <!-- ***** Logo Start ***** -->
                     <a href="index.html" class="logo">
                         <img src="assets/images/logo.png">
                     </a>
                     <!-- ***** Logo End ***** -->
                     <!-- ***** Menu Start ***** -->
                     <ul class="nav">
                         <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                         <li class="scroll-to-section"><a href="#men">Men's</a></li>
                         <li class="scroll-to-section"><a href="#women">Women's</a></li>
                         <li class="scroll-to-section"><a href="#kids">Kid's</a></li>
                         <li class="submenu">
                             <a href="javascript:;">Pages</a>
                             <ul>
                                 <li><a href="about.html">About Us</a></li>
                                 <li><a href="products.html">Products</a></li>
                                 <li><a href="single-product.html">Single Product</a></li>
                                 <li><a href="contact.html">Contact Us</a></li>
                             </ul>
                         </li>
                         <li class="submenu">
                             <a href="javascript:;">Features</a>
                             <ul>
                                 <li><a href="#">Features Page 1</a></li>
                                 <li><a href="#">Features Page 2</a></li>
                                 <li><a href="#">Features Page 3</a></li>
                                 <li><a rel="nofollow" href="https://templatemo.com/page/4" target="_blank">Template Page 4</a></li>
                             </ul>
                         </li>
                         <li class="scroll-to-section"><a href="#explore">Explore</a></li>
                         @if(auth()->user())
                         <div class="dropdown">
                             <button class="btn btn-dark dropdown-toggle" type="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Profile
                             </button>
                             <div class="dropdown-menu" aria-labelledby="profileDropdown">
    <!-- User Image -->
    <div class="d-flex justify-content-center mb-2">
        <img src="{{ auth()->user()->image }}" width="100%" alt="Profile Image" class="rounded-circle" style="width: 100px; height: 100px;">
    </div>

    <!-- Username and Role -->
    <p class="dropdown-item">Username: {{ auth()->user()->name }}</p>
    <p class="dropdown-item">Role: {{ auth()->user()->role }}</p>

    @if(auth()->user()->role === "Admin")
    <a class="dropdown-item btn btn-success" href="{{ route('admin.index') }}">Dashboard</a>
    @endif

    <!-- Divider -->
    <div class="dropdown-divider"></div>
    
    <!-- Logout Button -->
    <div class="d-flex justify-content-center">
        <a class="btn btn-danger" href="{{ route('user.logout') }}">Logout</a>
    </div>
</div>

                         @else
                         <li><a href="{{ route('login') }}">Login</a></li>
                         @endif
                     </ul>

                     <a class='menu-trigger'>
                         <span>Menu</span>
                     </a>
                     <!-- ***** Menu End ***** -->
                 </nav>
             </div>
         </div>
     </div>
 </header>
 <!-- ***** Header Area End ***** -->