$("#wizard").steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    enableAllSteps: true,
    enablePagination: true,
    onFinished: function (event, currentIndex) {
        console.log('finish')
        $('#successModal').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#successModal').modal('show')
    },
    labels: {
        finish: "إرسال",
        next: "التالي",
        previous: "السابق"
    }
});