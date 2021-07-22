<?php 
$data = ['title' => 'nums'];
echo view('/templates/header',$data);
?>

<div class="vh-100 d-flex">
    <div class='w-100'>
        <h1 class="text-center my-5 w-75 m-auto">Roll Dice</h1>
        <div class="m-auto bg-dark p-4 pb-3 text-center w-50"
            style="min-width:300px;border-radius:0.25rem">
            <div class="mb-3 form-floating ">
                <input class="form-control" placeholder="Password" id='min' value="1">
                <label for="min">Min<text class="text-danger">*</text></label>
            </div>
            <div class="mb-3 form-floating ">
                <input class="form-control" placeholder="Password" id='max' value="10">
                <label for="max">Max <text class="text-danger">*</text></label>
            </div>
            <div class="mb-3 form-floating ">
                <input class="form-control" placeholder="Password" id='amount'>
                <label for="amount">amount<text class="text-danger">*</text></label>
            </div>
            <button type="button" id="roll" class="btn btn-success mb-3">Roll</button>
            <p>Sum: <text id="result"></text></p>
            <div id="dice"></div>
        </div>
    </div>
</div>
<script src="/js/nums.js"></script>
<?php 
echo view('/templates/footer');