<template>
    <div>
        <div class="">
            <label for="projectinput4"> {{this.image_label}}</label>
            <div class="form-group">
                <input type="file" class="form-control" @change="previewImage" :name="this.image_name" />
            </div>
            <div class="mt-3">
                <img class="w-100" :src="imageData" />
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ["image_name", "image_label", "old", "path_image_edit"],
        data() {
            return {
                imageData: this.old,
            };
        },
        methods: {
            previewImage: function (event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        this.imageData = e.target.result;
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            },
        },
        beforeMount() {
            if (this.path_image_edit) {
                this.imageData = this.path_image_edit;
            }
        },
    };
</script>
