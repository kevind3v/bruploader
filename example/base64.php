<link rel="stylesheet" href="./theme/style.css">

<div class="form">
    <form name="env" method="post" enctype="multipart/form-data">
        <?php
        require __DIR__ . "/../vendor/autoload.php";

        //$image = new \BrBunny\BrUploader\BrBase64("uploads", "images", false); //SEM PASTAS DE ANO E MÊS
        $image = new \BrBunny\BrUploader\BrBase64("uploads", "images");
        if ($_POST && $_POST['image']) {
            try {
                $upload = $image->upload($_POST['image'], $_POST['name']);
                echo "<img src='{$upload}' width='100%'>";
            } catch (Exception $e) {
                echo "<p>(!) {$e->getMessage()}</p>";
            }
        }
        ?>
        <input type="text" name="name" placeholder="Image Name" required />
        <input type="file" onchange="base64(this)" required />
        <input type="hidden" name="image" id="image">
        <button>Send Image</button>
        <br>
        <span>Image in base64:</span>
        <div id="result"></div>
    </form>
</div>


<script>
    //Generate base64 
    function base64(element) {
        var file = element.files[0];
        var reader = new FileReader();
        reader.onloadend = function() {
            document.getElementById('image').value = reader.result;
            document.getElementById('result').innerHTML = reader.result;
            console.log(reader.result);
        }
        reader.readAsDataURL(file);
    }
</script>