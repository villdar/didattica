<div
{{ $attributes->class(['relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in']) }} >
    <input
    @click="show = ! show"
    type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" checked/>
    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
</div>
<label for="toggle" class="text-xs text-gray-700">{{ $slot }}</label>
