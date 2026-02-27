<!-- resources/views/components/card.blade.php -->
<div class="bg-white p-6 rounded shadow">
    @if ($image)
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-48 object-cover rounded">
    @endif
    <h3 class="text-xl font-bold mt-4">{{ $title }}</h3>
    <p class="mt-2">{{ $description }}</p>
    @if (isset($action))
        <a href="{{ $action['url'] }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">{{ $action['text'] }}</a>
    @endif
</div>