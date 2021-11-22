<div
{{ $attributes->class(['relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in']) }} >
    <input
    @click="show = !show"
    type="checkbox" name="toggle" id="toggle" class="absolute block w-6 h-6 bg-white border-4 rounded-full appearance-none cursor-pointer toggle-checkbox" checked/>
    <label for="toggle" class="block h-6 overflow-hidden bg-gray-300 rounded-full cursor-pointer toggle-label"></label>
</div>
<label for="toggle" class="text-xs text-gray-700">{{ $slot }}</label>
