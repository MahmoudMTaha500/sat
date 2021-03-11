<template>
     <div>
            <!-- <div class="file-upload-form">
                Upload an image file:
                <input type="file" @change="previewImage"   :name="imageData" accept="image/*">
            </div>
            <div class="image-preview" v-if="imageData.length > 0">
                <img class="preview" :src="imageData">
            </div> -->



  <div class="form-group">
        <label for="projectinput4"> {{this.image_label}}</label>
        <div class="custom-file">
            <input type="file"  class="custom-file-input"  @change="previewImage"   :name="this.image_name"  />
            <label class="custom-file-label" for="inputGroupFile01">اختر الصورة</label>
        </div>
        <div class="mt-3">
            <img class="w-100" :src="imageData" />
        </div>
    </div>

        </div>
</template>
 <script>
export default {
    props:['image_name','image_label','old'],
      data(){
          return{
               imageData: "",
          }
      },
         methods: {
        previewImage: function(event) {
            // Reference to the DOM input element
            var input = event.target;
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0]) {
                // create a new FileReader to read this image and convert to base64 format
                var reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = (e) => {
                    // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                    // Read image as base64 and set to imageData
                    this.imageData = e.target.result;
                }
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);
            }
        }
    }

}
</script>