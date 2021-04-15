<div class="bg-black" style="padding-top:6px;">
    <img src="/images/taska-small-logo.png"/>
</div>
<ul class="p-4 text-gray-200">
    <li class="mb-4 mt-4 block"><a href="/dashboard"><i class="fas fa-home mr-2"></i></a></li>
    <li class="mb-4 mt-4 block"><a href="/projects"><i class="fas fa-tasks mr-2"></i></a></li>
    @if(auth()->user()->isAdmin())
        <li class="mb-4 mt-4 block"><a href="/users"><i class="fas fa-user mr-2"></i></a></li>
    @endif
</ul>
