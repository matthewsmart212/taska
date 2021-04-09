<div class="bg-gray-700 p-4">
    <h1 class="text-white">Taska</h1>
</div>
<ul class="p-4 text-gray-200">
    <li class="mb-4 mt-4 block"><a href="/dashboard"><i class="fas fa-home mr-2"></i> Dashboard</a></li>
    <li class="mb-4 mt-4 block"><a href="/projects"><i class="fas fa-tasks mr-2"></i> Projects</a></li>
    <li class="mb-4 mt-4 block"><a href="/teams"><i class="fas fa-user-friends mr-2"></i> Teams</a></li>
    @if(auth()->user()->isAdmin())
        <li class="mb-4 mt-4 block"><a href="/users"><i class="fas fa-user mr-2"></i> Users</a></li>
    @endif
</ul>
