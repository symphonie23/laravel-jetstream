<!DOCTYPE html>
<html>
<head>
	<style>
    ul.expandable {
        list-style-type: none;
        cursor: pointer;
    }

    ul.expandable.collapsed > li {
      display: none;
    }
    
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
		transition: all 0.1s ease;
	}
    
    .sidebar ul {
      	list-style: none;
     	padding-top: 10px;
    }

    .sidebar ul li {
     	padding-left: 6px;
     	padding-top: 10px;
    }

	.sidebar ul li a {
		color: #fff;
		text-decoration: none;
		display: block;
		padding: 5px;
		transition: background-color 0.1s ease;
	}

	.sidebar ul li a:hover {
		background-color: #444;
	}

	.button {
		position: absolute;
		top: 0;
		right: -13px;
		background-color: #333;
		color: #fff;
		padding: 10px;
		border: none;
		cursor: pointer;
		z-index: 1;
	}

	.sidebar.collapsed ul {
		visibility: hidden;
	}

	.sidebar.collapsed {
		width: 40px;
		overflow: hidden;
		transition: width 0.1s ease;
	}

	.sidebar.collapsed .button {
		right: 0;
		transition: right 0.1s ease;
	}

	.sidebar.collapsed ul li a {
		padding: 0;
		opacity: 0;
		transition: opacity 0.1s ease;
	}

	.sidebar.collapsed ul li a:hover {
		background-color: transparent;
	}
	.sidebar.collapsed:hover {
		width: 40px;
	}

	.button:hover + ul li a {
		padding: 5px;
		opacity: 1;
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
    <button class="button" onclick="toggleSidebar()">
      <i class="fa fa-bars"></i>
    </button>
    <ul>
      <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" style="color:white;">{{ __('Dashboard') }}</x-nav-link>
    </ul>

    <ul class="expandable collapsed">
      <x-nav-link style="color:white;">{{ __('Task List') }}</x-nav-link>
      <li>
        <x-nav-link href="{{ route('tasklists.index') }}" :active="request()->routeIs('tasklists.index')" style="color:white;">{{ __('All Task Lists') }}</x-nav-link>
      </li>

      <li>
        <x-nav-link href="{{ route('tasklists.create') }}" :active="request()->routeIs('tasklists.create')" style="color:white;">{{ __('Create New Task List') }}</x-nav-link>
      </li>
    </ul>

    <ul class="expandable collapsed">
      <x-nav-link style="color:white;">{{ __('Task') }}</x-nav-link>
      <li>
        <x-nav-link href="{{ route('tasks.index') }}" :active="request()->routeIs('tasks.index')" style="color:white;">{{ __('All Tasks') }}</x-nav-link>
      </li>
      <li>
        <x-nav-link href="{{ route('tasks.create') }}" :active="request()->routeIs('tasks.create')" style="color:white;">{{ __('Create New Task') }}</x-nav-link>
      </li>
    </ul>

    <ul>
      <x-nav-link style="color:white;">{{ __('More Items') }}</x-nav-link>
    </ul>
  </div>
</div>
<!--
<div class="toggle-button" onclick="toggleSidebar()">Toggle Sidebar</div>
-->
<script>
  const expandableLists = document.querySelectorAll('.expandable');

  expandableLists.forEach(expandableList => {
    expandableList.classList.add('collapsed'); // set initial state to collapsed
    expandableList.addEventListener('click', e => {
      if (e.target.tagName === 'UL') { // only toggle when UL is clicked
        if (expandableList.classList.contains('collapsed')) { // check if it is collapsed
          expandableList.classList.remove('collapsed');
        } else {
          expandableList.classList.add('collapsed');
        }
      }
    });
  });

  function toggleSidebar() {
  var sidebar = document.querySelector('.sidebar');
  var tableContainer = document.querySelector('.table-container');
  var buttonIcon = document.querySelector('.button i');

  sidebar.classList.toggle('collapsed');

  if (sidebar.classList.contains('collapsed')) {
    tableContainer.style.marginLeft = '40px';
    buttonIcon.classList.remove('fa-bars');
    buttonIcon.classList.add('fa-arrow-right');
  } else {
    tableContainer.style.marginLeft = '200px';
    buttonIcon.classList.remove('fa-arrow-right');
    buttonIcon.classList.add('fa-bars');
  }
}

</script>
</body>
</html>
