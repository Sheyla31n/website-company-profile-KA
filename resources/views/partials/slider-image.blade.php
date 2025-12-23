<form action="{{ route('admin.web.home.update', $slider->id) }}" method="POST" enctype="multipart/form-data"
    class="flex flex-col items-center gap-2">

    @csrf
    @method('PUT')

    <label class="cursor-pointer">
        <img src="{{ $slider->image ? asset('storage/' . $slider->image) : 'https://via.placeholder.com/150x100?text=Upload' }}"
            class="w-40 h-24 object-cover rounded-lg border hover:opacity-80 transition">

        <input type="file" name="image" class="hidden" onchange="this.form.submit()" accept="image/*">
    </label>

    <span class="text-xs text-gray-500">
        Klik gambar untuk ganti
    </span>
</form>
