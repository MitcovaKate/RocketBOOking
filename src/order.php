
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
    $file = fopen("./data/order.json", "w");
    fwrite($file, json_encode($order, JSON_PRETTY_PRINT));
    fclose($file);
    
    $tours_file = fopen("./data/tours.json", "r");
    $tours_data = fread($tours_file, filesize("./data/tours.json"));
    fclose($tours_file);
    $tours = json_decode($tours_data, true);
    
  
    $matching_tour = null;
    foreach ($tours as $tour) {
      if ($tour['id'] == $order_tour_id) {
        $matching_tour = $tour;
        break;
      }
    }
    
    ?>
    
    <h2>Success!</h2>
    <p><?= $matching_tour['name']?> <?= $matching_tour['price']['amount']?> * <?=$order_ticket_quantity?></p>
    
