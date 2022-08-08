<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear artículo</h2>
    </x-slot>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-jet-form-section submit="save">
                <x-slot name="title">Nuevo artículo</x-slot>
                <x-slot name="description">Formulaio para crear artículos</x-slot>

                <x-slot name="form">
                    <div class="col-span-6">
                        <x-jet-label for="image" value="Cover"/>
                        <x-jet-input wire:model="image" type="file" id="image" class="block w-full"/>
                        <x-jet-input-error for="image"/>
                    </div>

                    <div class="col-span-6">
                        <x-jet-label for="title" value="Título"/>
                        <x-jet-input wire:model="article.title" type="text" id="title" class="block w-full"/>
                        <x-jet-input-error for="article.title"/>
                    </div>

                    <div class="col-span-6">
                        <x-jet-label for="slug" value="Slug"/>
                        <x-jet-input wire:model="article.slug" type="text" id="slug" class="block w-full"/>
                        <x-jet-input-error for="article.slug"/>
                    </div>

                    <div class="col-span-6">
                        <x-jet-label for="content" value="Contenido"/>
                        <x-html-editor wire:model="article.content" id="content" class="block w-full"></x-html-editor>
                        <x-jet-input-error for="article.content"/>
                    </div>
                    <x-slot name="actions">
                        <x-jet-button>Guardar</x-jet-button>
                    </x-slot>
                </x-slot>
            </x-jet-form-section>
        </div>
    </div>
</div>

