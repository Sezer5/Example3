<nav id="sidebar">
    <div class="p-4">
        <h4 class="text-white fw-bold"><i class="bi bi-cpu-fill me-2"></i>AdminPanel</h4>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('admin.home') }}" class="nav-link {{ Route::is('admin.home') ? 'active' : '' }}">
                <i class="bi bi-house me-2"></i> Home
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.keyword.index') }}"
                class="nav-link {{ Route::is('admin.keyword.*') ? 'active' : '' }}">
                <i class="bi bi-key me-2"></i> Keywords
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.article.index') }}"
                class="nav-link {{ Route::is('admin.article.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark"></i> Articles
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.novel.index') }}"
                class="nav-link {{ Route::is('admin.novel.*') ? 'active' : '' }}">
                <i class="bi bi-book"></i> Novels
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.poem.index') }}" class="nav-link {{ Route::is('admin.poem.*') ? 'active' : '' }}">
                <i class="bi bi-book"></i> Poems
            </a>
        </li>

    </ul>
</nav>
