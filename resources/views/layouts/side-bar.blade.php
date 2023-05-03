<!DOCTYPE html>
<html>
<head>

<style>

.table-container {
    margin-left: 200px;
}

.container {
    display: flex;
    justify-content: space-between;
}
.sidebar {
  width: 200px;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  background-color: #333;
  color: #fff;
  padding: 20px;
  z-index: 1;
  margin-top: 64px;
}

.sidebar ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.sidebar ul li {
  margin-bottom: 10px;
}

.sidebar ul li a {
  color: #fff;
  text-decoration: none;
  display: block;
  padding: 5px;
  transition: background-color 0.3s ease;
}

.sidebar ul li a:hover {
  background-color: #444;
}

.button {
  position: fixed;
  top: 64px;
  left: 200px;
  background-color: #333;
  color: #fff;
  padding: 10px;
  border: none;
  cursor: pointer;
  z-index: 1;
}

	</style>
</head>
<body>
<div class="container">
<div class="sidebar">
  <ul>
  <li>
  <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" style="color:white;">
                        {{ __('Dashboard') }}
	</x-nav-link>
  </li>
  <li>
<x-nav-link href="{{ route('tasklists.index') }}" :active="request()->routeIs('dashboard')" style="color:white;">
						{{ __('Task Lists') }}
	</x-nav-link>
  </li>
    <li>
		<x-nav-link href="{{ route('tasks.index') }}" :active="request()->routeIs('dashboard')" style="color:white;">
						{{ __('Tasks') }}
	</x-nav-link>
	</li>
    <li><a href="#">Menu Item 4</a></li>
  </ul>
</div>
<script>
function toggleSidebar() {
  var sidebar = document.querySelector('.sidebar');
  sidebar.classList.toggle('hidden');
}
</script>
</body>
</html>
