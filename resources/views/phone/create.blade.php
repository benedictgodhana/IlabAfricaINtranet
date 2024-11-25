<x-app-layout>
    <div class="container mx-auto my-8">

        <form action="{{ route('phones.store') }}" method="POST" class="space-y-6 bg-white p-8 rounded-lg shadow-md">
            @csrf

            <!-- Name Input -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('name') }}"
                    required
                />
            </div>

            <!-- Department Dropdown -->
            <div>
                <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                <select
                    id="department"
                    name="department"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required
                >
                    <option value="" disabled selected>Select a department</option>
                    <option value="eHealth">eHealth</option>
                    <option value="Finance">Finance</option>
                    <option value="Reception">Reception</option>
                    <option value="operations Manager">Operations Manager</option>
                    <option value="IT Outsourcing & BITCU">IT Outsourcing & BITCU</option>
                    <option value="Digital Learning">Digital Learning</option>
                    <option value="Data Science">Data Science</option>
                    <option value="IoT">IoT</option>
                    <option value="IT Security">IT Security</option>
                    <option value="iBizAfrica">iBizAfrica</option>
                    <option value="IR &EE">IR &EE</option>
                    <option value="PR">PR</option>
                    <option value="PR">IT Department</option>

                </select>
            </div>

            <!-- Extension Input -->
            <div>
                <label for="extension" class="block text-sm font-medium text-gray-700">Extension</label>
                <input
                    type="text"
                    id="extension"
                    name="extension"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('extension') }}"
                    required
                />
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button
                    type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Save
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
