<?
$id= $_GET['id'];
$file=fopen("./data/tours.json","r");
$tours=json_decode(fread($file,100000), true);
fclose($file);

$tour_id = isset($_GET['id']) ? (int)$_GET['id'] : null;

//  find the tour by ID
function findTourById($tours, $id) {
  foreach ($tours as $tour) {
    if ($tour['id'] === $id) {
      return $tour['name']; // Return the tour name 
    }
  }
  return null;
}

$found_tour_name = findTourById($tours, $tour_id);

?>

 <hr><form action="/?page=order&id=<?= $id?>" method="POST">
  <h2>You are about to book the tour "<?= $found_tour_name ?>" </h2>
    <label>
        <select name="quantity">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
    </label>
    <label >
        <input type="text" name="full_name" placeholder="your full name">
    </label>
    <label >
        <input type="text" name="email" placeholder="your email address">
    </label>
    <label >
        <input type="text" name="phone_number" placeholder="your phone number">
    </label>
   <br>
<button>BOOK</button>
</form>
<hr> 