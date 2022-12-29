<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
                <form>
                    <input type="file" name="image" ="form-control" accept="image/*"
                           onchange="updatePreview(this, 'image-preview')" >
                    <div ="text-end">
                        <button ="btn btn-primary mt-3 ">Upload</button>
                    </div>
                </form>
                    <img id="image-preview" 
                         src="https://via.placeholder.com/400"
                         style="width:400px"
                         ="rounded rounded-circle" alt="placeholder">
                         
<script type="text/javascript">
    function updatePreview(input, target) {
        let file = input.files[0];
        let reader = new FileReader();
        
        reader.readAsDataURL(file);
        reader.onload = function () {
            let img = document.getElementById(target);
            img.src = reader.result;
        }
    }
</script>
</body>
</html>
