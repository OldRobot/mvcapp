<?php require APPROOT . '/views/inc/header.php'; ?>

<h2>This is the Skills page</h2>


<?php echo $data['skills']['testname']; ?>
<br>
<?php echo $data['skills']['questions'][0]['question']; ?>


<?php require APPROOT . '/views/inc/footer.php'; ?>