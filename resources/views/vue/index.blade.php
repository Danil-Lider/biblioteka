



<x-app-layout>
    <x-slot name="slot">
        <div id='app'>
            <catalog-index-component :data='{{ json_encode($data) }}'></catalog-index-component>
        </div>
    </x-slot>
</x-app-layout>


