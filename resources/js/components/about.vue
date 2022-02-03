<template>
    <div class="contact">
        <h3 class="page-title my-4">About</h3>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Age <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ item.Age }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Gender <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ item.Gender }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Relationship Status <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ item['Relationship Status'] }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Language <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ item['Language'] }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Education <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ item['Education'] }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Ethnicity <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ item['Ethnicity'] }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Children <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ item['Children'] }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Pets <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ item['Pets'] }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Income <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ item['Income'] }}</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            default: () => ({}),
        }
    },
}
</script>