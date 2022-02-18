<template>
    <div class="discovered-creator">
        <div class="icon">
            <svg width="45" height="31" viewBox="0 0 45 31" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M43.434 16.202L34.548 2.764l-.001.001a5.92 5.92 0 00-10.796 4.154l.002.01.042.282h-2.59l.043-.283.001-.009a5.92 5.92 0 00-10.796-4.154h-.001L1.566 16.201h.001a9.474 9.474 0 1017.273 6.646v.001l.42-2.782a4.549 4.549 0 006.479 0l.42 2.782h.001a9.474 9.474 0 1017.272-6.646l.002-.001z" fill="#479CAC" fill-rule="nonzero"></path><path d="M21.483 6.25h2.034a1 1 0 01.988.848l1.75 11.37a3.5 3.5 0 01-3.46 4.032h-.59a3.5 3.5 0 01-3.46-4.032l1.75-11.37a1 1 0 01.988-.848z" fill="#7FCBBF"></path><path d="M9.473 26.829a5.415 5.415 0 005.409-5.408 5.415 5.415 0 00-5.409-5.407 5.415 5.415 0 00-5.408 5.407 5.415 5.415 0 005.408 5.408z" stroke="#FFF" stroke-width="1.5" fill="#FDBA53" fill-rule="nonzero"></path><path d="M22.5 20.302a2.193 2.193 0 110-4.385 2.193 2.193 0 010 4.385z" fill="#FFF" fill-rule="nonzero"></path><path d="M35.526 27.579a6.165 6.165 0 01-6.158-6.158 6.165 6.165 0 016.159-6.157 6.165 6.165 0 016.157 6.157 6.165 6.165 0 01-6.157 6.158z" fill="#FDBA53" fill-rule="nonzero"></path><path d="M35.526 26.829a5.415 5.415 0 005.408-5.408 5.415 5.415 0 00-5.407-5.407 5.415 5.415 0 00-5.409 5.407 5.415 5.415 0 005.409 5.408z" stroke="#FFF" stroke-width="1.5" fill="#FDBA53" fill-rule="nonzero"></path></g></svg>
        </div>
        <div class="description">
            <h3 class="title">{{ item.attributes.connection_name }} is a Discovered Creator.</h3>
            <p>
                {{ item.attributes.connection_name }} has been discovered off of our platform. 
                Visit their {{ item.attributes.platform }} profile to collaborate with them.
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            default: () => ({}),
        },
    },
}
</script>

<style lang="scss" scoped>
    .discovered-creator {
        display: flex;
        padding: 15px 25px;
        margin:  0 0 15px;
        background: rgba(82, 177, 65, 0.1);

        .icon {

        }

        .description {
            margin-left: 10px;
        
            p,
            .title {
                font-size: 14px;
            }

            p {
                line-height: 1.2;
            }
        }

    }
</style>