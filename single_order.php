
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="Tailwind.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <style>
        table {
            /* width: 100%; */
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 20px;
        }
        table th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <?php
        include 'db_conn.php';
        include 'php/home.php';
        include 'req/NavBar.php';
        $order_id = $_GET['order_id'];
        $oo = getid($conn , $order_id);
    ?>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    
    <div class="mx-auto container flex flex-wrap justify-center lg:w-[800px] mt-8 px-3 overflow-x-auto">
        <table class="w-full text-center">
            <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>State</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
            <tbody>
                <tr>
                    <td><?=$oo['name']?></td>
                    <td><?=$oo['address']?></td>
                    <td><?=$oo['state']?></td>
                    <td>0<?=$oo['phone']?></td>
                </tr>
            </tbody>
        </table>
        <table class="mt-4 w-full text-center mb-3">
            <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
            <tbody>
                        <tr>
                            <td><?=$oo['product1']?></td>
                            <td><?=$oo['quantity_1']?></td>
                            <td><?=$oo['price']?></td>
                            <?php $p1 =$oo['quantity_1'] * $oo['price'] ?>
                            <td><?=$p1 ?></td>
                        </tr>
                        <?php
                            if($oo['product2'] != ""){
                        ?>
                        <tr>
                            <td><?=$oo['product2']?></td>
                            <td><?=$oo['quantity_2']?></td>
                            <td><?=$oo['price2']?></td>
                            <?php $p2 = $oo['quantity_2'] * $oo['price2'] ?>
                            <td><?=$p2?></td>
                        </tr>
                        <?php }else{$p2=0;}?>

                        <?php
                            if($oo['product3'] != ""){
                        ?>
                        <tr>
                            <td><?=$oo['product3']?></td>
                            <td><?=$oo['quantity_3']?></td>
                            <td><?=$oo['price3']?></td>
                            <?php $p3 = $oo['quantity_3'] * $oo['price3'] ?>
                            <td><?=$p3?></td>
                        </tr>
                        <?php }else{$p3=0;}?>

                        <?php
                            if($oo['product4'] != ""){
                        ?>
                        <tr>
                            <td><?=$oo['product4']?></td>
                            <td><?=$oo['quantity_4']?></td>
                            <td><?=$oo['price4']?></td>
                            <?php $p4 = $oo['quantity_4'] * $oo['price4'] ?>
                            <td><?=$p4?></td>
                        </tr>
                        <?php }else{$p4=0;}?>
                    </tbody>
                    <tfoot>
                    <!-- <tr>
                        <td colspan="3">Subtotal</td>
                        <td>$57.50</td>
                    </tr> -->
                    <tr>
                        <td colspan="3">Delivery Price</td>
                        <td><?=$oo['delivery_price']?></td>
                    </tr>
                    <tr>
                        <td colspan="3">Total</td>
                        <?php
                            $to = $oo['price'] + $oo['delivery_price'];
                        ?>
                        <td><?=$p1 + $p2 + $p3 + $p4 + $oo['delivery_price']?></td>
                    </tr>
                </tfoot>
        </table>
        
        <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</button>
        
        <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><a href="req/pdf.php?order_id=<?=$oo['order_id']?>">PDF</a></button>
                                    

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
                                                <div class="mt-5 w-full">
                    <div class="max-w-3xl mx-auto p-3 ">
                        <form action="req/order_edit.php?order_id=<?=$oo['order_id']?>" 
                        method="post">
                        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700">
                            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Add Order</h1>

                            <!-- Shipping Address -->
                            <div class="mb-6">
                                <h2 class="text-xl font-semibold text-gray-700 dark:text-white mb-2">Shipping Address</h2>
                                <div class="">
                                    <div>
                                        <label for="first_name" class="block text-gray-700 dark:text-white mb-1">Name</label>
                                        <input type="text" name="name" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" value="<?=$oo['name']?>">
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <!-- <label for="address" class="block text-gray-700 dark:text-white mb-1">Address</label> -->
                                    <input type="text" hidden name="page_name" value="<?=$oo['page_name']?>" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                </div>
                                <div class="mt-4">
                                    <label for="address" class="block text-gray-700 dark:text-white mb-1">Address</label>
                                    <input type="text" value="<?=$oo['address']?>" name="address" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                </div>

                                <div class="mt-4">
                                    <label for="phone" class="block text-gray-700 dark:text-white mb-1">Phone</label>
                                    <input type="text" value="<?=$oo['phone']?>" name="phone" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                </div>

                                <!-- <div class="grid grid-cols-2 gap-4 mt-4"> -->
                                <div class="mt-4">
                                    <div>
                                        <label for="state" class="block text-gray-700 dark:text-white mb-1">State</label>
                                        <input type="text" value="<?=$oo['state']?>" name="state" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
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
                                    <input type="text" value="<?=$oo['product1']?>" name="pro_name" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    <!-- <textarea name="" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" id=""></textarea> -->
                                </div>                            

                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label for="price" class="block text-gray-700 dark:text-white mb-1">Price</label>
                                        <input type="text" value="<?=$oo['price']?>" name="price" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                    <div>
                                        <label for="quantity_1" class="block text-gray-700 dark:text-white mb-1">Quantity</label>
                                        <input type="text" value="<?=$oo['quantity_1']?>" name="quantity_1" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                </div>                            
                                <label  class="block text-gray-700 dark:text-white text-xl mt-4">Product Two :</label>
                                <div class="mt-2">
                                    <label for="pro_name2" class="block text-gray-700 dark:text-white mb-1">Product Name</label>
                                    <input type="text" value="<?=$oo['product2']?>" name="pro_name2" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    <!-- <textarea name="" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" id=""></textarea> -->
                                </div>                            

                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label for="price2" class="block text-gray-700 dark:text-white mb-1">Price</label>
                                        <input type="text" value="<?=$oo['price2']?>" name="price2" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                    <div>
                                        <label for="quantity_2" class="block text-gray-700 dark:text-white mb-1">Quantity</label>
                                        <input type="text" value="<?=$oo['quantity_2']?>" name="quantity_2" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                </div>
                                <label  class="block text-gray-700 dark:text-white text-xl mt-4">Product Three :</label>
                                <div class="mt-2">
                                    <label for="pro_name3" class="block text-gray-700 dark:text-white mb-1">Product Name</label>
                                    <input type="text" value="<?=$oo['product3']?>" name="pro_name3" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    <!-- <textarea name="" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" id=""></textarea> -->
                                </div>                            

                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label for="price3" class="block text-gray-700 dark:text-white mb-1">Price</label>
                                        <input type="text" value="<?=$oo['price3']?>" name="price3" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                    <div>
                                        <label for="quantity_3" class="block text-gray-700 dark:text-white mb-1">Quantity</label>
                                        <input type="text" value="<?=$oo['quantity_3']?>" name="quantity_3" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                </div>
                                <label  class="block text-gray-700 dark:text-white text-xl mt-4">Product Four :</label>
                                <div class="mt-2">
                                    <label for="pro_name4" class="block text-gray-700 dark:text-white mb-1">Product Name</label>
                                    <input type="text" value="<?=$oo['product4']?>" name="pro_name4" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    <!-- <textarea name="" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" id=""></textarea> -->
                                </div>                            

                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label for="price4" class="block text-gray-700 dark:text-white mb-1">Price</label>
                                        <input type="text" value="<?=$oo['price4']?>" name="price4" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                    <div>
                                        <label for="quantity_4" class="block text-gray-700 dark:text-white mb-1">Quantity</label>
                                        <input type="text" value="<?=$oo['quantity_4']?>" name="quantity_4" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label for="del_price" class="block text-gray-700 dark:text-white mb-1">Delivery Price</label>
                                    <input type="text" value="<?=$oo['delivery_price']?>" name="del_price" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                                    <!-- <textarea name="" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" id=""></textarea> -->
                                </div> 
                                <div class="mt-4">
                                    <label for="comment" class="block text-gray-700 dark:text-white mb-1">Comment</label>
                                    <textarea name="comment" value="<?=$oo['comment']?>" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none"></textarea>
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
                                        </div>
                                    </div>


        <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete Order</button>
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
                                                    <a class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center" data-modal-hide="popup-modal" href="req/order_del.php?order_id=<?=$oo['order_id']?>">Yes, I'm sure</a>
                                                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    </div>
    
    
</body>
</html>