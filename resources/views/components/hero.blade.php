<!-- resources/views/components/hero.blade.php -->
<div class="bg-gray-200 p-8 text-center">
    <h1 class="text-4xl font-bold">{{ $title }}</h1>
    <p class="mt-4">{{ $description }}</p>
    @if (isset($action))
        <a href="{{ $action['url'] }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">{{ $action['text'] }}</a>
    @endif
</div>