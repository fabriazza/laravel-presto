<form method="POST" action="{{ route('locale', $lang) }}">
    @csrf
    <button class="nav-link dropdown-item" type="submit">
        <span class="flag-icon flag-icon-{{ $nation }}"></span>
    </button>
</form>
