<!-- SIDEBAR -->
<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="">
				<a href="{{ route('index') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Home</span>
				</a>
			</li>
			<li>
			<a href="{{ route('admin.addCategory') }}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Add Category</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.addProduct') }}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Add Product</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.Productdash') }}">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Show product</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="{{ route('user.logout') }}" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
    	
