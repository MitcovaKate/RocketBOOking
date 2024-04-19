<? include  'book.php'?> 
<?

$tour_id = $_GET['id'];

$client_full_name=$_POST['full_name'];
$client_email=$_POST['email'];
$client_phone_number=$_POST['phone_number'];

$order_ticket_quantity=(int)$_POST['quantity'];
$order_tour_id=$_GET['id'];


$order=[
    "client" =>[
        "full_name" => $client_full_name,
        "email" => $client_email,
       "phone_number" =>$client_phone_number,
    ],
    "ticket_quantity"=>$order_ticket_quantity,
    "tour_id"=> $order_tour_id
];


// $file=fopen("./data/order.json","w");
//     fwrite($file,json_encode($order,JSON_PRETTY_PRINT));
//     fclose($file);

//     $tours = [];  // Assuming tours data is loaded elsewhere (replace with actual data loading)
    $found_tour_name = findTourById($tours, $tour_id);  // Call the function to retrieve name
    
    // $file = fopen("./data/order.json", "w");
    // fwrite($file, json_encode($order, JSON_PRETTY_PRINT));
    // fclose($file);
    
    // Success message and tour name display (after saving order data)
    ?>
    
    <hr>
    <h2>Success!</h2>
    <p>You have booked <?= $order_ticket_quantity ?> tickets for the tour "<?= $found_tour_name ?>"</p>
    <hr>
    

?>