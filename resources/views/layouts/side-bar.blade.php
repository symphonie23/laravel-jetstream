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

.toggle-button {
  position: fixed;
  top: 20px;
  right: 20px;
  padding: 10px;
  background-color: #333;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  z-index: 1;
}

.hide-sidebar .container {
  margin-left: 0;
}

.hide-sidebar .sidebar {
  margin-left: -200px;
}

.hide-sidebar .table-container {
  margin: auto;
  max-width: 100%;
}

	</style>
</head>
<body>
<div class="container">
<div class="sidebar">
  <ul>
  <li>
    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" style="color:white;">{{ __('Dashboard') }}</x-nav-link>
  </li>

  <li>
    <x-nav-link href="{{ route('tasklists.index') }}" :active="request()->routeIs('dashboard')" style="color:white;">{{ __('Task Lists') }}</x-nav-link>
  </li>

  <li>
    <a href="{{ url('/tasklists/create') }}" :active="request()->routeIs('dashboard')" style="color:white;">{{ __('Create New Task List') }}</a>
  </li>

  <li>
		<x-nav-link href="{{ route('tasks.index') }}" :active="request()->routeIs('dashboard')" style="color:white;">{{ __('Tasks') }}</x-nav-link>
	</li>

  <li>
    <a href="{{ url('/tasks/create') }}" :active="request()->routeIs('dashboard')" style="color:white;">{{ __('Create New Task') }}</a>
  </li>

  <li><a href="#">Menu Item 4</a></li>
  </ul>
</div>
</div>
<!--
<div class="toggle-button" onclick="toggleSidebar()">Toggle Sidebar</div>
-->
<script>
function toggleSidebar() {
  var sidebar = document.querySelector('.sidebar');
  sidebar.classList.toggle('hidden');
}
</script>
</body>
</html>
