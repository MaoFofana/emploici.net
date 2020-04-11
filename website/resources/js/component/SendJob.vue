<template>
    <div>
        dsf
        <trumbowyg v-model="content" :config="config" class="form-control" name="content"></trumbowyg>
    </div>
</template>
<script>
    // Import this component
    import Trumbowyg from 'vue-trumbowyg';

    // Import editor css
    import 'trumbowyg/dist/ui/trumbowyg.css';

    export default {
        data () {
            return {
                content: null,
                config: {
                    // Get options from
                    // https://alex-d.github.io/Trumbowyg/documentation
                }
            }
        },
        components: {
            Trumbowyg
        }
    }
</script>
