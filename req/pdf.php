<?php
    include("../db_conn.php");
    include("../php/home.php");
    $order_id = $_GET['order_id'];
    $oo = getid($conn , $order_id);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice <?=$oo['order_id']?></title>
    <style>
        #receipt {
            width: 80mm;
            padding: 10mm;
            margin: auto;
            background: #fff;
            font-family: Arial, sans-serif;
        }
        h1, h2, h3, p {
            margin: 0;
            padding: 0;
        }
        .header, .footer {
            text-align: left;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
        }
        .content table th, .content table td {
            border: 1px solid #ddd;
            padding: 5px;
        }
        .content table th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div id="receipt">
        <div class="header">
            <h1><?=$oo['name']?></h1>
            <!-- <h1><?=$oo['name']?></h1> -->
            <p><?=$oo['address']?></p>
            <p>Phone: 0<?=$oo['phone']?></p>
        </div>
        <div class="content">
            <h2>Receipt</h2>
            <p>Date: <?=$oo['date']?></p>
            <p>Receipt #: <?=$oo['order_id']?></p>
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
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
        </div>
        <div class="footer">
            <p>Comments Note : <?=$oo['comment']?></p>
            <p style=" margin-top: 30px; text-align: center;">Page : <?=$oo['page_name']?></p>
        </div>
    </div>
    <div style="display: flex; justify-content: center;">
        <button id="generate-pdf" style="    padding: 7px;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 700;">Generate PDF</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.0/html2pdf.bundle.min.js"></script>
    <script src="../html2pdf.js"></script>
    <script>
        document.getElementById('generate-pdf').addEventListener('click', function () {
            const element = document.getElementById('receipt');
            html2pdf(element, {
                margin: 1,
                filename: "Invoice <?=$oo['order_id']?>",
                image: { type: 'jpeg', quality: 0.99 },
                html2canvas: { scale: 3 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            });
        });
    </script>
</body>
</html>

