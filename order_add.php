<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
<div class="mx-auto container">
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <form class="shadow p-3" 
    	      action="req/order_add.php" 
    	      method="post">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Page Name</th>
                            <th class="py-3 px-6 text-left">Full Name</th>
                            <th class="py-3 px-6 text-left">Phone</th>
                            <th class="py-3 px-6 text-left">Addres</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left"><input type="text" name="page_name" class="border"></td>
                                <td class="py-3 px-6 text-left"><input type="text" name="name" class="border"></td>
                                <td class="py-3 px-6 text-left"><input type="text" name="phone" class="border"></td>
                                <td class="py-3 px-6 text-left"><input type="text" name="address" class="border"></td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <button type="submit" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                            <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg> -->
                                            <h1>Submit</h1>
                                        </button>
                                        <!-- <button class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button> -->
                                    </div>
                                </td>
                            </tr>
                        
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>
</html>