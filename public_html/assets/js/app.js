function show(shown, hidden) {
  document.getElementById(shown).classList.add("d-block");
  document.getElementById(shown).classList.remove("d-none");
  document.getElementById(hidden).classList.add("d-none");
  document.getElementById(hidden).classList.remove("d-block");
}

function imagesPreview(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    var file = ``
                    $($.parseHTML(`<img class="mr-2" style="width:100px !important;height:100px !important;">`)).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };
function imagesPreviewUpload(input, placeToInsertImagePreview) {
    input.onchange = evt => {
        const [file] = input.files
        if (file) {
            placeToInsertImagePreview.src = URL.createObjectURL(file)
            console.log(file);
        }
    }
};

function readURL(input,img) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(img).attr('src', e.target.result);
        }
        console.log(img);
        reader.readAsDataURL(input.files[0]);
    }
}

function readURL2(input,img) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            img.attr('src', e.target.result);
        }
        console.log(img);
        reader.readAsDataURL(input.files[0]);
    }
}

$('.imgPreviewInputFinal').on('change',function (){
    var input = this;
        console.log('hello')
        var img = $(input).data('imgid')
        // console.log(img);

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(img).attr('src', e.target.result);
            }
            console.log(img);
            reader.readAsDataURL(input.files[0]);
        }
    })




