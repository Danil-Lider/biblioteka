



<x-app-layout>
    <x-slot name="slot">
        <div id='app'>
            <catalog-orders-component :data='{{ json_encode($data) }}'></catalog-orders-component>
        </div>
    </x-slot>
</x-app-layout>


