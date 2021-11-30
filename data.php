<?php require_once("includes/header.php"); ?>
<?php require_once("includes/functions.php"); ?>


<br><br><br>
<?php


$trainer = getTrainers();

$data = array();
foreach($trainer as $row){
    $data[] = array(
        'Trainer' =>  $row["trainer"],
        'Total'  =>   $row["count(*)"],
        'color'    => '#'.rand(100000, 999999).''
    );
}
echo json_encode($data);
?>

<?php require_once("includes/footer.php"); ?>