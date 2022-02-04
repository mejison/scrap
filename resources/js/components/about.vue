<template>
    <div class="contact">
        <h3 class="page-title my-4">About</h3>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Age <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ getAge(item) }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Gender <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ getGender(item) }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Relationship Status <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ getRelationshipStatus(item) }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Language <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ getLanguage(item) }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Education <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ getEducation(item) }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Ethnicity <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ getEthnicity(item) }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Children <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ getChildren(item) }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Pets <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ getPets(item) }}</span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="f-w-500">Income <span class="pull-right"></span>
                </h5>
            </div>
            <div class="col-9"><span>{{ getIncome(item) }}</span>
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

    methods: {
        getIncome(item) {
            if (item.overview && item.overview.segmentation_hash.user_income) {
                const income = item.overview.segmentation_hash.user_income[0]
                const parts = income.split('to')
                return `$${parts[0]}-$${parts[1]}k`
            }
            return '--';
        },
        getPets(item) {
            if (item.overview && item.overview.segmentation_hash.user_pets) {
                const pets = item.overview.segmentation_hash.user_pets[0]
                return pets
            }
            return '--';
        },
        getChildren(item) {
            if (item.overview && item.overview.segmentation_hash.user_children) {
                const children = item.overview.segmentation_hash.user_children[0]
                return children
            }
            return '--';
        },
        getEthnicity(item) {
            if (item.overview && item.overview.segmentation_hash.race) {
                const ethnicity = item.overview.segmentation_hash.race[0]
                return ethnicity
            }
            return '--';
        },
        getEducation(item) {
            if (item.overview && item.overview.segmentation_hash.education) {
                const education = item.overview.segmentation_hash.education[0]
                return education
            }
            return '--';
        },
        getRelationshipStatus(item) {
            if (item.overview && item.overview.segmentation_hash.relationship) {
                const relationship = item.overview.segmentation_hash.relationship[0]
                return relationship
            }
            return '--';
        },
        getAge(item) {
            if (item.overview && item.overview.segmentation_hash.birthday) {
                const birthday = item.overview.segmentation_hash.birthday[0]
                let parts = birthday.split('-')
                return ((new Date()).getFullYear() - 1) - parts.shift() * 1
            }
            return '--';
        },
        getGender(item) {
            if (item.overview &&  item.overview.segmentation_hash.user_gender) {
                const gender = item.overview.segmentation_hash.user_gender[0]
                return gender
            }
            return '--';
        },
        getLanguage(item) {
            if (item.overview && item.overview.segmentation_hash.user_language) {
                const language = item.overview.segmentation_hash.user_language[0]
                return language.key;    
            }
            return '--';
        },
    }
}
</script>