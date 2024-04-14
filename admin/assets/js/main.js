
    // Input image preview
    document.querySelector('#inputImage').addEventListener('change', function(event){

        let reader = new FileReader();
        let previewImageDiv = document.querySelector('#previewImage');

        reader.onload = function()
        {
            previewImageDiv.src = reader.result;
            previewImageDiv.style.display = "inline-block";
        }
        reader.readAsDataURL(event.target.files[0]);

    });

    // Data Tables
    $(document).ready( function () {
        $('#myTable').DataTable();
    });
