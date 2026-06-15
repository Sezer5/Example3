<nav id="sidebar">
    <div class="p-4">
        <h4 class="text-white fw-bold"><i class="bi bi-cpu-fill me-2"></i>AdminPanel</h4>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.keyword.index') }}" class="nav-link active"><i
                    class="bi bi-key me-2"></i>
                Keywords</a></li>
        <li class="nav-item"><a href="{{ route('admin.article.index') }}" class="nav-link"><i
                    class="bi bi-file-earmark"></i> Articles</a></li>
        <li class="nav-item">
            <a href="{{ route('admin.novel.index') }}" class="nav-link">
                <i class="bi bi-book"></i> Novels</a>
        </li>
        <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-people me-2"></i> Kullanıcılar</a></li>
        <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-gear me-2"></i> Ayarlar</a></li>
    </ul>
</nav>
