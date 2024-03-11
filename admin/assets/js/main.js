
// Input image preview
document.querySelector('#inputImage').addEventListener('change', function(event){

            let reader = new FileReader();
            reader.onload = function()
            {
                document.querySelector('#previewImage').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);

    })
