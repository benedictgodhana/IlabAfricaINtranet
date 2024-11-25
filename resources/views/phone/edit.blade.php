<x-app-layout>
    <div class="bg-white container mx-auto p-6">
        <h1 class="my-4 text-3xl font-bold text-gray-800">Edit Phone Entry</h1>

        <form action="{{ route('phones.update', $phone->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="mt-2 px-4 py-2 border border-gray-300 rounded-md w-full" value="{{ old('name', $phone->name) }}">
            </div>

            <div class="mb-4">
                <label for="extension" class="block text-sm font-medium text-gray-700">Extension</label>
                <input type="text" name="extension" id="extension" class="mt-2 px-4 py-2 border border-gray-300 rounded-md w-full" value="{{ old('extension', $phone->extension) }}">
            </div>

            <div class="mb-4">
                <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                <select name="department" id="department" class="mt-2 px-4 py-2 border border-gray-300 rounded-md w-full">
                    <option value="HR" {{ $phone->department == 'HR' ? 'selected' : '' }}>HR</option>
                    <option value="IT" {{ $phone->department == 'IT' ? 'selected' : '' }}>IT</option>
                    <option value="Reception" {{ $phone->department == 'IT' ? 'selected' : '' }}>Reception</option>
                    <option value="E-Health" {{ $phone->department == 'IT' ? 'selected' : '' }}>E-Health</option>
                    <option value="Operations Manager" {{ $phone->department == 'IT' ? 'selected' : '' }}>Operations Manager</option>
                    <option value="IT Outsourcing & BITCU" {{ $phone->department == 'IT Outsourcing & BITCU' ? 'selected' : '' }}>IT Outsourcing & BITCU</option>
                    <option value="Digital Learning" {{ $phone->department == 'Digital Learning' ? 'selected' : '' }}>Digital Learning</option>    <!-- Add more departments as needed -->
                    <option value="Data Science" {{ $phone->department == 'Data Science' ? 'selected' : '' }}>Data Science</option>    <!-- Add more departments as needed -->
                    <option value="IoT" {{ $phone->department == 'IoT' ? 'selected' : '' }}>IoT</option>    <!-- Add more departments as needed -->
                    <option value="IT Security" {{ $phone->department == 'IT Security' ? 'selected' : '' }}>IT Security</option>    <!-- Add more departments as needed -->
                    <option value="iBizAfrica" {{ $phone->department == 'iBizAfrica' ? 'selected' : '' }}>iBizAfrica</option>    <!-- Add more departments as needed -->
                    <option value="IR &EE" {{ $phone->department == 'IR &EE' ? 'selected' : '' }}>IR &EE</option>    <!-- Add more departments as needed -->
                    <option value="PR" {{ $phone->department == 'PR' ? 'selected' : '' }}>PR</option>    <!-- Add more departments as needed -->

                </select>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md w-full">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
