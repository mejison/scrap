<template>
    <div class="contact">
        <h3 class="page-title my-4">Contact</h3>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Email <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ item.contacts && item.contacts.email ? item.contacts.email : '--' }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Phone Number <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ item.contacts && item.contacts.phone_number ? item.contacts.phone_number : '--' }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Shipping Address <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ item.contacts && item.contacts.address ? item.contacts.address : '--' }}</span>
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