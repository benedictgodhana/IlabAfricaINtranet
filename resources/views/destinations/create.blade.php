<x-app-layout>
    <div class="p-6">

        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Card for the form -->
        <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Create New Destination</h2>

            <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Destination Name</label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="5" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"></textarea>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="image" accept="image/*" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                        onchange="previewImage(event)">
                    <div class="mt-2" id="image-preview-container" style="display: none;">
                        <img id="image-preview" src="" alt="Image Preview" class="mt-2 rounded-md border" style="max-width:20%; height: auto;">
                    </div>
                </div>

                <div class="mb-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">
                        Create Destination
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Function to preview the image
        function previewImage(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('image-preview-container');
            const imagePreview = document.getElementById('image-preview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    previewContainer.style.display = 'block'; // Show the image preview container
                };
                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none'; // Hide the image preview container
            }
        }

        // Hide the success message after 4 seconds
        setTimeout(() => {
            const message = document.getElementById('success-message');
            if (message) {
                message.style.transition = 'opacity 0.5s';
                message.style.opacity = '0';

                setTimeout(() => message.remove(), 500); // Remove after fade-out
            }
        }, 4000);
    </script>
</x-app-layout>
