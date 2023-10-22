<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href= {{ asset('adminnew/adminhub-master/style.css') }} >

	<title>AdminHub</title>
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
			<li>
				<a href="{{ route('livestockIndex') }}">
                    <i class="bx fa-solid fa-piggy-bank"></i>
                    <span class="text">Livestock</span>
				</a>
			</li>
			<li>
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
			<li>
				<a href="{{ route('announcementIndex') }}">
                    <i class='bx bx-bell'></i>
                    <span class="text">Announcement</span>
				</a>
			</li>
            <li class="active">
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
                    <button class="btn btn-danger d-flex" type="submit">
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
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link"></a>
		</nav>
		<!-- NAVBAR -->
		<main>
			@yield('tutorial')
		</main>
		<!-- MAIN -->

		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

    <script src={{ asset('adminnew/adminhub-master/script.js') }}></script>

</body>
</html>