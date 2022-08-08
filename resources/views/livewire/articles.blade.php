<div>
    <h1>Listado de artículos</h1>

    <a href="{{ route('article.create') }}">+ Crear</a>

    <input type="text" wire:model="search" placeholder="Búsqueda...">

    @foreach($articles as $article)
        <li>
            <a href="{{ route('article.show', $article) }}">{{ $article->title }}</a>
            <a href="{{ route('article.edit', $article) }}">Editar</a>
        </li>
    @endforeach
</div>
