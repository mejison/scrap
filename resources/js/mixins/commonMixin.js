export default {  
    methods: {
        startLoader() {
            const content = document.getElementById('content');
            content.classList.add('load');
        },
        stopLoader() {
            const content = document.getElementById('content');
            content.classList.remove('load');
        },
    }
}