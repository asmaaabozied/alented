@push('scripts')
    <script>
        var number_inputs = document.querySelectorAll("input[type=number]")
        for(var i = 0; i < number_inputs.length; i++)
            number_inputs[i].min = 0;

        function readURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();

                reader.onload = function(e){
                    var element_id = input.id + '_preview';
                    $('#' + element_id).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        var _validFileExtensions = [".jpg", '.jpeg', '.png'];
        function Validate(oForm){
            if(oForm.files && oForm.files[0]){
                var oInput = oForm;
                if(oInput.type == "file"){
                    var sFileName = oInput.value;
                    if(sFileName.length > 0){
                        var blnValid = false;
                        for(var j = 0; j < _validFileExtensions.length; j++){
                            var sCurExtension = _validFileExtensions[j];
                            if(sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()){
                                blnValid = true;

                                readURL(oInput);
                                break;
                            }
                        }

                        if(!blnValid){
                            $('#' + oInput.id + '_validation').show();

                            return false;
                        }
                    }
                }
            }

            return true;
        }

        $(function () {
            $('#image_en').change(function() {
                var vvl = Validate(this);
                if(this.files.length > 0 && vvl == true){
                    document.getElementById('image_en_label').innerHTML = this.value.split(/(\\|\/)/g).pop();

                    $('#image_en_validtion').hide();
                }else{
                    document.getElementById('image_en_label').innerHTML = '<i class="fa fa-cloud-upload"></i> click to upload';

                    $('#image_en_preview').attr('src' , "{{ url('images/temp.png') }}");
                }
            });

            $('#image_ar').change(function() {
                var vvl = Validate(this);
                if(this.files.length > 0 && vvl == true){
                    document.getElementById('image_ar_label').innerHTML = this.value.split(/(\\|\/)/g).pop();

                    $('#image_ar_validtion').hide();
                }else{
                    document.getElementById('image_ar_label').innerHTML = '<i class="fa fa-cloud-upload"></i> click to upload';

                    $('#image_ar_preview').attr('src' , "{{ url('images/temp.png') }}");
                }
            });

            $('#image').change(function(){
                var vvl = Validate(this);
                if(this.files.length > 0 && vvl == true){
                    document.getElementById('image_label').innerHTML = this.value.split(/(\\|\/)/g).pop();

                    $('#image_validation').hide();
                }else{
                    document.getElementById('image_label').innerHTML = '<i class="fa fa-cloud-upload"></i> click to upload';

                    $('#image_preview').attr('src', "{{ url('images/temp.png') }}");
                }
            });

            $('#about_image').change(function(){
                var vvl = Validate(this);
                if(this.files.length > 0 && vvl == true){
                    document.getElementById('about_image_label').innerHTML = this.value.split(/(\\|\/)/g).pop();

                    $('#about_image_validation').hide();
                }else{
                    document.getElementById('about_image_label').innerHTML = '<i class="fa fa-cloud-upload"></i> click to upload';

                    $('#about_image_preview').attr('src', "{{ url('images/temp.png') }}");
                }
            });
        });
    </script>
@endpush