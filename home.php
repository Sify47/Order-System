<?php 
session_start();
$logged = false;
if (isset($_SESSION['id']) && isset($_SESSION['page_name'])) {
	 $logged = true;
	 $user_id = $_SESSION['id'];
    }else{
        header("Location: login.php");
    }
  $notFound = 0;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <script src="Tailwind.js"></script>
</head>
<body>
    <?php
        include 'db_conn.php';
        include 'php/home.php';
        include 'req/NavBar.php';
        $orders = getAll($conn);
        $page_name = $_SESSION['page_name'];
    ?>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

<div class="mx-auto container flex flex-wrap justify-center">
<div class="overflow-x-auto bg-white rounded-lg shadow w-[400px] lg:w-[990px] mt-8 px-2">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-3 lg:w-[90px] text-center">Order Id</th>
                        <th class="py-3 px-6 text-center">Name</th>
                        <th class="py-3 px-6 text-center">Date</th>
                        <th class="py-3 px-6 text-left">Process</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    <?php
                    if ($orders) {
                        foreach ($orders as $key => $order) {
                    ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center"><?=$order['order_id']?></td>
                            <td class="py-3 px-6 text-center"><?=$order['name']?></td>
                            <td class="py-3 px-6 text-center"><?=$order['date']?></td>
                            <td class="text-center"><span class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300"><?=$order['process']?></span>
                            </td>
                            <td class="py-3 px-6 text-center">

                                <div class="flex item-center justify-center">
                                <!-- <button  type="button" class="ms-3 mb-2 md:mb-0 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tooltip bottom</button> -->

                                <div id="tooltip-bottom" role="tooltip" class="absolute z-10 invisible inline-block px-2 py-1 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                    View Details Order
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                    
                                    <button data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                        <a href="single_order.php?order_id=<?=$order['order_id']?>"><svg xmlns="http://www.w3.org/2000/svg" height="18" width="14.5" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320 464c8.8 0 16-7.2 16-16l0-288-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16l256 0zM0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 448c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64z"/></svg></a>
                                    </button>
                                    
                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="w-[22px] mr-2 transform hover:text-red-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                    
                                    

                                    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this Order?</h3>
                                                    <a class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center" data-modal-hide="popup-modal" href="req/order_del.php?order_id=<?=$order['order_id']?>">Yes, I'm sure</a>
                                                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    <?php }?>
                    <?php }?>
                </tbody>
            </table>
        </div>
    <div>
                <!-- <button><a href="order_add.php">Order Add</a></button> -->
                <div class="mt-5">
                    <div class="w-full max-w-3xl mx-auto p-3 ">
                        <form action="req/order_add.php" 
                        method="post">
                        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700">
                            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Add Order</h1>

                            <!-- Shipping Address -->
                            <div class="mb-6">
                                <h2 class="text-xl font-semibold text-gray-700 dark:text-white mb-2">Shipping Address</h2>
                                <div class="">
                                    <div>
                                        <label for="first_name" class="block text-gray-700 dark:text-white mb-1">Name</label>
                                        <input type="text" name="name" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <!-- <label for="address" class="block text-gray-700 dark:text-white mb-1">Address</label> -->
                                    <input type="text" hidden name="page_name" value=<?=$page_name?> class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                </div>
                                <div class="mt-4">
                                    <label for="address" class="block text-gray-700 dark:text-white mb-1">Address</label>
                                    <input type="text" name="address" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                </div>

                                <div class="mt-4">
                                    <label for="phone" class="block text-gray-700 dark:text-white mb-1">Phone</label>
                                    <input type="text" name="phone" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                </div>

                                <!-- <div class="grid grid-cols-2 gap-4 mt-4"> -->
                                <div class="mt-4">
                                    <div>
                                        <label for="state" class="block text-gray-700 dark:text-white mb-1">State</label>
                                        <input type="text" name="state" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                    <!-- <div>
                                        <label for="zip" class="block text-gray-700 dark:text-white mb-1">Delivery Price</label>
                                        <input type="text" name="del_price" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div> -->
                                </div>
                            </div>

                            <!-- Payment Information -->
                            <div>
                                <h2 class="text-xl font-semibold text-gray-700 dark:text-white mb-2">Order Information</h2>
                                <label  class="block text-gray-700 dark:text-white text-xl">Product One :</label>
                                <div class="mt-2">
                                    <label for="pro_name" class="block text-gray-700 dark:text-white mb-1">Product Name</label>
                                    <input type="text" name="pro_name" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    <!-- <textarea name="" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" id=""></textarea> -->
                                </div>                            

                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label for="price" class="block text-gray-700 dark:text-white mb-1">Price</label>
                                        <input type="text" name="price" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                    <div>
                                        <label for="quantity_1" class="block text-gray-700 dark:text-white mb-1">Quantity</label>
                                        <input type="text" name="quantity_1" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                </div>                            
                                <label  class="block text-gray-700 dark:text-white text-xl mt-4">Product Two :</label>
                                <div class="mt-2">
                                    <label for="pro_name2" class="block text-gray-700 dark:text-white mb-1">Product Name</label>
                                    <input type="text" name="pro_name2" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    <!-- <textarea name="" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" id=""></textarea> -->
                                </div>                            

                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label for="price2" class="block text-gray-700 dark:text-white mb-1">Price</label>
                                        <input type="text" name="price2" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                    <div>
                                        <label for="quantity_2" class="block text-gray-700 dark:text-white mb-1">Quantity</label>
                                        <input type="text" name="quantity_2" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                </div>
                                <label  class="block text-gray-700 dark:text-white text-xl mt-4">Product Three :</label>
                                <div class="mt-2">
                                    <label for="pro_name3" class="block text-gray-700 dark:text-white mb-1">Product Name</label>
                                    <input type="text" name="pro_name3" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    <!-- <textarea name="" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" id=""></textarea> -->
                                </div>                            

                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label for="price3" class="block text-gray-700 dark:text-white mb-1">Price</label>
                                        <input type="text" name="price3" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                    <div>
                                        <label for="quantity_3" class="block text-gray-700 dark:text-white mb-1">Quantity</label>
                                        <input type="text" name="quantity_3" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                </div>
                                <label  class="block text-gray-700 dark:text-white text-xl mt-4">Product Four :</label>
                                <div class="mt-2">
                                    <label for="pro_name4" class="block text-gray-700 dark:text-white mb-1">Product Name</label>
                                    <input type="text" name="pro_name4" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    <!-- <textarea name="" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" id=""></textarea> -->
                                </div>                            

                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label for="price4" class="block text-gray-700 dark:text-white mb-1">Price</label>
                                        <input type="text" name="price4" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                    <div>
                                        <label for="quantity_4" class="block text-gray-700 dark:text-white mb-1">Quantity</label>
                                        <input type="text" name="quantity_4" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label for="del_price" class="block text-gray-700 dark:text-white mb-1">Delivery Price</label>
                                    <input type="text" name="del_price" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    <!-- <textarea name="" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" id=""></textarea> -->
                                </div> 
                                <div class="mt-4">
                                    <label for="comment" class="block text-gray-700 dark:text-white mb-1">Comment</label>
                                    <textarea name="comment" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none"></textarea>
                                </div>
                            </div>

                            <div class="mt-8 flex justify-end">
                                <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-teal-700 dark:bg-teal-600 dark:text-white dark:hover:bg-teal-900">Place Order</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>


            
    </div>
    
    
</body>
</html>