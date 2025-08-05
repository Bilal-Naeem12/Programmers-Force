<nav class="bg-white shadow p-4 flex justify-between items-center">
  <h1 class="text-xl font-bold">Student-Teacher Dashboard</h1>
  <div>
    <a href="{{ route('profile') }}" class="text-sm">Profile</a> |
    <form action="{{ route('logout') }}" method="POST" class="inline">
      @csrf
      <button type="submit" class="text-sm text-red-500">Logout</button>
    </form>
  </div>
</nav>
