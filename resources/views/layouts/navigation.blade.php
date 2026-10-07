<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

    @if(Auth::user()->role == 'admin')

        <x-nav-link :href="route('admin.admin.dashboard')" :active="request()->routeIs('admin.admin.dashboard')">
            Dashboard
        </x-nav-link>

        <x-nav-link :href="route('admin.departments.index')" :active="request()->routeIs('admin.departments.*')">
            Departments
        </x-nav-link>

        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
            Users
        </x-nav-link>

    @elseif(Auth::user()->role == 'manager')

        <x-nav-link :href="route('manager.dashboard')" :active="request()->routeIs('manager.dashboard')">
            Dashboard
        </x-nav-link>

        <x-nav-link :href="route('manager.datasets.index')" :active="request()->routeIs('manager.datasets.*')">
            Datasets
        </x-nav-link>

        <x-nav-link :href="route('manager.tasks.index')" :active="request()->routeIs('manager.tasks.*')">
            Tasks
        </x-nav-link>

        <x-nav-link :href="route('manager.reports.index')" :active="request()->routeIs('manager.reports.*')">
            Reports
        </x-nav-link>

        <x-nav-link :href="route('manager.ai-insights.index')" :active="request()->routeIs('manager.ai-insights.*')">
            AI Insights
        </x-nav-link>

    @elseif(Auth::user()->role == 'analyst')

        <x-nav-link :href="route('analyst.dashboard')" :active="request()->routeIs('analyst.dashboard')">
            Dashboard
        </x-nav-link>

        <x-nav-link :href="route('analyst.tasks.index')" :active="request()->routeIs('analyst.tasks.*')">
            My Tasks
        </x-nav-link>

        <x-nav-link :href="route('analyst.datasets.index')" :active="request()->routeIs('analyst.datasets.*')">
            Datasets
        </x-nav-link>

        <x-nav-link :href="route('analyst.reports.index')" :active="request()->routeIs('analyst.reports.*')">
            Reports
        </x-nav-link>

        <x-nav-link :href="route('analyst.ai-insights.index')" :active="request()->routeIs('analyst.ai-insights.*')">
            AI Insights
        </x-nav-link>

    @endif

</div>