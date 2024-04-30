<!-- CONTENT -->
<section id="content">
<!-- NAVBAR -->
<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<div class="dropdown">
    <img src="{{ auth()->user()->image }}" width="100%" alt="Profile">
    <div class="dropdown-content">
        <div class="info-item">
            <span class="info-label">Name: {{ auth()->user()->name }} </span>
        </div>
        <div class="info-item">
            <span class="info-label">Email: {{ auth()->user()->email }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Role: {{ auth()->user()->role }}</span>
        </div>
        <a href="{{ route('user.logout') }}" class="info-label">Logout</a>
    </div>
</div>
		</nav>
		<!-- NAVBAR -->
		