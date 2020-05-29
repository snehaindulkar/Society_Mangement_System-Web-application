

$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});

//  jQuery.validator.addMethod("mobile", function(value, element) {
//         return this.optional(element) || value.match(/^[1-9][0-9]*$/);
//     }, "Please enter the number without beginning with '0'");

//     jQuery.validator.addMethod("alphabets", function(value, element) {
//         return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
//     }, "Please enter Alphabets only");

//     jQuery.validator.addMethod("email", function(value, element) {
//         return this.optional(element) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
//     }, "Please enter a valid email address.");


// if ($('#complaintForm').length > 0) {
//     $('#complaintForm').validate({        
//         rules: {
//             name: {
//                 required: true,
//                 alphabets: true,
//                 maxlength: 100
//             },
//             mobile: {
//                 required: true,
//                 number: true,
//                 mobile: true,
//                 minlength: 10,
//                 maxlength: 10
//             },
//             email: {
//                 required: true,
//                 email: true
//             }
            
//         },
//         submitHandler: function(form) {
//             $(form).find(':submit').prop('disabled', true);
//             form.submit();
//         }
//     });
// }