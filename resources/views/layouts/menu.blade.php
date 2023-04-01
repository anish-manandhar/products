<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('category.index') }}" class="nav-link {{ request()->routeIs('category*') ? 'active' : '' }} ">
        <i class="nav-icon fas fa-list-ul"></i>
        <p>Category</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('subcategory.index') }}" class="nav-link {{ request()->routeIs('subcategory*') ? 'active' : '' }} ">
        <i class="nav-icon fas fa-list-ul"></i>
        <p>SubCategory</p>
    </a>
</li>
