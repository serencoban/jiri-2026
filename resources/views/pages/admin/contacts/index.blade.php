<x-layouts.admin>
    <h1 class="text-5xl pb-8">Liste des contacts</h1>
    <div class="flex justify-end pb-4">
        <x-table-filter.search-filter-btn />
    </div>
    <div>
        <table class="w-full table-auto">
            <thead class="text-sm text-body bg-text-white border-b border-b-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">Profil</th>
                <th scope="col" class="px-6 py-3 ">Nom</th>
                <th scope="col" class="px-6 py-3">Prénom</th>
                <th scope="col" class="px-6 py-3">Mail</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr class="border-b border-b-gray-100">
                <th scope="row" class="flex justify-center px-6 py-4">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/andrew.jpg') }}" alt="">
                </th>
                <td class="px-6 py-4 text-center">Seren</td>
                <td class="px-6 py-4 text-center">Coban</td>
                <td class="px-2 py-4 text-center">serencoban@gmail.com</td>
                <td class="px-6 py-4 text-center">
                    <button class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="5" viewBox="0 0 20 5" fill="none">
                            <path d="M2.25 4.5C1.00736 4.5 0 3.49264 0 2.25C0 1.00736 1.00736 0 2.25 0C3.49264 0 4.5 1.00736 4.5 2.25C4.5 3.49264 3.49264 4.5 2.25 4.5ZM9.75 4.5C8.50736 4.5 7.5 3.49264 7.5 2.25C7.5 1.00736 8.50736 0 9.75 0C10.9926 0 12 1.00736 12 2.25C12 3.49264 10.9926 4.5 9.75 4.5ZM17.25 4.5C16.0074 4.5 15 3.49264 15 2.25C15 1.00736 16.0074 0 17.25 0C18.4926 0 19.5 1.00736 19.5 2.25C19.5 3.49264 18.4926 4.5 17.25 4.5Z" fill="#2F2F2F"/>
                        </svg>
                    </button>
                </td>
            </tr>
            <tr class="border-b border-b-gray-100">
                <th scope="row" class="flex justify-center px-6 py-4">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/emmastone.jpg') }}" alt="">
                </th>
                <td class="px-6 py-4 text-center">Seren</td>
                <td class="px-6 py-4 text-center">Coban</td>
                <td class="px-2 py-4 text-center">serencoban@gmail.com</td>
                <td class="px-6 py-4 text-center">
                    <button class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="5" viewBox="0 0 20 5" fill="none">
                            <path d="M2.25 4.5C1.00736 4.5 0 3.49264 0 2.25C0 1.00736 1.00736 0 2.25 0C3.49264 0 4.5 1.00736 4.5 2.25C4.5 3.49264 3.49264 4.5 2.25 4.5ZM9.75 4.5C8.50736 4.5 7.5 3.49264 7.5 2.25C7.5 1.00736 8.50736 0 9.75 0C10.9926 0 12 1.00736 12 2.25C12 3.49264 10.9926 4.5 9.75 4.5ZM17.25 4.5C16.0074 4.5 15 3.49264 15 2.25C15 1.00736 16.0074 0 17.25 0C18.4926 0 19.5 1.00736 19.5 2.25C19.5 3.49264 18.4926 4.5 17.25 4.5Z" fill="#2F2F2F"/>
                        </svg>
                    </button>
                </td>
            </tr>
            <tr class="border-b border-b-gray-100">
                <th scope="row" class="flex justify-center px-6 py-4">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/jenn.jpg') }}" alt="">
                </th>
                <td class="px-6 py-4 text-center">Seren</td>
                <td class="px-6 py-4 text-center">Coban</td>
                <td class="px-2 py-4 text-center">serencoban@gmail.com</td>
                <td class="px-6 py-4 text-center">
                    <button class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="5" viewBox="0 0 20 5" fill="none">
                            <path d="M2.25 4.5C1.00736 4.5 0 3.49264 0 2.25C0 1.00736 1.00736 0 2.25 0C3.49264 0 4.5 1.00736 4.5 2.25C4.5 3.49264 3.49264 4.5 2.25 4.5ZM9.75 4.5C8.50736 4.5 7.5 3.49264 7.5 2.25C7.5 1.00736 8.50736 0 9.75 0C10.9926 0 12 1.00736 12 2.25C12 3.49264 10.9926 4.5 9.75 4.5ZM17.25 4.5C16.0074 4.5 15 3.49264 15 2.25C15 1.00736 16.0074 0 17.25 0C18.4926 0 19.5 1.00736 19.5 2.25C19.5 3.49264 18.4926 4.5 17.25 4.5Z" fill="#2F2F2F"/>
                        </svg>
                    </button>
                </td>
            </tr>
            <tr class="border-b border-b-gray-100">
                <th scope="row" class="flex justify-center px-6 py-4">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/mark.jpg') }}" alt="">
                </th>
                <td class="px-6 py-4 text-center">Seren</td>
                <td class="px-6 py-4 text-center">Coban</td>
                <td class="px-2 py-4 text-center">serencoban@gmail.com</td>
                <td class="px-6 py-4 text-center">
                    <button class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="5" viewBox="0 0 20 5" fill="none">
                            <path d="M2.25 4.5C1.00736 4.5 0 3.49264 0 2.25C0 1.00736 1.00736 0 2.25 0C3.49264 0 4.5 1.00736 4.5 2.25C4.5 3.49264 3.49264 4.5 2.25 4.5ZM9.75 4.5C8.50736 4.5 7.5 3.49264 7.5 2.25C7.5 1.00736 8.50736 0 9.75 0C10.9926 0 12 1.00736 12 2.25C12 3.49264 10.9926 4.5 9.75 4.5ZM17.25 4.5C16.0074 4.5 15 3.49264 15 2.25C15 1.00736 16.0074 0 17.25 0C18.4926 0 19.5 1.00736 19.5 2.25C19.5 3.49264 18.4926 4.5 17.25 4.5Z" fill="#2F2F2F"/>
                        </svg>
                    </button>
                </td>
            </tr>
            <tr class="border-b border-b-gray-100">
                <th scope="row" class="flex justify-center px-6 py-4">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/cat1.jpg') }}" alt="">
                </th>
                <td class="px-6 py-4 text-center">Seren</td>
                <td class="px-6 py-4 text-center">Coban</td>
                <td class="px-2 py-4 text-center">serencoban@gmail.com</td>
                <td class="px-6 py-4 text-center">
                    <button class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="5" viewBox="0 0 20 5" fill="none">
                            <path d="M2.25 4.5C1.00736 4.5 0 3.49264 0 2.25C0 1.00736 1.00736 0 2.25 0C3.49264 0 4.5 1.00736 4.5 2.25C4.5 3.49264 3.49264 4.5 2.25 4.5ZM9.75 4.5C8.50736 4.5 7.5 3.49264 7.5 2.25C7.5 1.00736 8.50736 0 9.75 0C10.9926 0 12 1.00736 12 2.25C12 3.49264 10.9926 4.5 9.75 4.5ZM17.25 4.5C16.0074 4.5 15 3.49264 15 2.25C15 1.00736 16.0074 0 17.25 0C18.4926 0 19.5 1.00736 19.5 2.25C19.5 3.49264 18.4926 4.5 17.25 4.5Z" fill="#2F2F2F"/>
                        </svg>
                    </button>
                </td>
            </tr>
            <tr class="border-b border-b-gray-100">
                <th scope="row" class="flex justify-center px-6 py-4">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/cat2.jpg') }}" alt="">
                </th>
                <td class="px-6 py-4 text-center">Seren</td>
                <td class="px-6 py-4 text-center">Coban</td>
                <td class="px-2 py-4 text-center">serencoban@gmail.com</td>
                <td class="px-6 py-4 text-center">
                    <button class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="5" viewBox="0 0 20 5" fill="none">
                            <path d="M2.25 4.5C1.00736 4.5 0 3.49264 0 2.25C0 1.00736 1.00736 0 2.25 0C3.49264 0 4.5 1.00736 4.5 2.25C4.5 3.49264 3.49264 4.5 2.25 4.5ZM9.75 4.5C8.50736 4.5 7.5 3.49264 7.5 2.25C7.5 1.00736 8.50736 0 9.75 0C10.9926 0 12 1.00736 12 2.25C12 3.49264 10.9926 4.5 9.75 4.5ZM17.25 4.5C16.0074 4.5 15 3.49264 15 2.25C15 1.00736 16.0074 0 17.25 0C18.4926 0 19.5 1.00736 19.5 2.25C19.5 3.49264 18.4926 4.5 17.25 4.5Z" fill="#2F2F2F"/>
                        </svg>
                    </button>
                </td>
            </tr>
            <tr class="border-b border-b-gray-100">
                <th scope="row" class="flex justify-center px-6 py-4">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/cat3.jpg') }}" alt="">
                </th>
                <td class="px-6 py-4 text-center">Seren</td>
                <td class="px-6 py-4 text-center">Coban</td>
                <td class="px-2 py-4 text-center">serencoban@gmail.com</td>
                <td class="px-6 py-4 text-center">
                    <button class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="5" viewBox="0 0 20 5" fill="none">
                            <path d="M2.25 4.5C1.00736 4.5 0 3.49264 0 2.25C0 1.00736 1.00736 0 2.25 0C3.49264 0 4.5 1.00736 4.5 2.25C4.5 3.49264 3.49264 4.5 2.25 4.5ZM9.75 4.5C8.50736 4.5 7.5 3.49264 7.5 2.25C7.5 1.00736 8.50736 0 9.75 0C10.9926 0 12 1.00736 12 2.25C12 3.49264 10.9926 4.5 9.75 4.5ZM17.25 4.5C16.0074 4.5 15 3.49264 15 2.25C15 1.00736 16.0074 0 17.25 0C18.4926 0 19.5 1.00736 19.5 2.25C19.5 3.49264 18.4926 4.5 17.25 4.5Z" fill="#2F2F2F"/>
                        </svg>
                    </button>
                </td>
            </tr>
            <tr class="border-b border-b-gray-100">
                <th scope="row" class="flex justify-center px-6 py-4">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/cat4.jpg') }}" alt="">
                </th>
                <td class="px-6 py-4 text-center">Seren</td>
                <td class="px-6 py-4 text-center">Coban</td>
                <td class="px-2 py-4 text-center">serencoban@gmail.com</td>
                <td class="px-6 py-4 text-center">
                    <button class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="5" viewBox="0 0 20 5" fill="none">
                            <path d="M2.25 4.5C1.00736 4.5 0 3.49264 0 2.25C0 1.00736 1.00736 0 2.25 0C3.49264 0 4.5 1.00736 4.5 2.25C4.5 3.49264 3.49264 4.5 2.25 4.5ZM9.75 4.5C8.50736 4.5 7.5 3.49264 7.5 2.25C7.5 1.00736 8.50736 0 9.75 0C10.9926 0 12 1.00736 12 2.25C12 3.49264 10.9926 4.5 9.75 4.5ZM17.25 4.5C16.0074 4.5 15 3.49264 15 2.25C15 1.00736 16.0074 0 17.25 0C18.4926 0 19.5 1.00736 19.5 2.25C19.5 3.49264 18.4926 4.5 17.25 4.5Z" fill="#2F2F2F"/>
                        </svg>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</x-layouts.admin>
