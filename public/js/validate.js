$(document).ready(function () {


  // validation for registration

     $('#createproduct').validate({ // initialize the plugin
    rules: {

        product_name: {
            required: true,
            minlength: 3,
            maxlength: 55
            
        },
        category_id: {
            required: true,

        },

        product_colour: {
            required: true,
            minlength: 3,
            maxlength: 20
            
        },
        size: {
            required: true,
            minlength: 1,
            maxlength: 12,
           
        },
        description: {
            required: true,
            minlength: 3,
            maxlength: 255
            
        },
        product_image: {
            required: true
        },
        price: {
            required: true,
            minlength: 1,
            maxlength: 20,
        }

        }

     });

   // validation for create category

     $('#createcategory').validate({ // initialize the plugin
    rules: {

        name: {
            minlength: 3,
            maxlength: 55,
            required: true
        },
        description: {
            minlength: 5,
            maxlength: 255,
            required: true
        },


        }
     });

     

});



