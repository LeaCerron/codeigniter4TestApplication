<?php 
$data = ['title' => $title];
echo view('/templates/header',$data);
?>

<div class="vh-100 d-flex align-items-center">
    <div class='w-100'>
        <h1 class="text-center mb-5 w-75 m-auto"><?= $title ?></h1>
        <div class="m-auto bg-dark p-4 pb-3 text-center w-50"
            style="min-width:300px;max-width:500px;border-radius:0.25rem">
            <?= $message ?>
        </div>
    </div>
</div>

<?php 
echo view('/templates/footer');