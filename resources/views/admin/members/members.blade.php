<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">

	<link rel="stylesheet" href= {{ asset('adminnew/adminhub-master/style.css') }} >

	<title>Hogme</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">HOGME</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href={{ route('admindashboard') }}>
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li >
				<a href="{{ route('livestockIndex') }}">
                    <span class="material-icons-sharp">
						savings
					</span>
                    <span class="text">Livestock</span>
				</a>
			</li>
			<li class="active">
				<a href="{{ route('memberIndex') }}">
                    <i class='bx bx-user' ></i>
                    <span class="text">Members</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li class="">
				<a href="{{ route('announcementIndex') }}">
                    <i class='bx bx-bell'></i>
                    <span class="text">Announcement</span>
				</a>
			</li>
            <li>
				<a href="{{ route('tutorialIndex') }}">
                    <i class='bx bxs-videos'></i>
                    <span class="text">Tutorials</span>
				</a>
			</li>
            <li>
				<a href="#">
                    <i class='bx bx-task' ></i>
                    <span class="text">Schedule</span>
				</a>
			</li>
            <li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Order</span>
				</a>
			</li>
			<li>
				<a href="{{ route('inventoryIndex') }}">
					<i class='bx bx-bar-chart-alt' ></i>
					<span class="text">Sales, Inventory, and Expenses</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bx-line-chart' ></i>
					<span class="text">Investment</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">User Settings</span>
				</a>
			</li>
			<li>
                <form action="{{ route('adminLogout') }}" method="post" class="dropdown-item py-2 logout">

                    @csrf
                    @method('DELETE')

                    <button class="" type="submit">
                        <i class='bx bxs-log-out-circle' ></i>
                        <span class="text">Logout</span>
                    </button>

                </form>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
	<!-- CONTENT -->
	<section id="content">
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link"></a>
		</nav>

		<main>
			@yield('members')
		</main>
		<!-- MAIN -->

		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src={{ asset('adminnew/adminhub-master/script.js') }}></script>
    <script src="https://kit.fontawesome.com/bb8081d169.js" crossorigin="anonymous"></script>


</body>
</html>